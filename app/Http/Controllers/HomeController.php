<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->level == 'admin') {
            return redirect('admin/dashboard');
        } elseif (auth()->user()->level == 'user') {
            // Logika untuk user
            return redirect('my/home');
        } elseif (auth()->user()->level == 'kurir') {
            // Logika untuk kurir
            return redirect('kurir/home');
        } else {
            return redirect('/');
        }

    }
}
