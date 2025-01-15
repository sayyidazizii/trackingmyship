<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LacakResource;
use Illuminate\Http\Request;
use App\Models\kurir;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use App\Models\Pengiriman;
use App\Models\Pembayaran;
use App\Models\Dompet;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class LacakController extends Controller
{
    //
    public function index()
    {
        //
        $pengiriman = pengiriman::all();

        $kurir = kurir::all();
        $penerima = penerima::all();
        $layanan = layanan::all();
        $pembayaran = pembayaran::all();
        $dompet = dompet::all();
        $paket = paket::all();
        return LacakResource::collection($pengiriman, $penerima, $kurir, $layanan, $pembayaran, $dompet, $paket);
    }
}
