<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\Product;
use App\Models\RequestDownload;
use Illuminate\Support\Facades\Mail;
use App\Mail\DownloadRequestNotification;

use Carbon\Carbon;
use Illuminate\Support\Str;

class DownloadController extends Controller
{
    // Fungsi untuk membuat token unduhan dan mengarahkan ke tautan unduhan
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
