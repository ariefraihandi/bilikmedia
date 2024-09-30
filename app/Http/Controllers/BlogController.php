<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    public function showWebsiteTemplate()
    {
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
        

        // Kirim data produk dan meta ke view
        $data = [
            'title' => 'Website Template',
            'description' => $metaDescription,
            'keywords' => $metaKeywords,
            'products' => $products, // Kirim data produk ke view
            'featuredProduct' => $featuredProduct, // Produk acak untuk gambar utama
        ];

        return view('Blog.websiteTemp', $data);
    }
}
