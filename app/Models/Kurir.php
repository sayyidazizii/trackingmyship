<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    use HasFactory;

    protected $table = 'kurir';
    public $timestamps = false;
    
    protected $fillable = ['nama_kurir', 'nomor_telepon', 'jadwal', 'layanan_id'] ;
    public function layanan() {
        return $this->belongsTo(Layanan::class);
    }
}
