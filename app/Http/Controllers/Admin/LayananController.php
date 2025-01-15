<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view("admin.layanan.index", compact('layanan'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|max:45',
                'biaya' => 'required|numeric',
            ],
            [
                'nama.required' => 'Layanan barang harus diisi',
                'biaya.required' => 'Biaya Layanan harus diisi',
            ]
        );
        //
        $layanan = new layanan;
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $layanan->save();
        return redirect('admin/layanan')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        //
        $layanan = layanan::all()
            ->where('id', $id);
        return view("admin.layanan.detail", compact('layanan'));
    }

    public function edit(string $id)
    {
        //
        $layanan = layanan::all()
            ->where('id', $id);
        return view("admin.layanan.edit", compact("layanan"));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|max:45',
                'biaya' => 'required|numeric',

            ],
            [
                'nama.required' => 'Layanan barang harus diisi',
                'biaya.required' => 'Biaya Layanan harus diisi',

            ]
        );
        //
        $layanan = layanan::find($id);
        $layanan->nama_layanan = $request->nama;
        $layanan->biaya = $request->biaya;
        $layanan->save();
        return redirect('admin/layanan')->with('success', 'Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        //
        layanan::find($id)->delete();
        return redirect('admin/layanan')->with('success', 'Data Berhasil Dihapus!!');
    }

    public function apiLayanan()
    {
        $layanan = Layanan::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data Layanan',
                'data' => $layanan
            ],
            200
        );
    }

    public function apiLayananDetail($id)
    {
        $layanan = Layanan::find($id);
        if ($layanan) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Layanan',
                    'data' => $layanan
                ],
                200
            );
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Detail Layanan Tidak Ditemukan'
            ], 400);
        }
    }
}
