<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LandingPage extends Model
{
    use HasFactory;

    // Tentukan kolom yang bisa diisi secara massal
    protected $fillable = [
        'title', 'description', 'thumbnail', 'target_url', 'code', 'slug',
    ];

    // Gunakan UUID sebagai primary key
    protected $keyType = 'string';  // Menentukan bahwa ID adalah string (UUID)
    public $incrementing = false;  // Menonaktifkan auto increment pada ID

    // Set UUID secara otomatis sebelum model disimpan
    protected static function booted()
    {
        static::creating(function ($model) {
            // Menghasilkan UUID untuk kolom id jika belum ada
            $model->id = (string) Str::uuid();
            // Generate slug berdasarkan judul
            $model->slug = Str::slug($model->title);
        });
    }
}
