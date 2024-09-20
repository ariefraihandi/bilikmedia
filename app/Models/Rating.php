<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Product; // Import Product model for relationship

class Rating extends Model
{
    use HasFactory;

    // Set table name if it differs from the plural of the model name
    protected $table = 'ratings';

    // Set the primary key type to string (for UUID)
    protected $keyType = 'string';
    public $incrementing = false; // Ensure non-incrementing UUID

    // Define which fields are mass assignable
    protected $fillable = [
        'product_id',
        'rating',
    ];

    // Boot method to auto-generate UUID when creating a new rating
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    // Define the relationship with Product (belongs to)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
