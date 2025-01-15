<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengiriman;
use App\Models\Kurir;
use App\Models\Layanan;
use App\Models\Penerima;
use App\Models\Pembayaran;
use App\Http\Resources\LacakResource;
use App\Http\Resources\DetailLacakResource;
use App\Models\Users;

class pageLacakController extends Controller
{
    public function index1()
    {
        return view('user.lacakpaket.index');
    }
    
    public function index()
    {
        $pengiriman = Pengiriman::all();
        $akun = Users::all();
        $kurir = Kurir::all();
        $penerima = Penerima::all();
        $pembayaran = Pembayaran::all();
        $layanan = Layanan::all();
        return LacakResource::collection($pengiriman, $akun, $kurir, $penerima, $pembayaran, $layanan);
    }
}
