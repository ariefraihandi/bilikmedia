<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Product; // Import Model Product
use App\Models\ProductCategory; // Import Model ProductCategory
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function generate()
    {
        // Buat instance sitemap
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))            // Halaman Home
            ->add(Url::create('/about'))       // Halaman About
            ->add(Url::create('/envanto-downloader') // Halaman Envanto Downloader
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.9)); // Prioritas lebih tinggi untuk halaman ini

        // Ambil semua produk dari database
        $products = Product::all();

        // Loop untuk menambahkan setiap produk dinamis
        foreach ($products as $product) {
            $sitemap->add(Url::create("/product-details/{$product->slug}")
                ->setLastModificationDate($product->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        }

        // Ambil semua kategori dari database
        $categories = ProductCategory::all();

        // Loop untuk menambahkan setiap kategori dinamis
        foreach ($categories as $category) {
            $sitemap->add(Url::create("/product/category/{$category->slug}")
                ->setLastModificationDate($category->updated_at ?? now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.7));
        }

        // Tulis sitemap ke file sitemap.xml di folder public
        $sitemap->writeToFile(public_path('sitemap.xml'));

        return Response::make('Sitemap created successfully.', 200);
    }

    public function viewSitemap()
    {
        // Cek apakah file sitemap sudah ada
        $file = public_path('sitemap.xml');

        // Jika file tidak ada, generate sitemap dulu
        if (!file_exists($file)) {
            $this->generate();
        }

        return response()->file($file);
    }
}
