@extends('admin.template.appadmin')

@section('title', 'Tambah Data Kurir')

@section('content')

<form action="{{route('kurir.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-12 col-xl-9">
  <div class="bg-light rounded h-100 p-4">
    <!-- input pertama -->
    <h6 class="mb-4">Data kurir</h6>
    <div class="form-floating mb-3">
      <input type="text" name="nama" class="form-control" id="floatingKode" placeholder="Masukkan nama kurir" >
      <label for="floatingKode">Nama Kurir</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" name="no_tlp" class="form-control" id="floatingKode" placeholder="Masukkan nomor telepon">
      <label for="floatingKode">Nomor Telepon</label>
    </div>
    <!-- input kedua -->
    <div class="form-floating mb-3">
      <input type="text" name="jadwal" class="form-control" id="floatingKode" placeholder="Masukkan jadwal" >
      <label for="floatingKode">Jadwal</label>
    </div>     
    <!-- input ke tiga -->
    <div class="form-floating mb-3">
      <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id" id="akun" aria-label="Floating label select example">
          <option selected>--- Layanan Pengiriman ---</option>
          @foreach ($layanan as $items)
              <option value="{{$items->id}}">{{$items->nama_layanan}}</option>
          @endforeach
      </select>
        @error('layanan_id')
      <div class="invalid-feedback">{{$message}}</div>
      @enderror
      <label for="saldo">Nama Kurir</label>
    </div> 
     <br>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
@endsection