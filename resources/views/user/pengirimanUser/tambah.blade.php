@extends('user.template.appuser')

@section('content')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Pengiriman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Pengiriman</li>
            </ol>
        </nav>
        <form action="{{url('my/pengirimanUser/pull')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <!-- input pertama -->
                             <div class="form-floating mb-3 " >
                                <input type="text" name="berat" class=" form-control  @error('berat') is-invalid @enderror" id="floatingKode" style="transition: all 0.2s linear" placeholder="Masukkan Kode Pengiriman" value="">
                                <label style="transition: all 0.15s linear" for="floatingKode">berat paket</label>
                                @error('berat')
                                <div classs="invalid-feedback">
                                    {{$message}}
                                  </div>
                                  @enderror                          
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="deskripsi"  class="form-control  @error('deskripsi') is-invalid @enderror " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label style="transition: all 0.15s linear"  for="floatingKode">deskripsi</label>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                  </div>
                                  @enderror                            
                            </div>
                            <!-- input kedua -->
                            <div class="form-floating mb-3 d-none">
                                <input type="text" name="tanggal" id="waktu111"class="form-control  @error('tanggal') is-invalid @enderror" id="floatingKategori" placeholder="Masukkan Tanggal" value="">
                                <label style="transition: all 0.15s linear"  for="floatingKategori">Tanggal</label>
                                @error('tanggal')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror                           
                            </div>

                            <!-- input ke tiga -->
                            <div class="form-floating mb-3">
                                <input type="text" name="lokasi_tujuan" class="form-control  @error('lokasi_tujuan') is-invalid @enderror" id="floatingDeskripsi" placeholder="Masukkan Lokasi Tujuan" value="">
                                <label style="transition: all 0.15s linear"  for="floatingDeskripsi">Lokasi Tujuan</label>
                                @error('lokasi_tujuan')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>
                            <div class="form-floating mb-3  ">
                                <select class="form-select @error('layanan') is-invalid @enderror" name="layanan" id="layanan" aria-label="Floating label select example">
                                    <option selected>--- Nama Layanan ---</option>
                                    @foreach($layanan as $l)
                                    <option value="{{$l->id}}">{{$l->nama_layanan}} - Rp. {{$l->biaya}}</option>
                                    @endforeach
                                </select>
                                <label for="layanan">Nama Layanan</label>
                                @error('layanan')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <!-- input ke enam -->
                            <div class="form-floating mb-3  ">
                                <input type="text" name="penerima" class="form-control @error('penerima') is-invalid @enderror " id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label for="floatingKode">Nama Penerima</label>
                                @error('penerima')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>
                            <div class="form-floating mb-3  ">
                                <input type="text" name="no_tlp" class="form-control @error('no_tlp') is-invalid @enderror" id="floatingKode" placeholder="Masukkan Kode Pengiriman" value="">
                                <label for="floatingKode">Nomor Telepon</label>
                                @error('no_tlp')
                                <div classs="invalid-feedback">
                                {{$message}}
                                </div>
                                @enderror 
                            </div>
                            <!-- input ke tujuh -->

                            <div class="">
                                <input type="number" name="user" value="{{Auth::user()->id}}" hidden>

                            </div>
                            <!-- input ke delapan -->
                            <br>
                            <button name="proses" value="save" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
        // Mendapatkan elemen input tanggal
        var tanggalInput = document.getElementById('waktu111');

        // Mendapatkan tanggal saat ini
        var today = new Date();

        // Format tanggal menjadi YYYY-MM-DD
        var formattedDate = today.toISOString().slice(0, 10);

        // Mengisi nilai input tanggal dengan tanggal saat ini
        tanggalInput.value = formattedDate;
    });
</script>

           

         
</main><!-- End #main -->
@endsection