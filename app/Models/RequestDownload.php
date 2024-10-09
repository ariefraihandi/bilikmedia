<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RequestDownload extends Model
{
    use HasFactory;

    protected $table = 'request_download';

    // UUID sebagai primary key
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['email', 'url', 'status'];

    // Jika tabel memiliki kolom timestamps (created_at, updated_at), biarkan Laravel mengelola ini
    public $timestamps = true;

    // Secara otomatis membuat UUID saat membuat data
    protected static function boot()
    {
        parent::boot();

        // Set UUID sebagai primary key ketika data dibuat
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    // Relasi dengan model Product (berdasarkan url_source, jika relevan)
    public function product()
    {
        return $this->belongsTo(Product::class, 'url', 'url_source');
    }
}
