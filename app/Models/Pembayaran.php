<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    public $timestamps = false;

    protected $fillable = ['metode', 'harga_total', 'keterangan', 'pengiriman_id', 'akun_id'] ;

    public function pengiriman() {
        return $this->belongsTo(Pengiriman::class) ;
    }

    public function users() {
        return $this->belongsTo(Users::class) ;
    }
}
