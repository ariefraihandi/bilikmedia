<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\Product;
use App\Models\RequestDownload;
use Illuminate\Support\Facades\Mail;
use App\Mail\DownloadRequestNotification;
use App\Mail\DownloadNotification;
use DataTables;

use Carbon\Carbon;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    public function showDownloadRequestlist(Request $request)
    {
        if ($request->ajax()) {
            $data = RequestDownload::leftJoin('products', 'request_download.url', '=', 'products.url_source')
                ->select('request_download.*', 'products.url_source as product_url')
                ->get();
    
            return DataTables::of($data)
                ->addColumn('action', function($data) {
                    return '<button class="btn btn-sm btn-primary notify-btn" data-id="'.$data->id.'">Notify</button>';
                })
                ->addColumn('url_exists', function($data) {
                    return $data->product_url ? 'exists' : 'not-exists';
                })
                ->editColumn('status', function($data) {
                    return $data->status == 0 ? 'Pending' : 'Completed';
                })
                ->make(true);
        }
    
        return view('Dashboard.downloadRequestList');
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
                $title = $product->title;
                $slug = $product->slug;
                $downloadUrl = route('product.details', ['slug' => $slug]);
    
                // Kirim email dengan detail produk
                Mail::to($downloadRequest->email)->send(new DownloadNotification($title, $downloadUrl));
    
                // Kembalikan respon JSON untuk AJAX
                return response()->json(['success' => 'Email sent successfully']);
            } else {
                return response()->json(['error' => 'Product not found']);
            }
        }
    
        // Jika request download tidak ditemukan
        return response()->json(['error' => 'Download request not found']);
    }


    public function generateDownloadLink($productId)
    {
        // Cari produk berdasarkan ID
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->withErrors('Product not found!');
        }

        // Buat token baru untuk unduhan
        $download = Download::create([
            'product_id' => $product->id,
            'token' => Str::random(40), // Buat token acak sepanjang 40 karakter
            'expires_at' => Carbon::now()->addHours(2) // Tautan akan kedaluwarsa dalam 2 jam
        ]);

        // Redirect ke URL unduhan dengan token
        return redirect()->route('download.file', ['token' => $download->token]);
    }

    public function downloadFile($token)
    {
        // Cari download berdasarkan token
        $download = Download::where('token', $token)->first();
    
        // Jika token tidak ditemukan
        if (!$download) {
            return redirect()->back()->withErrors('Download link is invalid.');
        }
    
        // Periksa apakah token sudah expired
        if (Carbon::now()->greaterThan($download->expires_at)) {
            return redirect()->back()->withErrors('Download link has expired.');
        }
    
        // Ambil produk terkait
        $product = $download->product;
    
        // Jika file produk tidak ditemukan
        if (!$product || !file_exists(public_path('uploads/products/' . $product->image))) {
            return redirect()->back()->withErrors('File not found.');
        }
    
        // Data yang akan dikirim ke view
        $data = [
            'title' => 'Download ' . $product->title, // Gabungkan string "Download" dengan title produk
            'product' => $product,                    // Mengirim informasi produk ke view
        ];
    
        // Mengirim data ke view 'Download.download'
        return view('Download.download', $data);
    }

    public function requestDownload(Request $request)
    {
        // Validasi input URL
        $request->validate([
            'envanto_url' => [
                'required',
                'url', // Validasi URL standar
                function ($attribute, $value, $fail) {
                    // Validasi apakah URL dimulai dengan https://elements.envato.com/
                    if (!str_starts_with($value, 'https://elements.envato.com/')) {
                        $fail('The URL must start with https://elements.envato.com/');
                    }
                },
            ],
        ]);

        // Cek apakah URL ada di dalam tabel produk berdasarkan url_source
        $product = Product::where('url_source', $request->input('envanto_url'))->first();

        // Jika produk ditemukan, arahkan ke halaman detail produk berdasarkan slug
        if ($product) {
            return redirect()->route('product.details', ['slug' => $product->slug]);
        }

        // Jika tidak ditemukan, arahkan ke view 'requestEnvanto.blade.php'
        return view('Downloader.requestEnvanto', [
            'envanto_url' => $request->input('envanto_url') // Kirim URL ke view
        ]);
    }

   
    public function submitDownload(Request $request)
    {
        // Validasi input email dan url
        $request->validate([
            'email' => 'required|email',
            'envanto_url' => 'required|url',
        ]);
    
        // Simpan request download ke database
        RequestDownload::create([
            'email' => $request->input('email'),
            'url' => $request->input('envanto_url'),
            'status' => 0, // Set status default ke 0
        ]);
    
        // Kirim email ke raihandi93@gmail.com dengan detail request
        Mail::to('raihandi93@gmail.com')->send(
            new DownloadRequestNotification($request->input('email'), $request->input('envanto_url'))
        );
    
        // Redirect ke halaman envanto downloader dengan pesan sukses di query string
        return redirect()->route('envanto.downloader', ['success' => 'Download request submitted successfully']);
    }    
}
