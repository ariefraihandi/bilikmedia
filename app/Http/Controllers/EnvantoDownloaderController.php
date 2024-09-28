<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Ad;

use Illuminate\Http\Request;

class EnvantoDownloaderController extends Controller
{
    public function showEnvantoDownloader()
    {        
        $metaDescription    = "Bilik Media offers a fast and easy service to download files from Envato. Get your desired files effortlessly.";
        $metaKeywords       = "Envato, Download Envato Files, Envato Downloader, Bilik Media, Fast Envato Downloads";
        $products           = Product::withCount('downloads')
                              ->withAvg('ratings', 'rating')
                              ->orderBy('downloads_count', 'desc')
                              ->take(12)
                              ->get();
        $sideAd             = Ad::where('name', 'side')->first();
        $bannerAd           = Ad::where('name', 'banner')->first();
        $socialAd           = Ad::where('name', 'social')->first();
        
        $data = [
            'title' => 'Envato Downloader | Bilik Media',
            'description'   => $metaDescription,
            'products'      => $products, 
            'keywords'      => $metaKeywords,
            'sideAd'        => $sideAd,          
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd, 
        ];

        // Tampilkan view dengan data yang dikirim
        return view('Downloader.envanto', $data);
    }
}
