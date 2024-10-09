<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailVerifiedToken extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'email_verified_tokens'; // Tabel yang digunakan

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'email'; // Menggunakan email sebagai primary key

    /**
     * The "type" of the primary key.
     *
     * @var string
     */
    protected $keyType = 'string'; // Primary key berupa string (email)

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false; // Non-incrementing key karena kita menggunakan email

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
