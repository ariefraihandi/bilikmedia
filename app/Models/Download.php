<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Download extends Model
{
    use HasFactory;

    // Menggunakan UUID sebagai primary key
    public $incrementing = false;
    protected $keyType = 'string';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'product_id',
        'token',
        'expires_at',
    ];

    // Secara otomatis membuat UUID ketika download baru dibuat
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Jika ID belum ada, buat UUID secara otomatis
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Relasi dengan model Product (Many-to-One)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Cek apakah token masih valid (tidak kedaluwarsa)
    public function isTokenValid()
    {
        return $this->expires_at && $this->expires_at->isFuture();
    }

    // Format expires_at sebagai Carbon instance
    protected $dates = ['expires_at'];
}
