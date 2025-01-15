<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

use App\Models\Pengiriman;
use App\Models\Kurir;
use App\Models\Layanan;
use App\Models\Penerima;
use App\Models\Pembayaran;
use App\Http\Resources\LacakResource;
use App\Http\Resources\DetailLacakResource;
use App\Models\Users;

class LacakController extends Controller
{
    public function index1()
    {
        return view("homepage.lacakpaket.index");
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $kode)
    {
        $pengiriman = Pengiriman::find($kode);
        $akun = Users::all();
        $kurir = Kurir::all();

        return new DetailLacakResource($pengiriman, $akun, $kurir);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
