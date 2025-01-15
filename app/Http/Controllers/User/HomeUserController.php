<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\api\pengirimanController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\DB;

class HomeUserController extends Controller
{
    public function index()
    {

        $id = Auth::user()->id;
        $pengiriman = pengiriman::where('users_id', $id)->count();
        $status = pengiriman::where('users_id', $id)->where('status', 'penjemputan')->count();
        $perjalanan =  pengiriman::where('users_id', $id)->where('status', 'pengiriman')->count();
        $diterima = pengiriman::where('users_id', $id)->where('status', 'terkirim')->count();
        return view('user.dashboard', compact('pengiriman', 'status', 'perjalanan', 'diterima'));
    }
}
