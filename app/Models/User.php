<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', // Ganti 'name' menjadi 'username'
        'email',
        'password',
        'role',      // Tambahkan role
        'status',    // Tambahkan status
        'reffered_by',    // Tambahkan reffered_by
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Use UUID as the primary key.
     *
     * @var bool
     */
    protected $keyType = 'string';  // Menggunakan tipe string untuk UUID

    /**
     * Disable auto-incrementing because we are using UUIDs.
     *
     * @var bool
     */
    public $incrementing = false;   // UUID tidak auto-increment

    /**
     * Boot function from Laravel.
     * Automatically generate UUID for the user.
     */
    protected static function boot()
    {
        parent::boot();

        // Generate UUID when creating a new user
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid(); // Set UUID for the user
            }
        });
    }

    /**
     * Definisikan relasi hasOne ke model UserDetail.
     * Relasi ini berarti satu user memiliki satu user detail.
     */
    public function userDetail()
    {
        return $this->hasOne(UserDetail::class, 'user_id', 'id');
    }

    public function referredBy()
    {
        return $this->belongsTo(User::class, 'reffered_by');
    }
}
