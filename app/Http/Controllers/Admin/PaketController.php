<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view("admin.paket.index", compact("paket"));
    }

    public function create()
    {
        // return view('admin.paket.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'berat' => 'required|integer',
        //     'deskripsi' => 'required|string|max:255',
        // ],
        // [
        //     'berat.required' => 'Berat barang harus diisi',
        //     'deskripsi.required' => 'Deskripsi harus diisi',
        // ]);
        // //
        // $paket =  new paket;
        // $paket->berat = $request->berat;
        // $paket->deskripsi = $request->deskripsi;
        // $paket->save();
        // return redirect('admin/paket')->with('success','Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        // $paket = Paket::all()
        // ->where('id', $id);
        // return view("admin.paket.edit", compact("paket"));
    }

    public function update(Request $request, string $id)
    {
        // $request->validate([
        //     'berat' => 'required|integer',
        //     'deskripsi' => 'required|string|max:255',
        // ],
        // [
        //     'berat.required' => 'Berat barang harus diisi',
        //     'deskripsi.required' => 'Deskripsi harus diisi',
        // ]);
        // //
        // $paket = Paket::find($id);
        // $paket->berat = $request->berat;
        // $paket->deskripsi = $request->deskripsi;
        // $paket->save();
        // return redirect('admin/paket')->with('success','Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        // Paket::find($id)->delete();
        // return redirect('admin/paket')->with('success','Data Berhasil Dihapus!!');
    }
}
