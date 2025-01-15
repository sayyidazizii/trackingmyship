<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Penerima;

class PenerimaController extends Controller
{
    public function index()
    {
        $penerima = Penerima::all();
        return view("admin.penerima.index", compact("penerima"));
    }

    public function create()
    {
        // return view('admin.penerima.create');
    }

    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'nama' => 'required|max:45',
        //         'nomor_telepon' => 'required|max:45',
        //     ],
        //     [
        //         'nama.required' => 'Wajib diisi',
        //         'nomor_telepon.required' => 'wajib diisi',
        //     ]
        // );

        // $penerima = new Penerima;
        // $penerima->nama = $request->nama;
        // $penerima->nomor_telepon = $request->nomor_telepon;
        // $penerima->save();

        // return redirect('admin/penerima')->with('success','Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // $penerima = penerima::all()->where('id', $id);
        // return view('admin.penerima.edit', compact('penerima'));
    }

    public function update(Request $request, string $id)
    {
        // $penerima = penerima::find($id);
        // $penerima->nama = $request->nama;
        // $penerima->nomor_telepon = $request->no_tlp;
        // $penerima->save();

        // return redirect('admin/penerima')->with('success','Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        // penerima::find($id)->delete();
        // return redirect('admin/penerima')->with('success','Data Berhasil Dihapus!!');
    }
}
