@extends('admin.template.appadmin')

@section('title', 'Edit Akun Kurir')

<!-- form start -->
@section('content')
@foreach ($akun as $user)
    
    <form action="{{route('akun.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="container-fluid pt-4 px-8">
            <h6 class="mb-4">Tambah Data Akun</h6>
            <div class="row g-4">
                <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <!-- input pertama -->
                    <div class="form-floating mb-3">
                    <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="floatingKode" placeholder="Masukkan nama lengkap" value="{{$user->fullname}}">
                    <label for="floatingKode">Nama Lengkap</label>
                    @error('fullname')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
            
                    <!-- input kedua -->
                    <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floatingKategori" placeholder="Masukkan Username" value="{{$user->username}}">
                    <label for="floatingKategori">Username</label>
                    @error('username')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
            
                    <!-- input ke tiga -->
                    <div class="form-floating mb-3">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingDeskripsi" placeholder="Masukkan Email" value="{{$user->email}}">
                    <label for="floatingDeskripsi">Email</label>
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                    </div>
            
                    <!-- input ke empat -->
                    <div class="form-floating mb-3">
                        <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="floatingAlamat" placeholder="Masukkan Alamat" value="{{$user->alamat}}">
                        <label for="floatingAlamat">Alamat</label>
                        @error('alamat')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <!-- input ke lima -->
                    <div class="form-floating mb-3 invisible">
                        <input type="text" name="level" class="form-control" id="floatingLevel" value="{{$user->level}}">
                        <label for="floatingLevel">Posisi</label>
                      </div>
                    <br>
                        <button name="proses" value="save" type="submit" class="btn btn-warning">Update</button>
                </div>
            </div>
        </div>
    </form>
    <!-- form end -->
@endforeach
@endsection