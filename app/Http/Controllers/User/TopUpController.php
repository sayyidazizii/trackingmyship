<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

use App\Models\Dompet;
use App\Models\TopUp;
use App\Models\Users;

class TopUpController extends Controller
{
    public function index()
    {
        $user = Users::findOrFail(Auth::id());
        $dompet = Dompet::where('id', $user->dompet_id)->first();
        $topup = TopUp::where('dompet_id', $user->id)->get();
        $uang = ['10000', '20000', '50000', '100000'];

        return view("user.topup.index",  compact('dompet', 'topup', 'uang'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        
        $topup = DB::table('topup')
        ->where('topup_no', 'LIKE', $cari)
        ->get();

        $user = Users::findOrFail(Auth::id());
        $dompet = Dompet::where('id', $user->dompet_id)->first();
        $uang = ['10000', '20000', '50000', '100000'];

        return view("user.topup.index", ['topup' => $topup], compact('dompet', 'uang'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $external_id = Str::random(10);

        $topup = TopUp::create([
            'topup_no' => $external_id,
            'saldo' => $data['saldo'],
            'bonus' => $data['bonus'],
            'dompet_id' => $data['dompet_id'],
            'topup_status' => 'PENDING',
            'waktu' =>$data['waktu'],
        ]);

        return redirect()->route('my.dompet.payment', $topup->topup_no);
    }

    public function payment($id)
    {
        $topupID = TopUp::where('topup_no', $id)->first();

        $bayar = $topupID->saldo;
        $pajak = 2000;
        $total = $bayar + $pajak;

        $topup = $topupID;

        if ($topup->topup_token == null) {
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
    
            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $total,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->username,
                    'email' => auth()->user()->email,
                ),
            );
    
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            
            $topup->topup_token = $snapToken;
            $topup->total = $total;
            $topup->save();
        } else {
            $snapToken = $topup->topup_token;
        }
        
        return view("user.topup.payment",  compact('topupID', 'snapToken', 'bayar', 'pajak', 'total'));
    }

    public function success($id) {
        $topupID = TopUp::where('topup_no', $id)->first();
        $topup = $topupID;
        $topup->topup_status = 'SUCCESS';
        $topup->save();

        $dompetID = Dompet::where('id', $topup->dompet_id)->first();
        $dompet = $dompetID;
        $dompet->saldo = $dompet->saldo + $topup->saldo;
        $dompet->bonus = $dompet->bonus + $topup->bonus;
        $dompet->save();

        return view('user.topup.success');
    }

    public function exportPDF()
    {
        $saveName = 'Laporan TopUp ' . date('y-m-d') . '.pdf';
        $user_id = auth()->id();
        $laporan = TopUp::get()->where('dompet_id', $user_id);
        $pdf = PDF::loadview('user.topup.laporanPDF', compact('laporan'));

        return $pdf->download($saveName);
    }
}
