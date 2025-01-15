@extends('user.template.appuser')

@section('title', 'Dompetku')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Saldo Dompetku</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Saldo Dompetku dapat digunakan untuk pembayaran pengiriman (order domestik). Tambah dompetku dan kelola riwayat transaksinya di sini.</li>
        </ol>
      </nav>
    </div>
    <form action="{{url('my/dompetku/store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Saldo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row mb-3 invisible">
                <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" id="waktu" name="waktu" readonly>
                </div>
              </div>
              <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Saldo</legend>
                <div class="col-sm-10">
                  @foreach ($uang as $items)
                    <div class="custom-control custom-radio custom-control-inline">
                      <input class="form-check-input" type="radio" name="saldo" id="gridRadios_{{$loop->iteration}}" value="{{$items}}">
                      <label class="form-check-label" for="gridRadios_{{$loop->iteration}}">
                        {{$items}}
                      </label>
                    </div>
                  @endforeach
                </div>
              </fieldset>
              <div class="row mb-3">
                <label for="bonus" class="col-sm-2 col-form-label">Bonus</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="bonus" name="bonus" readonly>
                </div>
              </div>
            </div>
            <div class="row mb-3 invisible">
              <label for="bonus" class="col-sm-2 col-form-label">Dompet id</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="dompet_id" name="dompet_id" readonly value="{{Auth::user()->id}}">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" id="" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal -->
    </form>
    
    <section class="section dashboard">
      <div class="col">
        <div class="row-lg-8">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="container" style="padding: 20px;">
                  <div class="row">
                    <div class="col-md-9">
                        <h2 class="card-title">Total Saldo</h2>
                        <h2 style="font-weight: bold;">Rp. {{$dompet->saldo}} </h2>
                        <p class="card-text">Poin : {{$dompet->bonus}}</p>
                    </div>
                    <div class="col-md-3 text-center">
                      <button type="button"  class="btn btn-danger my-5" data-toggle="modal" data-target="#exampleModalCenter">
                        Tambah Saldo <i class="bi bi-plus-lg"></i>
                      </button>
                    </div>
                  </div>
                  <hr>
                  <table class="table table-striped">
                    <div class="search-bar">
                      <div class="row mb-3">
                        <div class="col-md-10">
                          <form class="search-form d-flex align-items-center" method="GET" action="/my/dompetku/cari">
                            <div class="input-group">
                              <span class="input-group-text" id="inputGroupPrepend2">ID Transaksi</span>
                              <input type="text" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" placeholder="Cari di sini" name="cari" value="{{ old('cari') }}">
                              <input type="submit" value="CARI" class="input-group-text">
                            </div>
                          </form>
                        </div>
                        <div class="col-md-2">
                          <a href="{{url('my/dompetku/laporanPDF')}}" class="btn btn-outline-secondary">Download <i class="ri-download-line"></i></a>
                        </div>
                      </div>
                    </div>  
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="text-center">Id Transaksi</th>
                        <th scope="col" class="text-center">Waktu</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Jumlah TopUp</th>
                        <th scope="col" class="text-center">Bonus Poin</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($topup as $row)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td class="text-center">{{$row->topup_no}}</td>
                          <td class="text-center">{{$row->waktu}}</td>
                          <td class="text-center">
                            @if ($row->topup_status == 'PENDING')
                                <span class="badge bg-warning text-dark">{{ $row->topup_status }}</span>
                            @elseif ($row->topup_status == 'SUCCESS')
                                <span class="badge bg-success">{{ $row->topup_status }}</span>
                            @else
                                <span class="badge bg-danger">{{ $row->topup_status }}</span>
                            @endif
                          </td>
                          <td class="text-center">{{$row->saldo}}</td>
                          <td class="text-center">{{$row->bonus}}</td>
                          <td class="text-center">{{$row->total}}</td>
                          <td class="text-center">
                            @if ($row->topup_status == 'PENDING')
                              <a href="{{url('my/dompetku/payment', $row->topup_no)}}" class="btn btn-info btn-sm">Bayar</a>
                            @else
                              <a href="#" class="btn btn-info btn-sm" hidden>Bayar</a>
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Hitung bonus -->
  <script>
    function hitungBonus() {
      var saldo = document.querySelector("input[name='saldo']:checked").value;
      var bonus = saldo / 10000;
      document.getElementById("bonus").value = bonus;
    }

    document.addEventListener("change", hitungBonus);
  </script>

@endsection