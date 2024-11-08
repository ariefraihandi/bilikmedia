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
        $metaDescription = "Download Scribd PDFs, documents, and books for free with Bilik Media's easy tool. Access Scribd content effortlessly!";
        $metaKeywords = "scribd downloader, download scribd pdf, download scribd free, scribd document downloader, download scribd pdf free, free scribd download";

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