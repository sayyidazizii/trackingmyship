<?php

namespace App\Http\Controllers\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekController extends Controller
{
    //
    public function index()
    {
        return view('homepage.CekOngkos.index');
    }
}
