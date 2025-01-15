<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    public $timestamps = false;

    protected $fillable = ['kode', 'tanggal', 'lokasi_tujuan', 'status', 'bukti_foto', 'paket_id', 'layanan_id', 'penerima_id', 'akun_id', 'kurir_id'] ;

    public function paket() {
        return $this->belongsTo(Paket::class) ;
    }

    public function layanan() {
        return $this->belongsTo(Layanan::class) ;
    }

    public function users() {
        return $this->belongsTo(Users::class) ;
    }

    public function penerima() {
        return $this->belongsTo(Penerima::class) ;
    }

    public function pembayaran() {
        return $this->hasMany(pembayaran::class, 'pengiriman_id') ;
    }
}
