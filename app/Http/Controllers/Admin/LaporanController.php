<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Pengiriman;

class LaporanController extends Controller
{
    public function index()
    {
        $laporanKirim = Pengiriman::all();
        return view("admin.laporanKirim.index", ['laporanKirim'=> $laporanKirim]);
    }

    public function exportPDF() {
        $saveName = 'Laporan Pengiriman ' . date('y-m-d') . '.pdf';
        $pengiriman = Pengiriman::all();
        $pdf = PDF::loadview('admin.laporanKirim.laporanPDF', ['laporanKirim'=> $pengiriman]);

        return $pdf->download($saveName);
    }

    public function exportPengiriman() {
        return Excel::download(new LaporanExport, 'Laporan '.Carbon::now()->timestamp.'.xlsx');
    }
}
