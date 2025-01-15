<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kurir;
use App\Models\Layanan;

class KurirController extends Controller
{
    public function index()
    {
        $kurir = Kurir::all();
        $layanan = Layanan::all();
        return view("admin.kurir.index", ['kurir' => $kurir], compact('layanan'));
    }

    public function create()
    {
        $layanan = Layanan::get();
        return view('admin.kurir.create', compact('layanan'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required |  max:45',
                'no_tlp' => 'required | numeric',
                'jadwal' => 'required | max:45',

            ],
            [
                'nama.required' => 'Wajib diisi',
                'no_tlp.required' => 'Wajib diisi',
                'jadwal.required' => 'Wajib diisi',


                'no_tlp.numeric' => 'Harus Angka',
                'nama.unique' => 'Nama Sudah Terdaftar',
                'nama.max' => 'Maksimal 45 Karakter',
                'jadwal.max' => 'Maksimal 45 Karakter',
            ]
        );

        $kurir = new kurir;
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->layanan_id = $request->layanan_id;
        $kurir->save();
        return redirect('admin/kurir')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        $kurir = kurir::all()
            ->where('id', $id);
        return view("admin.kurir.detail", ['kurir' => $kurir]);
    }

    public function edit(string $id)
    {
        $kurir = kurir::all()
            ->where('id', $id);
        $layanan = Layanan::get();
        return view("admin.kurir.edit", compact("kurir", "layanan"));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required | max:45',
                'no_tlp' => 'required | numeric',
                'jadwal' => 'required | max:45',

            ],
            [
                'nama.required' => 'Wajib diisi',
                'no_tlp.required' => 'Wajib diisi',
                'jadwal.required' => 'Wajib diisi',


                'no_tlp.numeric' => 'Harus Angka',
                'nama.max' => 'Maksimal 45 Karakter',
                'jadwal.max' => 'Maksimal 45 Karakter',
            ]
        );

        $kurir = kurir::find($id);
        $kurir->nama_kurir = $request->nama;
        $kurir->nomor_telepon =  $request->no_tlp;
        $kurir->jadwal = $request->jadwal;
        $kurir->layanan_id = $request->layanan_id;
        $kurir->save();
        return redirect('admin/kurir')->with('success', 'Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        kurir::find($id)->delete();
        return redirect('admin/kurir')->with('success', 'Data Berhasil Dihapus!!');
    }
}
