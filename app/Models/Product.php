<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan oleh model ini
    protected $table = 'products';

    // UUID sebagai primary key
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

    // Fungsi boot untuk otomatis mengisi UUID saat membuat record
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    // Relasi many-to-many dengan kategori produk
    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_product', 'product_id', 'category_id');
    }
}
