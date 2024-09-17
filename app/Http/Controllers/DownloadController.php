<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;
use App\Models\Product;
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
    
}
