<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\Product;
use App\Models\RequestDownload;
use App\Models\Rating;
use App\Models\Credit;
use App\Models\DownloadsFree;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DownloadRequestNotification;
use App\Mail\FixUrlNotification;
use App\Mail\DownloadNotification;
use App\Mail\InvalidUrlNotification;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DownloadController extends Controller
{
    public function showDownloadRequestlist(Request $request)
    {
        $user           = Auth::user();
        $userDetail     = $user->userDetail;

        if ($user->role != 1) {
            Alert::error('Error', 'Forbidden Access.');           
            return redirect()->route('user.profile');
        }

        Credit::where('user_id', $user->id)->where('is_expires', true)->where('expires_at', '<', now())->update(['credit_amount' => 0]);

        if ($request->ajax()) {        
            $data = RequestDownload::leftJoin('products', 'request_download.url', '=', 'products.url_source')
                ->select('request_download.*', 'products.url_source as product_url')
                ->orderBy('request_download.created_at', 'DESC') 
                ->get()
                ->map(function ($item) {
                    // Menentukan asal URL berdasarkan pola
                    if (strpos($item->url, 'envato') !== false) {
                        $item->type = 'Envato';
                        $item->type_icon = asset('uploads/products/envato.png'); // Path ke ikon
                    } elseif (strpos($item->url, 'freepik') !== false) {
                        $item->type = 'Freepik';
                        $item->type_icon = asset('uploads/products/freepik.png');
                    } elseif (strpos($item->url, 'motionarray') !== false) {
                        $item->type = 'Motion Array';
                        $item->type_icon = asset('uploads/products/motionaray.png');
                    } elseif (strpos($item->url, 'scribd') !== false) { // Menggunakan "scribd" untuk Scribd
                        $item->type = 'Scribd';
                        $item->type_icon = asset('uploads/products/scribd.png');
                    } elseif (strpos($item->url, 'academia') !== false) { // Menggunakan "academia" untuk Academia
                        $item->type = 'Academia';
                        $item->type_icon = asset('uploads/products/academia.png');
                    } else {
                        $item->type = 'Other';
                        $item->type_icon = asset('uploads/products/default.png'); // Path ikon default
                    }
                    return $item;
                });
    
            return DataTables::of($data)
                ->addColumn('action', function($data) {
                    $notifyButton = '';
                    if ($data->status != 3) {
                        $notifyButton = '
                            <button class="btn btn-sm btn-primary small-btn notify-btn mb-1" data-id="'.$data->id.'" title="Notify">
                                <i class="fas fa-bell"></i>
                            </button>';
                    }
                    // Tombol delete
                    $deleteButton = '
                        <button class="btn btn-sm btn-danger small-btn delete-btn mb-1" data-id="'.$data->id.'" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>';
                
                    $invalidUrlButton = '';
                    if ($data->status != 3) {
                        $invalidUrlButton = '
                        <button class="btn btn-sm btn-warning small-btn invalid-notify-btn mb-1" data-id="'.$data->id.'" title="Invalid Notify">
                            <i class="fas fa-exclamation-triangle"></i>
                        </button>';
                    }
                                
                    return $notifyButton . ' ' . $invalidUrlButton . ' ' . $deleteButton;
                })            
                ->addColumn('url_exists', function($data) {
                    return $data->product_url ? 'exists' : 'not-exists';
                })
                ->editColumn('status', function($data) {
                    // Menampilkan badge berdasarkan status
                    switch ($data->status) {
                        case 0:
                            return '<span class="badge bg-warning">Pending</span>';
                        case 1:
                            return '<span class="badge bg-primary">Uploaded</span>';
                        case 2:
                            return '<span class="badge bg-danger">Unsent</span>';
                        case 3:
                            return '<span class="badge bg-success">Completed</span>';
                        case 4:
                            return '<span class="badge bg-danger">Invalid</span>';
                        case 5:
                            return '<span class="badge bg-info">Fixed</span>';
                        default:
                            return '<span class="badge bg-secondary">Unknown</span>';
                    }
                })
                ->rawColumns(['action', 'status']) // Agar HTML badge dieksekusi dengan benar
                ->make(true);
        }

        $user = Auth::user(); 

        $data = [
            'title'         => 'Download Request List | Bilik Media',
            'user'          => $user,           
            'userDetail'    => $userDetail,           
        ];
    
        return view('Dashboard.downloadRequestList', $data);
    }

    public function showDownloadHistory()
    {
        $user                   = Auth::user(); 
        $userEmail              = auth()->user()->email;
        $userDetail             = $user->userDetail;
        Credit::where('user_id', $user->id)->where('is_expires', true)->where('expires_at', '<', now())->update(['credit_amount' => 0]);
        
        $envatoCount            = RequestDownload::where('email', $userEmail)->where('url', 'LIKE', 'https://elements.envato.com/%')->count();
        $freepikCount           = RequestDownload::where('email', $userEmail)->where('url', 'LIKE', 'https://www.freepik.com/%')->count();        
        $motionCount            = RequestDownload::where('email', $userEmail)->where('url', 'LIKE', 'https://motionarray.com/%')->count();
        $downloadHistory        = RequestDownload::where('email', $userEmail)->with('product') ->orderBy('created_at', 'desc') ->paginate(10);

        $data = [
            'title'             => 'Download History | Bilik Media',
            'envatoCount'       => $envatoCount,
            'freepikCount'      => $freepikCount,
            'motionCount'       => $motionCount,
            'downloadHistory'   => $downloadHistory,
            'user'              => $user,    
            'userDetail'        => $userDetail,
        ];

        return view('Dashboard.User.downloadHistory', $data);
    }

    public function sendDownloadNotification(Request $request)
    {
        // Temukan data request download berdasarkan ID
        $downloadRequest = RequestDownload::find($request->id);
    
        if ($downloadRequest) {
            // Ambil URL dari request download
            $url = $downloadRequest->url;
    
            // Cari di database product berdasarkan url_source
            $product = Product::where('url_source', $url)->first();
    
            if ($product) {
                // Ambil detail produk seperti title dan slug
                $title  = $product->title;
                $id     = $product->id;
                $slug   = $product->slug;

                $downloadUrl = route('generate.download.link', ['productId' => $id]);
                $downloadUrl = route('product.details', ['slug' => $slug]);
    
                try {
                    Mail::to($downloadRequest->email)->send(new DownloadNotification($title, $downloadUrl));

                    $downloadRequest->status = 3;
                    $downloadRequest->save();
    
                    // Kembalikan respon JSON untuk AJAX jika sukses
                    return response()->json(['success' => 'Email sent successfully and status updated']);
                } catch (\Exception $e) {
                    // Jika gagal mengirim email, kembalikan pesan error dan simpan log error
                    return response()->json(['error' => 'Failed to send email: ' . $e->getMessage()]);
                }
            } else {
                return response()->json(['error' => 'Product not found']);
            }
        }
    
        // Jika request download tidak ditemukan
        return response()->json(['error' => 'Download request not found']);
    }
    
    public function sendInvalidNotification(Request $request)
    {
        // Temukan data request download berdasarkan ID
        $downloadRequest = RequestDownload::find($request->id);

        if ($downloadRequest) {
            // Ambil email dan URL dari request download
            $email = $downloadRequest->email;
            $url = $downloadRequest->url;

            try {
                // Kirim email dengan template 'InvalidUrlNotification' dan sertakan URL yang bermasalah
                Mail::to($email)->send(new InvalidUrlNotification($email, $url));

                // Ubah status menjadi 4 (untuk menandai bahwa URL perlu diperbaiki)
                $downloadRequest->status = 4;
                $downloadRequest->save();

                // Kembalikan respon JSON untuk AJAX jika sukses
                return response()->json(['success' => 'Invalid URL notification sent and status updated to 4']);
            } catch (\Exception $e) {
                // Jika gagal mengirim email, kembalikan pesan error yang lebih rinci
                return response()->json([
                    'error' => 'Failed to send email: ' . $e->getMessage(),
                    'trace' => $e->getTraceAsString() // Menambahkan stack trace untuk debugging
                ]);
            }
        }

        // Jika request download tidak ditemukan
        return response()->json(['error' => 'Download request not found']);
    }
    
    public function fixUrl(Request $request)
    {
        // Validasi input yang diterima dari AJAX
        $validatedData = $request->validate([
            'id' => 'required|exists:request_download,id', // Memastikan ID valid dan ada
            'new_url' => 'required|url', // Memastikan new_url adalah URL yang valid
        ]);
    
        // Mengambil record berdasarkan id
        $download = RequestDownload::find($validatedData['id']);
    
        // Memperbarui URL dengan yang baru
        $download->url = $validatedData['new_url'];
        $download->status = 5; // Contoh: mungkin juga mengubah status setelah memperbarui URL
        $download->save(); // Menyimpan perubahan ke database
    
        // Mengirim email ke admin
        Mail::to('raihandi93@gmail.com')->send(new FixUrlNotification($download));
    
        // Mengembalikan respon JSON sukses
        return response()->json(['message' => 'URL has been updated successfully.', 'new_url' => $download->url]);
    }

    public function deleteDownloadRequest($id)
    {
        try {
            $requestDownload = RequestDownload::findOrFail($id);
            $requestDownload->delete();

            return response()->json(['success' => true, 'message' => 'Request deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete request']);
        }
    }

    public function generateDownloadLink($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->withErrors('Product not found!');
        }

        $download = Download::create([
            'product_id' => $product->id,
            'token' => Str::random(40),
            'expires_at' => Carbon::now()->addHours(2),
        ]);

        return redirect()->route('download.file', ['token' => $download->token]);
    }
    
    public function downloadFile($token)
    {
        $userDetail = null;
        if (Auth::check()) {
            $user = Auth::user();
            $userDetail = $user->userDetail;

            if ($userDetail) {
                Credit::where('user_id', $user->id)
                    ->where('is_expires', true)
                    ->where('expires_at', '<', now())
                    ->update(['credit_amount' => 0]);

                $totalCredit = Credit::where('user_id', $user->id)
                                    ->sum('credit_amount');

                $userDetail->kredit = $totalCredit;
                $userDetail->save();
            }
        }

        $download = Download::where('token', $token)->first();
    
        if (!$download) {
            Alert::error('Error', 'Download link is invalid.');
            return redirect()->route('index');
        }
    
        // Jika download sudah kadaluarsa
        if (Carbon::now()->greaterThan($download->expires_at)) {
            Alert::error('Error', 'Download link has expired.');
            return redirect()->route('index');
        }

        $product = $download->product;
      
        $sideAd = Ad::where('name', 'side')->first();
        $bannerAd = Ad::where('name', 'banner')->first();
        $socialAd = Ad::where('name', 'social')->first();
        $smallAd = Ad::where('name', 'small')->first();
        
        // Jika file produk tidak ditemukan
        if (!$product) {
            return redirect()->back()->withErrors('File not found.');
        }

        // Data yang akan dikirim ke view
        $data = [
            'title'         => 'Download ' . $product->title, 
            'product'       => $product,                    
            'download'      => $download,                  
            'sideAd'        => $sideAd,          
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd,     
            'smallAd'       => $smallAd,     
            'url'           => $product->url_download,   
            'userDetail'    => $userDetail,  
        ];

        return view('Download.download', $data);
    }

    //unsued
        public function showRating($token)
        {        
            $download = Download::where('token', $token)->first();
            if (!$download) {
                return redirect()->back()->withErrors('Invalid token.');
            }
        
            $product = Product::find($download->product_id);
                
            if (!$product) {
                return redirect()->back()->withErrors('Product not found.');
            }
        
            $data = [
                'title' => 'Rating ' . $product->title,  // Gabungkan string "Rating" dengan title produk
                'product' => $product,                   // Mengirim informasi produk ke view
                'download' => $download,                 // Mengirim informasi download ke view
            ];
                
            return view('Download.rating', $data);
        }

        public function submitRating(Request $request)
        {
            // Validasi input
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'rating' => 'required|integer|min:1|max:5',
            ]);
        
            // Simpan rating tanpa user_id
            Rating::create([
                'product_id' => $request->input('product_id'),
                'rating' => $request->input('rating'),
            ]);
        
            // Redirect ke halaman envanto downloader dengan pesan sukses
            return redirect()->route('envanto.downloader')->with('success', 'Thank you for your rating!');
        }
    //unsued
    
    public function requestDownload(Request $request)
    {        
        $email = Auth::check() ? Auth::user()->email : $request->input('email');
    
        $request->validate([
            'envanto_url' => [
                'required',
                'url',
                function ($attribute, $value, $fail) {
                    if (!str_starts_with($value, 'https://elements.envato.com/')) {
                        $fail('The URL must start with https://elements.envato.com/');
                    }
                },
            ],
            'email' => 'email',
        ]);
    
        $envantoUrl = explode('?', $request->input('envanto_url'))[0];
        $cleanedUrl = preg_replace('/\/[a-z]{2}(?:-[a-z]{2})?\//i', '/', $envantoUrl);
    
        $existingRequest = RequestDownload::where('email', $email)
            ->where('url', $cleanedUrl)
            ->first();
    
        if ($existingRequest) {
            return response()->json([
                'status' => 'error',
                'message' => 'The file is already in your download history. Please check your download history.'
            ], 400);
        }
    
        RequestDownload::create([
            'email' => $email,
            'url' => $cleanedUrl,
            'status' => 0,
        ]);
    
        Mail::to('raihandi93@gmail.com')->send(
            new DownloadRequestNotification($email, $cleanedUrl)
        );
        Alert::success('Success', 'File on process, please wait 5-10 minutes, and check your email regularly');
        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function requestScribdDownload(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->input('email');
    
        // Cek apakah URL valid, jika tidak, langsung kembalikan respons error JSON
        if (!str_starts_with($request->input('scribd_url'), 'https://www.scribd.com/')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid URL. The URL must start with https://www.scribd.com/'
            ], 400);
        }
    
        // Lakukan validasi lainnya
        $request->validate([
            'scribd_url' => 'required|url',
            'email' => 'email',
        ]);
    
        $scribdUrl = explode('?', $request->input('scribd_url'))[0];
        $cleanedUrl = preg_replace('/\/[a-z]{2}(?:-[a-z]{2})?\//i', '/', $scribdUrl);
    
        // Cek apakah permintaan download ini sudah ada di database
        $existingRequest = RequestDownload::where('email', $email)
            ->where('url', $cleanedUrl)
            ->first();
    
        if ($existingRequest) {
            return response()->json([
                'status' => 'error',
                'message' => 'The file is already in your download history. Please check your download history.'
            ], 400);
        }
    
        // Jika permintaan baru, simpan ke dalam database
        RequestDownload::create([
            'email' => $email,
            'url' => $cleanedUrl,
            'status' => 0,
        ]);
    
        Mail::to('raihandi93@gmail.com')->send(
            new DownloadRequestNotification($email, $cleanedUrl)
        );
    
        Alert::success('Success', 'File on process, please wait 5-10 minutes, and check your email regularly');
        return response()->json([
            'status' => 'success',
        ], 200);
    }

    public function requestAcademiaDownload(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->input('email');

        // Cek apakah URL valid untuk Academia.edu
        if (!str_starts_with($request->input('academia_url'), 'https://www.academia.edu/')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid URL. The URL must start with https://www.academia.edu/'
            ], 400);
        }

        // Lakukan validasi tambahan untuk memastikan URL dan email memiliki format yang benar
        $request->validate([
            'academia_url' => 'required|url',
            'email' => 'nullable|email',
        ]);

        // Bersihkan URL dari parameter tambahan
        $academiaUrl = explode('?', $request->input('academia_url'))[0];
        $cleanedUrl = preg_replace('/\/[a-z]{2}(?:-[a-z]{2})?\//i', '/', $academiaUrl);

        // Cek apakah permintaan download ini sudah ada di database
        $existingRequest = RequestDownload::where('email', $email)
            ->where('url', $cleanedUrl)
            ->first();

        if ($existingRequest) {
            return response()->json([
                'status' => 'error',
                'message' => 'The document is already in your download history. Please check your download history.'
            ], 400);
        }

        // Jika permintaan baru, simpan ke dalam database
        RequestDownload::create([
            'email' => $email,
            'url' => $cleanedUrl,
            'status' => 0,
        ]);

        // Kirim notifikasi email ke admin
        $adminEmail = 'raihandi93@gmail.com'; // Ganti dengan email admin yang diinginkan
        Mail::to($adminEmail)->send(
            new DownloadRequestNotification($email, $cleanedUrl)
        );

        // Kirim respon sukses ke pengguna
        return response()->json([
            'status' => 'success',
            'message' => 'File is being processed. Please wait 5-10 minutes and check your email regularly.'
        ], 200);
    }

    
    public function requestDownloadFreepik(Request $request)
    {        
        $email = Auth::check() ? Auth::user()->email : $request->input('email');
    
        $request->validate([
            'envanto_url' => [
                'required',
                'url',
                function ($attribute, $value, $fail) {
                    if (!str_starts_with($value, 'https://www.freepik.com/')) {
                        $fail('Freepik URL Is Not Valid');
                    }
                },
            ],
            'email' => 'email',
        ]);
    
        $envantoUrl = $request->input('envanto_url');
        $cleanedUrl = strtok($envantoUrl, '#?');                
    
        $existingRequest = RequestDownload::where('email', $email)
            ->where('url', $cleanedUrl)
            ->first();
    
        if ($existingRequest) {
            return response()->json([
                'status' => 'error',
                'message' => 'The file is already in your download history. Please check your download history.'
            ], 400);
        }
    
        RequestDownload::create([
            'email' => $email,
            'url' => $cleanedUrl,
            'status' => 0,
        ]);
    
        Mail::to('raihandi93@gmail.com')->send(
            new DownloadRequestNotification($email, $cleanedUrl)
        );
        Alert::success('Success', 'File on process, please wait 5-10 minutes, and check your email regularly');
        return response()->json([
            'status' => 'success',
        ], 200);
    }
    
    public function requestDownloadMotion(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->input('email');

        $request->validate([
            'envanto_url' => [
                'required',
                'url',
                function ($attribute, $value, $fail) {
                    if (!str_starts_with($value, 'https://motionarray.com/')) {
                        $fail('Motion Array URL is not valid');
                    }
                },
            ],
            'email' => 'email',
        ]);

        $envantoUrl = $request->input('envanto_url');
        $cleanedUrl = strtok($envantoUrl, '#?');                

        $existingRequest = RequestDownload::where('email', $email)
            ->where('url', $cleanedUrl)
            ->first();

        if ($existingRequest) {
            return response()->json([
                'status' => 'error',
                'message' => 'The file is already in your download history. Please check your download history.'
            ], 400);
        }

        // Menyimpan permintaan download ke database
        RequestDownload::create([
            'email' => $email,
            'url' => $cleanedUrl,
            'status' => 0,
        ]);

        // Kirim email notifikasi ke admin
        Mail::to('raihandi93@gmail.com')->send(
            new DownloadRequestNotification($email, $cleanedUrl)
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Request submitted successfully. An email notification has been sent to the admin.',
        ], 200);
    }

    
    
    public function premiumDownload(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'Please log in to proceed with the download.']);
        }
    
        $user = Auth::user();
        $userDetail = $user->userDetail;
        $productId = $request->productId;
    
        // Validasi produk
        $product = Product::find($productId);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found.']);
        }
    
        // Cek request download sebelumnya
        $existingRequest = RequestDownload::where('email', $user->email)
            ->where('url', $product->url_source)
            ->first();
    
        if (!$existingRequest) {
            // Buat request download baru jika belum ada
            RequestDownload::create([
                'email' => $user->email,
                'url' => $product->url_source,
                'status' => 3,
            ]);
        }
    
        // Cek apakah user memiliki kredit yang cukup
        if (!$userDetail || $userDetail->kredit < 2) {
            return response()->json(['status' => 'error', 'message' => 'You do not have enough credits.']);
        }
    
        // Update kredit yang kadaluarsa (expired)
        Credit::where('user_id', $user->id)
            ->where('is_expires', true)
            ->where('expires_at', '<', now())
            ->update(['credit_amount' => 0]);
    
        // Proses pengurangan kredit
        $remainingCreditToDeduct = 2; // Total kredit yang diperlukan
        $creditTypes = ['daily', 'share', 'ad'];
    
        // Loop untuk memotong kredit sesuai prioritas jenis kredit
        foreach ($creditTypes as $type) {
            $credits = Credit::where('user_id', $user->id)
                ->where('credit_type', $type)
                ->where('credit_amount', '>', 0)
                ->get();
    
            foreach ($credits as $credit) {
                if ($remainingCreditToDeduct <= 0) break;
    
                if ($credit->credit_amount >= $remainingCreditToDeduct) {
                    $credit->decrement('credit_amount', $remainingCreditToDeduct);
                    $remainingCreditToDeduct = 0;
                } else {
                    $remainingCreditToDeduct -= $credit->credit_amount;
                    $credit->update(['credit_amount' => 0]);
                }
            }
    
            if ($remainingCreditToDeduct <= 0) break;
        }
    
        // Jika masih butuh kredit, coba ambil dari jenis 'reff'
        if ($remainingCreditToDeduct > 0) {
            $reffCredit = Credit::where('user_id', $user->id)
                ->where('credit_type', 'reff')
                ->where('credit_amount', '>', 0)
                ->first();
    
            if ($reffCredit) {
                if ($reffCredit->credit_amount >= $remainingCreditToDeduct) {
                    $reffCredit->decrement('credit_amount', $remainingCreditToDeduct);
                    $remainingCreditToDeduct = 0;
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Not enough credits to complete this download.']);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Not enough credits to complete this download.']);
            }
        }
    
        // Kurangi total kredit user sebanyak 2 poin
        $userDetail->decrement('kredit', 2);
    
        // Return response sukses dengan URL download
        return response()->json([
            'status' => 'success',
            'download_url' => $product->url_download,
        ]);
    }

    public function generateTokens(Request $request)
    {
        $productId = $request->input('product_id');

        // Generate UUID dan token acak
        $uuid = Str::uuid();
        $tokens = [
            'token_satu' => Str::random(10),
            'token_dua' => Str::random(10),
            'token_tiga' => Str::random(10),
            'token_empat' => Str::random(10),
            'token_lima' => Str::random(10),
            'token_enam' => Str::random(10),
            'token_tujuh' => Str::random(10),
        ];

        // Simpan ke database
        $download = new DownloadsFree([
            'uuid' => $uuid,
            'product_id' => $productId,
        ] + $tokens);

        $download->save();

        // Kirim respons JSON dengan token_satu
        return response()->json([
            'token_satu' => $tokens['token_satu']
        ]);
    }
    
}
