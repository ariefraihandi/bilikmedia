<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class EnvantoDownloaderController extends Controller
{
    public function showEnvantoDownloader()
    {
        // Meta description dan keywords yang relevan untuk Envanto
        $metaDescription = "Bilik Media menyediakan jasa download file dari Envanto dengan mudah dan cepat.";
        $metaKeywords = "Envanto, Download File Envanto, Envanto Downloader, Bilik Media";
        $products = Product::withCount('downloads')
            ->orderBy('downloads_count', 'desc')
            ->take(12)
            ->get();
        // Data yang dikirim ke view
        $data = [
            'title' => 'Envanto Downloader | Bilik Media',
            'description' => $metaDescription, // Deskripsi yang lebih relevan dengan Envanto
            'products' => $products, // Deskripsi yang lebih relevan dengan Envanto
            'keywords' => $metaKeywords // Kata kunci SEO yang fokus pada Envanto
        ];

        // Tampilkan view dengan data yang dikirim
        return view('Downloader.envanto', $data);
    }
}
