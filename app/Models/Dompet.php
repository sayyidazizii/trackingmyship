<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;

    protected $table = 'dompet';
    public $timestamps = false;
    
    protected $fillable = ['saldo', 'bonus'] ;
    public function users() {
        return $this->hasOne(Users::class);
    }
}
