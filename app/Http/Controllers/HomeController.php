<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function index()
    {
        // Meta description dan keywords yang ingin dikirim
        $metaDescription = "Bilik Media menyediakan jasa digital seperti pembuatan website, download elemen, dan berbagai solusi terbaik untuk bisnis Anda.";
        $metaKeywords = "Jasa Digital, Pembuatan Website, SEO, Download Elemen, Digital Marketing, Bilik Media";
        
        // Data yang dikirim ke view
        $data = [
            'title' => 'Bilik Media',
            'description' => $metaDescription, // Gunakan variabel meta description
            'keywords' => $metaKeywords // Gunakan variabel meta keywords
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
