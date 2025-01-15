<?php

namespace App\Http\Controllers\Kurir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Pengiriman;
use App\Models\Kurir;
use App\Models\Users;
use Illuminate\Support\Facades\Storage;

class homeKurirController extends Controller
{
    public function index()
    {
        $user = Users::findOrFail(Auth::id());
        $pengiriman = Pengiriman::get();
        $TLpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.layanan_id', '=', 'layanan.id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->count();
        $penerima = Pengiriman::join('penerima', 'penerima.id', '=', 'pengiriman.penerima_id')
            ->join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.layanan_id', '=', 'layanan.id')
            ->select('pengiriman.lokasi_tujuan AS tujuan', 'penerima.nama AS nama', 'penerima.nomor_telepon AS nomor', 'pengiriman.status AS status', 'pengiriman.id AS id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->get();
        $PBpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.layanan_id', '=', 'layanan.id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->where('status', 'penjemputan')
            ->count();
        $SLpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.layanan_id', '=', 'layanan.id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->where('status', 'terkirim')
            ->count();
        $BLpengiriman = Pengiriman::join('layanan', 'layanan.id', '=', 'pengiriman.layanan_id')
            ->join('kurir', 'kurir.layanan_id', '=', 'layanan.id')
            ->where('kurir.nama_kurir', $user->fullname)
            ->where('status', 'pengiriman')
            ->count();

        return view("kurir.home",  compact('TLpengiriman', 'penerima', 'PBpengiriman', 'BLpengiriman', 'SLpengiriman'));
    }

    public function store(Request $request, string $id)
    {
        request()->validate(
            [
                'bukti_foto' => 'nullable | image | mimes:jpg,jpeg,gif,png,svg | max:2048',
            ],
            [
                'bukti_foto.max' => 'Maksimal 2 MB',
                'bukti_foto.image' => 'File ekstensi harus jpg, jpeg, gif, png, svg',
            ]
        );

        $pengiriman = Pengiriman::find($id);

        $photo = $request->file('bukti_foto');
        $extension = $photo->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;

        $request->bukti_foto->move(storage_path('app/public/bukti_foto'), $fileName);
        
        $pengiriman->bukti_foto = $fileName;
        $pengiriman->status = $request->status;
        $pengiriman->save();

        return back();
    }

    public function maps()
    {
        return view('kurir.maps');
    }

    public function profile()
    {
        $user = Users::findOrFail(Auth::id());
        $kurir = Kurir::where('nama_kurir', $user->fullname)->first();

        return view('kurir.profile', compact('kurir'));
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
    {
        $users = Users::findOrFail(Auth::id());

        if (request()->hasFile('foto')) {
            // cara pertama
            $path = 'photo_user/' . $users->foto;
            if ($path != null) {
                Storage::delete($path);
            }
            $photo = $request->file('foto');
            $extension = $photo->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;

            $request->foto->move(storage_path('app/public/photo_user'), $fileName);
            $users->foto = $fileName;
        }
        $users->save();

        return back()->with('status', 'Foto profile Update!');
    }

    public function destroy(string $id)
    {
        //
    }
}
