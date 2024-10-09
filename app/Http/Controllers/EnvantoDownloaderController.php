<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Ad;
use App\Models\Credit; 
use Illuminate\Support\Facades\Auth;

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
        $userDetail         = null;
        
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
        
        $data = [
            'title' => 'Free Envato Downloader Tool - Download Envato Elements Easily | Bilik Media',
            'description'   => $metaDescription,
            'products'      => $products, 
            'userDetail'      => $userDetail, 
            'keywords'      => $metaKeywords,
            'sideAd'        => $sideAd,          
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd, 
        ];

        return view('Downloader.envanto', $data);
    }
}
