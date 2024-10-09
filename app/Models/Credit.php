<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Credit extends Model
{
    use HasUuids; // Untuk menggunakan UUID sebagai primary key

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'credits';

    // Tentukan bahwa primary key adalah 'uuid'
    protected $primaryKey = 'uuid';

    // Nonaktifkan auto-increment
    public $incrementing = false;

    // Tipe primary key adalah string (UUID)
    protected $keyType = 'string';

    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'uuid',           // UUID untuk primary key
        'user_id',        // User ID tanpa foreign key constraint
        'credit_amount',  // Jumlah kredit
        'credit_type',    // Jenis kredit
        'is_expires',     // Apakah kredit akan expired
        'expires_at',     // Waktu kedaluwarsa
    ];

    // Tentukan tipe kolom yang khusus
    protected $casts = [
        'is_expires' => 'boolean',
        'expires_at' => 'datetime',
    ];

    // Definisikan relasi jika diperlukan
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function isExpired()
    {
        return $this->is_expires && $this->expires_at->isPast();
    }

}
