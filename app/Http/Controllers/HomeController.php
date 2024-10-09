<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Credit; 

class HomeController extends Controller
{
 
    public function index()
    {
        $metaDescription = "Bilik Media menyediakan jasa digital seperti pembuatan website, download elemen, dan berbagai solusi terbaik untuk bisnis Anda.";
        $metaKeywords = "Jasa Digital, Pembuatan Website, SEO, Download Elemen, Digital Marketing, Bilik Media";
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

        // Data yang dikirim ke view
        $data = [
            'title' => 'Bilik Media',
            'description' => $metaDescription,
            'keywords' => $metaKeywords,
            'userDetail' => $userDetail,
        ];

        // Mengarahkan ke view 'Index.index'
        return view('Index.index', $data);
    }

    

 
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'This page gives you information about our company.',
        ];

        return view('about', $data);
    }
}
