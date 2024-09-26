<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];

    // Override the boot method to generate UUID when creating a new Ad
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid(); // Generate UUID
        });
    }

    public $incrementing = false; // Disable auto-increment
    protected $keyType = 'string'; // Set primary key type to string
}
