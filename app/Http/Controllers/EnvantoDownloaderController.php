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
        $metaDescription = "Download Envato Elements files for free, including templates, videos, and more with Bilik Media's easy-to-use tool. Access your creative assets effortlessly!";
        $metaKeywords = "envato elements free download, envato elements downloader, download envato templates for free, envato free download, envato download";
   
        $sideAd             = Ad::where('name', 'side')->first();
        $bannerAd           = Ad::where('name', 'banner')->first();
        $socialAd           = Ad::where('name', 'social')->first();
        $smallAd           = Ad::where('name', 'small')->first();
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
            'title' => 'Free Envato Downloader Tool - Easily Download Envato Elements',
            'description'   => $metaDescription,
     
            'userDetail'      => $userDetail, 
            'keywords'      => $metaKeywords,
            'sideAd'        => $sideAd,          
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd, 
            'smallAd'      => $smallAd, 
        ];

        return view('Downloader.envanto', $data);
    }
}
