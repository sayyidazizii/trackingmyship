@extends('admin.template.appadmin')

@section('title', 'Tambah Data Layanan')

@section('content')

<form action="{{route('layanan.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12 col-xl-9">
  <div class="bg-light rounded h-100 p-4">
    <!-- input pertama -->
    <h6 class="mb-4">Data Layanan</h6>
    <div class="form-floating mb-3">
      <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="floatingKode" placeholder="Masukkan Nama Layanan" >
      <label for="floatingKode">Nama Layanan</label>
      @error('nama')
      <div classs="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="biaya" class="form-control @error('biaya') is-invalid @enderror" id="floatingKode" placeholder="Masukkan Biaya Layanan">
      <label for="floatingKode">Biaya</label>
      @error('biaya')
      <div classs="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
     <br>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection