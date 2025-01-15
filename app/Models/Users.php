<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    public $timestamps = false;

    protected $fillable = [
        'fullname',
        'username',
        'email',
        'password',
        'level',
        'alamat',
        'foto',
        'dompet_id'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class);
    }

    public function dompet()
    {
        return $this->belongsTo(Dompet::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
