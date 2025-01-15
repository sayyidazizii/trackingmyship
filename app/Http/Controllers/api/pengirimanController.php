<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kurir;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use App\Models\Pengiriman;
use App\Models\Pembayaran;
use App\Models\Dompet;
use App\Http\Resources\viewPengirimanResource;
use App\Models\Users;

class pengirimanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $pengiriman = pengiriman::all();
        $akun = users::all();
        $kurir = kurir::all();
        $penerima = penerima::all();
        $layanan = layanan::all();
        $pembayaran = pembayaran::all();
        $dompet = dompet::all();
        $paket = paket::all();
        return viewPengirimanResource::collection($pengiriman, $akun, $penerima, $kurir, $layanan, $pembayaran, $dompet, $paket);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $layanan = new layanan;
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $post = $layanan->save();

        return response()->json([
            'status' => true,
            'message' => 'sukses',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $layanan = layanan::find($id);
        if (empty($layanan)) {
            return response()->json([
                'status' => 'false',
                'ms' => 'salah',
            ]);
        }
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $post = $layanan->save();

        return response()->json([
            'status' => true,
            'message' => 'sukses',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
