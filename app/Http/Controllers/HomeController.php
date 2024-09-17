<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    public function index()
    {
        // Jika Anda memiliki data untuk diteruskan ke view, Anda dapat menambahkannya di sini
        $data = [
            'title' => 'Bilik Media',
            'description' => 'This is a simple Laravel application.',
        ];

        // Mengarahkan ke view 'home.blade.php'
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
