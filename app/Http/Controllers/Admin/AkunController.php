<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Dompet;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    public function index()
    {
        $akun = DB::table('users')
            ->where('level', '=', 'kurir')
            ->get();

        return view("admin.akun.index", ['akun' => $akun]);
    }

    public function create()
    {
        $dompet = Dompet::all();
        return view('admin.akun.create', compact('dompet'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'fullname' => 'required | max:45',
                'username' => 'required | max:45',
                'email' => 'required | email | unique:users',
                'password' => 'required',
                'alamat' => 'required | max:45',
            ],
            [
                'fullname.required' => 'Wajib diisi',
                'username.required' => 'Wajib diisi',
                'email.required' => 'Wajib diisi',
                'password.required' => 'Wajib diisi',
                'alamat.required' => 'Wajib diisi',

                'fullname.max' => 'Maksimal 45 Karakter',
                'username.max' => 'Maksimal 45 Karakter',
                'alamat.max' => 'Maksimal 45 Karakter',

                'email.unique' => 'Email Sudah Terdaftar',
                'email.email' => 'Format harus "nama@gmail.com"',
            ]
        );

        Users::insert([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'alamat' => $request->alamat,
        ]);

        return redirect('admin/akun')->with('success', 'Data Berhasil Ditambahkan!!');
    }

    public function show(string $id)
    {
        // 
    }

    public function edit(string $id)
    {
        $akun = Users::all()->where('id', $id);
        $dompet = Dompet::all();
        $jabatan = ['kurir'];
        return view('admin.akun.edit', ['akun' => $akun], compact('jabatan', 'dompet'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'fullname' => 'required | max:45',
                'username' => 'required | max:45',
                'email' => 'required | email',
                'level' => 'required',
                'alamat' => 'required | max:45',
            ],
            [
                'fullname.required' => 'Wajib diisi',
                'username.required' => 'Wajib diisi',
                'email.required' => 'Wajib diisi',
                'level.required' => 'Wajib dipilih',
                'alamat.required' => 'Wajib diisi',

                'fullname.max' => 'Maksimal 45 Karakter',
                'username.max' => 'Maksimal 45 Karakter',
                'alamat.max' => 'Maksimal 45 Karakter',

                'email.email' => 'Format harus "nama@gmail.com"',
            ]
        );

        $akun = Users::find($id);

        $akun->fullname = $request->fullname;
        $akun->username = $request->username;
        $akun->email = $request->email;
        $akun->level = $request->level;
        $akun->alamat = $request->alamat;
        $akun->save();

        return redirect('admin/akun')->with('success', 'Data Berhasil Diubah!!');
    }

    public function destroy(string $id)
    {
        Users::find($id)->delete();
        return redirect('admin/akun')->with('success', 'Data Berhasil Dihapus!!');
    }
}
