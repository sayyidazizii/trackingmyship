@extends('admin.template.appadmin')

@section('title', 'Tambah Akun Kurir')

<!-- form start -->
@section('content')
<form action="{{route('akun.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Akun</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-9">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <div class="form-floating mb-3">
                  <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" id="floatingKode" placeholder="Masukkan nama lengkap">
                  <label for="floatingKode">Nama Lengkap</label>
                  @error('fullname')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3 d-none">
                  <input type="text" name="" class="form-control @error('username') is-invalid @enderror" id="floating" placeholder="Masukkan Username" value="pppp">
                  <label for="floatingKategori">Username</label>
                  @error('username')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="floating" placeholder="Masukkan Username" value="">
                  <label for="floatingKategori">Username</label>
                  @error('username')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>

        
                <!-- input ke tiga -->
                <div class="form-floating mb-3">
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingDeskripsi" placeholder="Masukkan Email" value="">
                  <label for="floatingDeskripsi"></label>
                  @error('email')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
               
                
                <!-- input ke empat -->
                <div class="form-floating mb-3">
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPass" placeholder="Masukkan Password" value="">
                  <label for="floatingPass">Password</label>
                  @error('password')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                
                <!-- input ke lima -->
                <div class="form-floating mb-3">
                  <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" id="floatingAlamat" placeholder="Masukkan Alamat">
                  <label for="floatingAlamat">Alamat</label>
                  @error('alamat')
                  <div class="invalid-feedback">{{$message}}</div>
                  @enderror
                </div>
                
                <!-- input ke enam -->
                <div class="form-floating mb-3 invisible">
                  <input type="text" name="level" class="form-control" id="floatingLevel" value="kurir">
                  <label for="floatingLevel">Posisi</label>
                </div>
                <br>
                  <button name="proses" value="save" type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
        </div>
    </div>
</form>
<!-- form end -->
@endsection