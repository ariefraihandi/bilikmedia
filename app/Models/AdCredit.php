<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AdCredit extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false; // Disable auto-increment for UUID
    protected $keyType = 'string'; // Specify the key type as string for UUID

    protected $fillable = [
        'id',
        'user_id',
        'redeem_code',
        'token_1',
        'token_2',
        'token_3',
        'token_4',
        'token_5',
        'is_redeemed',
    ];

    /**
     * Boot function from Laravel.
     * Automatically generates a UUID when creating a new AdCredit entry.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid(); // Generate a UUID if not already set
            }
        });
    }

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
