<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProductCategory extends Model
{
    use HasFactory, HasUuids;

    // Menentukan nama tabel jika tidak menggunakan nama model sebagai tabel
    protected $table = 'product_category';

    // Menentukan kolom yang boleh diisi secara massal
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    // Jika primary key menggunakan UUID, tambahkan ini
    protected $keyType = 'string';
    public $incrementing = false;

    // Relasi many-to-many dengan produk
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category_product', 'category_id', 'product_id');
    }
}
