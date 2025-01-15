<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    use HasFactory;

    protected $table = 'topup';
    public $timestamps = false;
    
    protected $fillable = ['topup_no','saldo', 'bonus', 'topup_status', 'waktu', 'topup_token', 'dompet_id'] ;
    public function users() {
        return $this->hasOne(Users::class);
    }
}
