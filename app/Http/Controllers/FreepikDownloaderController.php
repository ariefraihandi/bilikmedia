<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Ad;
use App\Models\Credit; 
use Illuminate\Support\Facades\Auth;

class FreepikDownloaderController extends Controller
{
    public function showFreepikDownloader()
    {        
        $metaDescription = "Download Freepik files quickly and for free with Bilik Media's easy-to-use tool. Access Freepik premium images, vectors, and more effortlessly!";
        $metaKeywords = "freepik download, freepik free download, freepik image downloader, freepik premium downloader, freepik premium free download, freepik images free download";
        $products           = Product::withCount('downloads')
                              ->withAvg('ratings', 'rating')
                              ->orderBy('downloads_count', 'desc')
                              ->take(12)
                              ->get();
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
            'title' => 'Freepik Downloader Tool: Easily Download Freepik Elements | Bilik Media',
            'description'   => $metaDescription,
            'products'      => $products, 
            'userDetail'      => $userDetail, 
            'keywords'      => $metaKeywords,
            'sideAd'        => $sideAd,          
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd, 
            'smallAd'      => $smallAd, 
        ];

        return view('Downloader.freepik', $data);
    }
}
