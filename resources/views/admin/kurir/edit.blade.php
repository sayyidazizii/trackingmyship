@extends('admin.template.appadmin')

@section('title', 'Edit Data Kurir')

<!-- form start -->
@section('content')
@foreach($kurir as $k)
<form action="{{route('kurir.update',$k->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="container-fluid pt-4 px-4">
        <h6 class="mb-4">Tambah Data Kurir</h6>
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
              <div class="bg-light rounded h-100 p-4">
                <!-- input pertama -->
                <div class="form-floating mb-3">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama" value="{{$k->nama_kurir}}">
                  <label for="floatingKode">Nama</label>
                </div>
        
                <!-- input kedua -->
                <div class="form-floating mb-3">
                  <input type="text" name="no_tlp" class="form-control" id="floatingKategori" placeholder="Masukkan No Telp" value="{{$k->nomor_telepon}}">
                  <label for="floatingKategori">Nomor Telepon</label>
                </div>

                <!-- input ketiga -->
                <div class="form-floating mb-3">
                  <input type="text" name="jadwal" class="form-control" id="floatingKategori" placeholder="Masukkan Jadwal" value="{{$k->jadwal}}">
                  <label for="floatingKategori">Jadwal</label>
                </div>
                <!-- input keempat -->
                <div class="form-floating mb-3">
                    <select class="form-select @error('layanan_id') is-invalid @enderror" name="layanan_id"
                        id="nama_layanan" aria-label="Floating label select example">
                        <option selected>--- nama kurir ---</option>
                        @foreach ($layanan as $items)
                            @php $sel = ($items->id == $k->layanan_id) ? 'selected' : ''; @endphp
                            <option value="{{ $items->id }}" {{ $sel }}>{{ $items->nama_layanan }}
                            </option>
                        @endforeach
                    </select>
                    @error('layanan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="nama_layanan">nama kurir</label>
                </div>
                <br>
                    <button name="proses" value="save" type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>
        </div>
    </div>
</form>
@endforeach
<!-- form end -->
@endsection