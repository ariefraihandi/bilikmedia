<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Ad;
use App\Models\Credit; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MotionArrayDownloaderController extends Controller
{
    public function showMotionArrayDownloader()
    {        
        $metaDescription = "Easily download Motion Array assets for free with Bilik Media’s convenient tool! Access top creative files instantly.";
        $metaKeywords = "motion array downloader, download motion array templates, motion array video download, download motion array assets for free, free motion array downloads, quick motion array files";
   
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
            'title' => 'Free Motion Array Downloader Tool - Easily Download Motion Array Assets',
            'description'   => $metaDescription,
     
            'userDetail'    => $userDetail, 
            'keywords'      => $metaKeywords,
            'sideAd'        => $sideAd,          
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd, 
            'smallAd'       => $smallAd, 
        ];

        return view('Downloader.motionarray', $data);
    }
}