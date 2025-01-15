<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Dompet;

class DompetController extends Controller
{
    public function index()
    {
        $dompet = Dompet::join('users', 'dompet.id', '=', 'users.dompet_id')
        ->select('users.username AS name', 'dompet.*')
        ->get();
        return view("admin.dompet.index", ['dompet' => $dompet]);
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        // 
    }

    public function show(string $id)
    {
        // 
    }

    public function edit(string $id)
    {
        // 
    }

    public function update(Request $request, string $id)
    {
        // 
    }

    public function destroy(string $id)
    {
        // 
    }
}
