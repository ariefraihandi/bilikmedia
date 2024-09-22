<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class EnvantoDownloaderController extends Controller
{
    public function showEnvantoDownloader()
    {
        // Meta description dan keywords yang relevan untuk Envanto
        $metaDescription = "Bilik Media offers a fast and easy service to download files from Envato. Get your desired files effortlessly.";
        $metaKeywords = "Envato, Download Envato Files, Envato Downloader, Bilik Media, Fast Envato Downloads";
        $products = Product::withCount('downloads') // Menghitung jumlah unduhan
        ->withAvg('ratings', 'rating') // Mengambil rata-rata rating
        ->orderBy('downloads_count', 'desc')
        ->take(12)
        ->get();
        
        $data = [
            'title' => 'Envato Downloader | Bilik Media',
            'description' => $metaDescription, // Deskripsi yang lebih relevan dengan Envanto
            'products' => $products, // Deskripsi yang lebih relevan dengan Envanto
            'keywords' => $metaKeywords // Kata kunci SEO yang fokus pada Envanto
        ];

        // Tampilkan view dengan data yang dikirim
        return view('Downloader.envanto', $data);
    }
}
