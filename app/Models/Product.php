<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Http\Controllers\SitemapController; // Pastikan hanya import yang diperlukan

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'products';

    protected $keyType = 'string';
    public $incrementing = false; // Non-incrementing key

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'title',
        'description',
        'features',
        'tags',
        'types',
        'additions',
        'author',
        'author_url',
        'url_source',
        'url_download',
        'live_preview_url',
        'image',
    ];

    // Tentukan kolom yang disimpan sebagai array atau JSON
    protected $casts = [
        'features' => 'array', 
        'tags' => 'array',     
    ];

    // Relasi many-to-many dengan kategori produk
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_product', 'product_id', 'category_id');
    }

    // Relasi ke model downloads
    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    // Method boot untuk event observer dan UUID
    protected static function boot()
    {
        parent::boot();

        // Otomatis isi UUID saat record dibuat
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });

        // Ketika produk disimpan (baru atau update), regenerate sitemap
        static::saved(function ($product) {
            app(SitemapController::class)->generate();
        });

        // Ketika produk dihapus, regenerate sitemap
        static::deleted(function ($product) {
            app(SitemapController::class)->generate();
        });
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

}
