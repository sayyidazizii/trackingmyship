<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Pengiriman;
use App\Models\Layanan;
use App\Models\Kurir;
use App\Models\Paket;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    // fungsi index
    public function index() {
        $pengiriman = Pengiriman::count();
        $layanan = Layanan::count();
        $kurir = Kurir::count();
        $pembayaran = Pembayaran::count();
        $saldo = Paket::count();

        $tbpengiriman = Pengiriman::join("paket", "pengiriman.paket_id", "=", "paket.id")
        ->select('pengiriman.*', 'paket.berat AS paket_berat', 'paket.deskripsi AS paket_deskripsi')
        ->limit('5')
        ->get();
        $tbkurir = Kurir::all();
        $tblayanan = Layanan::all();

        $jpembayaran = DB::table('pembayaran')
        ->selectRaw('metode, COUNT(metode) as jumlah')
        ->groupBy('metode')
        ->get();
        $jlayanan = DB::table('pengiriman')
        ->join('layanan', 'pengiriman.layanan_id', '=', 'layanan.id')
        ->selectRaw('layanan_id, layanan.nama_layanan as nama_layanan, count(layanan_id) as jumlah')
        ->groupBy('layanan_id', 'layanan.nama_layanan')
        ->get();
      
       
        return view("admin.dashboard", 
        compact('pengiriman', 'layanan', 'kurir', 'pembayaran', 'tbpengiriman', 'tbkurir', 'tblayanan', 'saldo', 'jpembayaran', 'jlayanan'));
    }
}
