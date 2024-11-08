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
        $metaDescription = "Download Motion Array files for free with Bilik Media's easy tool. Access Motion Array templates, videos, and creative assets instantly!";
        $metaKeywords = "motion array free download, motion array download, free motion array download, motion array templates free download, motion array video download, motion array free downloader";
   
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