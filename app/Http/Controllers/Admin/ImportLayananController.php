<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Imports\LayananImport;
use Maatwebsite\Excel\Facades\Excel;


class ImportLayananController extends Controller
{
    public function importLayanan(Request $request) 
    {
        Excel::import(new LayananImport, $request->file("file"));
        
        return redirect('admin/layanan')->with('success', 'berhasil Bertambah!');
    }
}
