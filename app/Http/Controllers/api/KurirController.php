<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Kurir;
use App\Models\Pengiriman;
use App\Models\User;
use App\Http\Resources\KurirResource;
use Illuminate\Support\Facades\Validator;

class KurirController extends Controller
{
    //
    public function index()
    {
        $kurir = Kurir::join('nama_kurir', 'nomor_telepon', 'jadwal', 'layanan_id')
            ->get();
        return new KurirResource(true, "Data Kurir", $kurir);
    }
    public function show($id)
    {
        $kurir = Kurir::join('nama_kurir', 'nomor_telepon', 'jadwal', 'layanan_id')
            ->where('kurir.id', $id)
            ->get();
        return new KurirResource(true, "Detail Layanan", $kurir);
    }
    public function store(Request $request)
    {
        // $request->validate(
        $validator = Validator::make($request->all(), [

            'nama' => 'required |  max:45',
            'no_tlp' => 'required | numeric',
            'jadwal' => 'required | max:45',
            'layanan_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 442);
        }

        DB::table('layanan')->insert([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'biaya' => $request->biaya,
        ]);
        return new KurirResource(true, 'Data Layanan Berhasil diTambahkan', $kurir);
    }
}
