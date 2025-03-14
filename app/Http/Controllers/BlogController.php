<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Ad;
use App\Models\Credit;
use App\Models\AdCredit;
use App\Models\DownloadsFree;
use Illuminate\Support\Facades\Auth;
use App\Models\Download;
use App\Models\ProductCategory;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function showPremiumThemes()
    {
        // Meta Description dan Meta Keywords yang kuat
        $metaDescription = "Bilik Media offers premium WordPress themes that are fully responsive, SEO optimized, and easy to customize. Perfect for businesses, blogs, and e-commerce sites.";
        $metaKeywords = "Premium WordPress Themes, Responsive Themes, SEO Optimized WordPress, WordPress Themes for Business, WordPress Themes for Blogs, E-commerce WordPress Themes";
        $metaTitle = "Premium WordPress Themes - Fully Responsive & SEO Optimized for Business & Blogs";

        $data = [
            'title' => $metaTitle,
            'description' => $metaDescription,
            'keywords' => $metaKeywords,
        ];
        // Return the view with meta data
        return view('Blog.premium-themes', $data);
    }

    public function showWebsiteTemplate()
    {
        $token = request()->input('data');         
        // Cari kategori berdasarkan nama
        $category = ProductCategory::where('name', 'Website Template')->first();

        // Ambil produk yang berhubungan dengan kategori tersebut (max 10 produk)
        if ($category) {
            $products = $category->products()->take(9)->get(); // Batas maksimal 10 produk
            $featuredProduct = $products->random(); // Pilih salah satu produk secara acak untuk gambar
        } else {
            $products = collect(); // Jika kategori tidak ditemukan, kembalikan collection kosong
            $featuredProduct = null;
        }

        // Meta description dan keywords
        $metaDescription = "Bilik Media provides digital services such as website development, element downloads, and a variety of solutions to enhance your business.";
        $metaKeywords = "Digital Services, Website Development, SEO, Element Downloads, Digital Marketing, Bilik Media";
        
        $bannerAd           = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $socialAd           = Ad::where('name', 'social')->first();
        $smallAd           = Ad::where('name', 'small')->first();
        $petakAd           = Ad::where('name', 'petak')->first();
        $besarAd           = Ad::where('name', 'besar')->first();
        $nativeAd           = Ad::where('name', 'native')->first();
        $popAd           = Ad::where('name', 'pop')->first();

        // Kirim data produk dan meta ke view
        $data = [
            'title' => 'Website Template',
            'description' => $metaDescription,
            'keywords' => $metaKeywords,
            'products' => $products, // Kirim data produk ke view
            'featuredProduct' => $featuredProduct,
            'token'         => $token,
            'bannerAd'      => $bannerAd,     
            'socialAd'      => $socialAd, 
            'smallAd'      => $smallAd, 
            'petakAd'      => $petakAd, 
            'besarAd'      => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'sideAd'      => $sideAd, 
            'popAd'      => $popAd, 
        ];

        return view('Blog.websiteTemp', $data);
    }
    
    public function showAdobePhotoshop()
    {
        $token = request()->input('data');  

        $download = Download::where('token', $token)->first();
    
        if (!$download) {
            return redirect()->back()->withErrors('Download link is invalid.');
        }

        $product = $download->product;

        $category = ProductCategory::where('name', 'Adobe Photoshop')->first();

        // Ambil produk yang berhubungan dengan kategori tersebut (max 10 produk)
        if ($category) {
            $products = $category->products()->take(9)->get(); // Batas maksimal 10 produk
            $featuredProduct = $products->random(); // Pilih salah satu produk secara acak untuk gambar
        } else {
            $products = collect(); // Jika kategori tidak ditemukan, kembalikan collection kosong
            $featuredProduct = null;
        }

        // Meta description dan keywords yang lebih relevan
        $metaDescription = "Bilik Media offers a wide variety of high-quality Adobe Photoshop templates, designed to meet your creative needs. Explore and download premium templates to enhance your design projects.";
        $metaKeywords = "Adobe Photoshop Templates, PSD Templates, Photoshop Design Resources, Free PSD Downloads, Creative Templates, Graphic Design Templates, Bilik Media";

        $bannerAd           = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd           = Ad::where('name', 'small')->first();
        $petakAd           = Ad::where('name', 'petak')->first();
        $besarAd           = Ad::where('name', 'besar')->first();
        $nativeAd           = Ad::where('name', 'native')->first();
        $monetagAd           = Ad::where('name', 'monetag')->first();

        // Kirim data produk dan meta ke view
        $data = [
            'title' => 'Adobe Photoshop Templates | Premium PSD Designs',
            'description'   => $metaDescription,
            'keywords'      => $metaKeywords,
            'products'      => $products, // Kirim data produk ke view
            'featuredProduct' => $featuredProduct,           
            'bannerAd'          => $bannerAd,     
            'monetagAd'      => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'sideAd'        => $sideAd, 
          'product' => $product,  
        ];

        return view('Blog.adobeTemp', $data);
    }

    public function showAdOne($token)
    {
        $user           = Auth::user();
        $userDetail     = $user->userDetail;

        $adCredit = AdCredit::where('token_1', $token)                            
                            ->first();                      

        if (!$adCredit) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }        

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();

        $data = [
            'title'         => 'Why Choose Bilik Media for Downloading Envato Products | Bilik Media',
            'adCredit'      => $adCredit,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'sideAd'        => $sideAd, 
        ];

        return view('Blog.adsOne', $data);
    }

    public function showAdTwo($token)
    {
        $user = Auth::user();
        $userDetail = $user ? $user->userDetail : null;

        // Cari berdasarkan token_2, bukan token_1
        $adCredit = AdCredit::where('token_2', $token)->first();                      

        if (!$adCredit) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();

        $data = [
            'title' => 'What is Envato Downloader? | Bilik Media',
            'adCredit' => $adCredit,
            'userDetail' => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'sideAd'        => $sideAd,
        ];

        return view('Blog.adsTwo', $data);
    }
    
    public function showAdThree($token)
    {
        $user = Auth::user();
        $userDetail = $user ? $user->userDetail : null;

        $adCredit = AdCredit::where('token_3', $token)->first();                      

        if (!$adCredit) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();

        $data = [
            'title' => 'Become Bilik Media Member | Bilik Media',
            'adCredit' => $adCredit,
            'userDetail' => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'sideAd'        => $sideAd,
        ];

        return view('Blog.adsThree', $data);
    }
    
    public function showAdFour($token)
    {
        $user = Auth::user();
        $userDetail = $user ? $user->userDetail : null;

        // Cari berdasarkan token_2, bukan token_1
        $adCredit = AdCredit::where('token_4', $token)->first();                      

        if (!$adCredit) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();

        $data = [
            'title' => 'What is Freepik Downloader? | Bilik Media',
            'adCredit' => $adCredit,
            'userDetail' => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'sideAd'        => $sideAd,
        ];

        return view('Blog.adsFour', $data);
    }
    
    public function showAdFive($token)
    {
        $user = Auth::user();
        $userDetail = $user ? $user->userDetail : null;

        // Cari berdasarkan token_2, bukan token_1
        $adCredit = AdCredit::where('token_5', $token)->first();                      

        if (!$adCredit) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();

        $data = [
            'title' => 'What is Mixkit Downloader ?| Bilik Media',
            'adCredit' => $adCredit,
            'userDetail' => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'sideAd'        => $sideAd,
        ];

        return view('Blog.adsFive', $data);
    }


    public function showOne($token)
    {
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

        $token = DownloadsFree::where('token_satu', $token)->first();                      

        if (!$token) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }                

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title'         => 'Why Choose Bilik Media for Downloading Envato Products | Bilik Media',
            'token'         => $token,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
        ];

        return view('Blog.adsBlog_a', $data);
    }
    
    public function showTwo($token)
    {
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

        $token = DownloadsFree::where('token_dua', $token)->first();                      

        if (!$token) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }                

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title' => 'What is Envato Downloader? | Bilik Media',
            'token'         => $token,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
        ];

        return view('Blog.adsBlog_b', $data);
    }
    
    public function showThree($token)
    {
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

        $token = DownloadsFree::where('token_tiga', $token)->first();       
        $productId = $token->product_id;

        // Cari produk berdasarkan 'product_id' dan ambil 'url_download'
        $product = Product::where('id', $productId)->first();
        $urlDownload = $product->url_download;                       

        if (!$token) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }                

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title' => 'Become Bilik Media Member | Bilik Media',
            'token'         => $token,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
            'urlDownload'   => $urlDownload, 
        ];

        return view('Blog.adsBlog_c', $data);
    }

    public function showFour($token)
    {
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

        $token = DownloadsFree::where('token_empat', $token)->first();                      

        if (!$token) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }                

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title'         => 'What is Freepik Downloader? | Bilik Media',
            'token'         => $token,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
        ];

        return view('Blog.adsBlog_d', $data);
    }
    
    public function showFive($token)
    {
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

        $token = DownloadsFree::where('token_lima', $token)->first();                      

        if (!$token) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }                

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title'         => 'What is Mixkit Downloader ?| Bilik Media',
            'token'         => $token,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
        ];

        return view('Blog.adsBlog_e', $data);
    }
    
    public function showSix($token)
    {
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

        $token = DownloadsFree::where('token_enam', $token)->first();                      

        if (!$token) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }                

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title'         => 'Why Choose Bilik Media for Downloading Envato Products | Bilik Media',
            'token'         => $token,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
        ];

        return view('Blog.adsBlog_f', $data);
    }
    
    public function showSeven($token)
    {
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

        $token = DownloadsFree::where('token_tujuh', $token)->first();                      

        if (!$token) {
            return redirect()->route('credit.dashboard')->with('error', 'Invalid Data. Please try again.');
        }              
        
        $productId = $token->product_id;

        // Cari produk berdasarkan 'product_id' dan ambil 'url_download'
        $product = Product::where('id', $productId)->first();
        $urlDownload = $product->url_download;        

        $bannerAd         = Ad::where('name', 'banner')->first();
        $sideAd           = Ad::where('name', 'side')->first();
        $smallAd          = Ad::where('name', 'small')->first();
        $petakAd          = Ad::where('name', 'petak')->first();
        $besarAd          = Ad::where('name', 'besar')->first();
        $nativeAd         = Ad::where('name', 'native')->first();
        $monetagAd        = Ad::where('name', 'monetag')->first();
        $popAd            = Ad::where('name', 'pop')->first();
        $socialAd         = Ad::where('name', 'social')->first();

        $data = [
            'title' => 'Use Envato Downloader | Bilik Media',
            'token'         => $token,
            'userDetail'    => $userDetail,
            'bannerAd'      => $bannerAd,     
            'monetagAd'     => $monetagAd, 
            'smallAd'       => $smallAd, 
            'petakAd'       => $petakAd, 
            'besarAd'       => $besarAd, 
            'nativeAd'      => $nativeAd, 
            'popAd'         => $popAd, 
            'sideAd'        => $sideAd, 
            'socialAd'      => $socialAd, 
            'urlDownload'   => $urlDownload, 
        ];

        return view('Blog.adsBlog_g', $data);
    }

}
