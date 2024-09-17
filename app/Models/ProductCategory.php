<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Http\Controllers\SitemapController; // Pastikan ini digunakan dengan benar

class ProductCategory extends Model
{
    use HasFactory, HasUuids;

    // Menentukan nama tabel jika tidak menggunakan nama model sebagai tabel
    protected $table = 'product_category';

    // UUID sebagai primary key
    protected $keyType = 'string';
    public $incrementing = false;

    // Menentukan kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // Relasi many-to-many dengan produk
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category_product', 'category_id', 'product_id');
    }

    // Method boot untuk event listener
    protected static function boot()
    {
        parent::boot();

        // Ketika kategori disimpan (baru atau update), regenerate sitemap
        static::saved(function ($category) {
            app(SitemapController::class)->generate();
        });

        // Ketika kategori dihapus, regenerate sitemap
        static::deleted(function ($category) {
            app(SitemapController::class)->generate();
        });
    }
}
