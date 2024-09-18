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

    // Secara otomatis membuat UUID saat membuat data
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}
