<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use App\Models\Pengiriman;
use App\Models\Users;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Pengiriman::all();
        return view("admin.pengiriman.index", ['pengiriman' => $pengiriman]);
    }

    public function create()
    {
        // $paket = Paket::all();
        // $layanan = Layanan::all();
        // $penerima = Penerima::all();
        // $akun = Users::all();
        // $status = ['penjemputan', 'pengiriman', 'terkirim'];
        // return view('admin.pengiriman.create', compact('paket', 'layanan', 'penerima', 'akun', 'status'));
    }

    public function store(Request $request)
    {
        // $request->validate(
        //     [
        //         'kode' => 'required | max:45 | unique:pengiriman',
        //         'tanggal' => 'required',
        //         'lokasi_tujuan' => 'required | max:45',
        //         'status' => 'required',
        //         'paket_id' => 'required | numeric',
        //         'layanan_id' => 'required | numeric',
        //         'penerima_id' => 'required | numeric',
        //         'akun_id' => 'required | numeric',

        //     ],
        //     [
        //         'kode.required' => 'Wajib diisi',
        //         'tanggal.required' => 'Wajib diisi',
        //         'lokasi_tujuan.required' => 'Wajib diisi',

        //         'status.required' => 'Wajib dipilih',
        //         'paket_id.numeric' => 'Wajib dipilih',
        //         'layanan_id.numeric' => 'Wajib dipilih',
        //         'penerima_id.numeric' => 'Wajib dipilih',
        //         'akun_id.numeric' => 'Wajib dipilih',

        //         'kode.max' => 'Maksimal 45 Karakter',
        //         'lokasi_tujuan.max' => 'Maksimal 45 Karakter',

        //         'kode.unique' => 'Data Sudah Ada',
        //     ]
        // );

        // $pengiriman = new Pengiriman;
        // $pengiriman->kode = $request->kode;
        // $pengiriman->tanggal = $request->tanggal;
        // $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        // $pengiriman->status = $request->status;
        // $pengiriman->paket_id = $request->paket_id;
        // $pengiriman->layanan_id = $request->layanan_id;
        // $pengiriman->penerima_id = $request->penerima_id;
        // $pengiriman->users_id = $request->akun_id;
        // $pengiriman->save();

        // return redirect('admin/pengiriman')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        $pengiriman = Pengiriman::all()->where('id', $id);
        return view("admin.pengiriman.detail", ['pengiriman' => $pengiriman]);
    }

    public function edit(string $id)
    {
        // $pengiriman = Pengiriman::all()->where('id', $id);
        // $paket = Paket::all();
        // $layanan = Layanan::all();
        // $penerima = Penerima::all();
        // $akun = Users::all();
        // $status = ['penjemputan', 'pengiriman', 'terkirim'];
        // return view('admin.pengiriman.edit', ['pengiriman' => $pengiriman], compact('paket', 'layanan', 'penerima', 'akun', 'status'));
    }

    public function update(Request $request, string $id)
    {
        // $request->validate(
        //     [
        //         'kode' => 'required | max:45',
        //         'tanggal' => 'required',
        //         'lokasi_tujuan' => 'required | max:45',
        //         'status' => 'required',
        //         'paket_id' => 'required | numeric',
        //         'layanan_id' => 'required | numeric',
        //         'penerima_id' => 'required | numeric',
        //         'akun_id' => 'required | numeric',
        //     ],
        //     [
        //         'kode.required' => 'Wajib diisi',
        //         'tanggal.required' => 'Wajib diisi',
        //         'lokasi_tujuan.required' => 'Wajib diisi',

        //         'status.required' => 'Wajib dipilih',
        //         'paket_id.numeric' => 'Wajib dipilih',
        //         'layanan_id.numeric' => 'Wajib dipilih',
        //         'penerima_id.numeric' => 'Wajib dipilih',
        //         'akun_id.numeric' => 'Wajib dipilih',
        //         'kurir_id.numeric' => 'Wajib dipilih',

        //         'kode.max' => 'Maksimal 45 Karakter',
        //         'lokasi_tujuan.max' => 'Maksimal 45 Karakter',
        //     ]
        // );

        // $pengiriman = Pengiriman::find($id);
        // $pengiriman->kode = $request->kode;
        // $pengiriman->tanggal = $request->tanggal;
        // $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        // $pengiriman->status = $request->status;
        // $pengiriman->paket_id = $request->paket_id;
        // $pengiriman->layanan_id = $request->layanan_id;
        // $pengiriman->penerima_id = $request->penerima_id;
        // $pengiriman->users_id = $request->akun_id;
        // $pengiriman->kurir_id = $request->kurir_id;
        // $pengiriman->save();

        // return redirect('admin/pengiriman')->with('success', 'Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        // Pengiriman::find($id)->delete();
        // return redirect('admin/pengiriman')->with('success', 'Data Berhasil Dihapus!!');
    }
}
