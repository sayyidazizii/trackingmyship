@extends('user.template.appuser')

@section('title', 'Riwayat Pembayaran Paket')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('my/home')}}">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Riwayat Pembayaran</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <h5 class="card-title ml-4 border-bottom">Riwayat Pembayaran Anda</h5>
            <div class="card-body">
              <a href="{{url('my/pembayaranUser/laporanPDF')}}" class="btn btn-outline-secondary">Download <i class="ri-download-line"></i></a>
              <table class=" table datatable">
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">metode pembayaran</th>
                    <th scope="col">harga bayar</th>
                    <th scope="col">keterangan</th>
                    <th scope="col">NO resi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pembayaran as $p)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$p->metode}}</td>
                    <td>{{$p->harga_total}}</td>
                    <td>{{$p->keterangan}}</td>
                    <td>{{$p->pengiriman->kode}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->!-- End #main -->
@endsection