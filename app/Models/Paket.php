<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'paket';
    public $timestamps = false;
    
    protected $fillable = ['berat', 'deskripsi'] ;

    public function pengiriman() {
        return $this->hasOne(Pengiriman::class, 'paket_id');
    }
}
