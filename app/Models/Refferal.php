<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    use HasFactory;
    
    protected $table = 'refferal';

    public $incrementing = false;  // Tidak menggunakan auto-increment karena UUID
    protected $keyType = 'uuid';   // Tipe string untuk UUID

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'refferal_code',
        'uuid',
        'status',
    ];

    /**
     * Relasi ke model User.
     * Setiap referral terhubung dengan user yang membuat referral.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
