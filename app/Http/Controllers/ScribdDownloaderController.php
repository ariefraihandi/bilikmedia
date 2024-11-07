<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Ad;
use App\Models\Credit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ScribdDownloaderController extends Controller
{
    public function showScribdDownloader()
    {        
        $metaDescription = "Download Scribd documents quickly and for free with Bilik Media's easy-to-use tool!";
        $metaKeywords = "scribd downloader, download scribd files, how to download from scribd for free, quick scribd downloads";

        $sideAd = Ad::where('name', 'side')->first();
        $bannerAd = Ad::where('name', 'banner')->first();
        $socialAd = Ad::where('name', 'social')->first();
        $smallAd = Ad::where('name', 'small')->first();
        $userDetail = null;
        
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
            'title' => 'Free Scribd Downloader Tool - Easily Download Scribd Documents',
            'description' => $metaDescription,
            'userDetail' => $userDetail,
            'keywords' => $metaKeywords,
            'sideAd' => $sideAd,
            'bannerAd' => $bannerAd,
            'socialAd' => $socialAd,
            'smallAd' => $smallAd,
        ];

        return view('Downloader.scribd', $data);
    }
}