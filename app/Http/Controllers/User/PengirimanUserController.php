<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Str;

// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\kurir;
use App\Models\Layanan;
use App\Models\Paket;
use App\Models\Penerima;
use App\Models\Pengiriman;
use App\Models\Pembayaran;
use App\Models\Dompet;
use App\Models\Users;

class PengirimanUserController extends Controller
{
    public function index()
    {
        $user_id = Auth()->id();  // Mendapatkan ID user yang sedang login
        $pengiriman = pengiriman::where('users_id', $user_id)->get();  // Ambil data pengiriman berdasarkan user_id
        $akun = Users::where('id', $user_id)->first();  // Ambil data akun berdasarkan user_id
        $kurir = kurir::all();  // Ambil data kurir
        $layanan = Layanan::all();  // Ambil data layanan
        $pembayaran = Pembayaran::all();  // Ambil data pembayaran
        $dompet = Dompet::where('id', $user_id)->first();  // Ambil data dompet berdasarkan user_id

        // Mendapatkan array ID pengiriman yang sudah dibayar
        $pp = $pembayaran->pluck('pengiriman_id')->toArray();  // Mengambil ID pengiriman dari tabel pembayaran

        // Mengirimkan data ke view
        return view("user.pengirimanUser.index", compact(
            'pengiriman',
            'dompet',
            'pembayaran',
            'akun',
            'kurir',
            'layanan',
            'pp'  // Mengirimkan variabel pp ke view
        ));
    }

    public function store(request $resquest)
    {
        $resquest->validate(
            [
                'metode' => 'required',
                'harga_bayar' => 'required',

            ],
            [
                'metode.required' => 'data wajib diisi',
                'harga_bayar.required' => 'data wajib diisi',
            ]
        );
        // try {
        //     $id = $resquest->id;
        //     $dompet1 = dompet::find($id);
        //     $bayar = $resquest->harga_bayar;
        //     $sisaSaldo = $dompet1->saldo - $bayar;

        $user_id1 = Auth()->id();
        //     $pembayaran = new pembayaran;
        //     $pembayaran->metode = $resquest->metode;
        //     $pembayaran->harga_total = $resquest->harga_bayar;
        //     $pembayaran->keterangan = $resquest->keterangan;
        //     $pembayaran->pengiriman_id = $resquest->pengiriman_id;
        //     $pembayaran->user_id = $user_id1;
        //     $pembayaran->save();

        //     $dompet = dompet::find($id);
        //     $dompet->saldo = $sisaSaldo;
        //     $dompet->save();
        //     return redirect('user/pengirimanUser');
        // } catch (\Exception $e) {
        //     echo 'input :' . $e->getMessage();
        // };
        $pembayaran = new Pembayaran;
        $pembayaran->metode = $resquest->metode;
        $pembayaran->harga_total = $resquest->harga_bayar;
        $pembayaran->keterangan = $resquest->keterangan;
        $pembayaran->pengiriman_id = $resquest->pengiriman_id;
        $pembayaran->users_id = $user_id1;
        $pembayaran->save();
        return redirect('my/pengirimanUser')->with('success', 'pembayaran berhasil dilakukan');
    }

    public function create()
    {

        $pengiriman = Pengiriman::all();
        $akun = Users::all();
        $kurir = kurir::all();
        $layanan = Layanan::all();
        $pembayaran = Pembayaran::all();
        $dompet = Dompet::all();
        return view('user.pengirimanUser.tambah', compact('akun', 'kurir', 'layanan', 'pembayaran', 'dompet'));
    }
    public function pul(Request $request)
    {
        $request->validate(
            [
                'berat' => 'required|numeric',
                'deskripsi' => 'required',
                'penerima' => 'required',
                'no_tlp' => 'required',
                'tanggal' => 'required',
                'lokasi_tujuan' => 'required',
                'layanan' => 'required',

            ],
            [
                'berat.required' => 'data harus di isi',
                'berat.numeric' => 'data harus desimal',
                'deskripsi.required' => 'data harus diisi',
                'penerima.required' => 'data harus diisi',
                'no_tlp.required' => 'data harus diisi',
                'tanggal.required' => 'data harus diisi',
                'lokasi_tujuan.required' => 'data harus diisi',
                'layanan.required' => 'data harus diisi',

            ]
        );
        $pp = Auth::user()->id;
        $kode = $this->generateUniqueCode();
        $paket = Paket::create(
            [
                'berat' => $request->berat,
                'deskripsi' => $request->deskripsi
            ]
        );
        $penerima = Penerima::create(
            [
                'nama' => $request->penerima,
                'nomor_telepon' => $request->no_tlp,
            ]
        );

        $pengiriman = new Pengiriman;
        $pengiriman->kode = $kode;
        $pengiriman->tanggal =  $request->tanggal;

        $pengiriman->lokasi_tujuan = $request->lokasi_tujuan;
        $pengiriman->paket_id = $paket->id;
        $pengiriman->layanan_id = $request->layanan;
        $pengiriman->penerima_id = $penerima->id;

        $pengiriman->users_id =  $pp;
        $pengiriman->save();
        // $pengiriman = pengiriman::create([
        //     'kode' => $kode,
        //     'tanggal' => $request->tanggal,
        //     'lokasi_tujuan' => $request->lokasi_tujuan,
        //     'paket_id' => $paket->id,
        //     'layanan_id' => $request->layanan,
        //     'penerima_id' => $penerima->id,
        //     'user_id' => $request->user,

        // ]);
        return redirect('my/pengirimanUser')->with('success', 'Data Berhasil Ditambahkan!!');
    }
    private function generateUniqueCode()
    {
        do {
            $kode = Str::random(10);
        } while (Pengiriman::where('kode', $kode)->exists());

        return $kode;
    }
}
