<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan';
    public $timestamps = false;
    
    protected $fillable = ['nama_layanan', 'biaya'] ;
    public function pengiriman() {
        return $this->hasMany(Pengiriman::class, 'layanan_id');
    }
    public function kurir() {
        return $this->hasMany(Kurir::class, 'layanan_id');
    }
}
