<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Layanan;
use App\Http\Resources\LayananResource;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    //
    public function index()
    {
        $layanan = Layanan::join('nama', 'biaya')
            ->get();
        return new LayananResource(true, "Data Layanan", $layanan);
    }

    public function show($id)
    {
        $layanan = Layanan::join('nama', 'biaya')
            ->where('layanan.id', $id)
            ->get();
        return new LayananResource(true, "Detail Layanan", $layanan);
    }

    public function store(Request $request)
    {
        // $request->validate(
        $validator = Validator::make($request->all(), [

            'nama' => 'required|max:45',
            'biaya' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        DB::table('layanan')->insert([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'biaya' => $request->biaya,
        ]);
        return new LayananResource(true, 'Data Layanan Berhasil diTambahkan', $layanan);
    }

    public function edit(string $id)
    {
        $layanan = DB::table('layanan')->get();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'nama' => 'required|max:45',
            'biaya' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        $produk = Layanan::whereId($id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'biaya' => $request->biaya,
        ]);
        return new LayananResource(true, 'Data Berhasil Diubah', $layanan);
    }
}
