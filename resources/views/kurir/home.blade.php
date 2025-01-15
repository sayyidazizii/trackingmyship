@extends('kurir.template.app')

@section('title', 'Home')

@section('konten')
<link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/css/style.css')}}" rel="stylesheet">

<div class="container-fluid my-5 py-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center py-4" id="tanggal"></h3>
            <div class="row text-center py-3 mx-2 mb-4 bg-danger text-white rounded">
                <div class="col">
                    <h1 id="font">{{$TLpengiriman}}</h1>
                    <p id="font_p">Total Pesanan</p>
                </div>
                <div class="col">
                    <h1 id="font">{{$PBpengiriman}}</h1>
                    <p id="font_p">Sedang Dalam Penjemputan</p>
                </div>
                <div class="col">
                    <h1 id="font">{{$BLpengiriman}}</h1>
                    <p id="font_p">Sedang Dalam Pengiriman</p>
                </div>
                <div class="col">
                    <h1 id="font">{{$SLpengiriman}}</h1>
                    <p id="font_p">Selesai</p>
                </div>
            </div>
            <div class="mx-2">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Penerima</td>
                            <td>Status</td>
                            <td class="text-center">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerima as $items)
                            <tr>
                                <td>
                                    <p id="font_p">
                                        <strong>{{$items->nama}}</strong>
                                        <br /> {{$items->tujuan}}
                                        <br /> <abbr title="Phone"></abbr> {{$items->nomor}}
                                    </p>
                                </td>
                                <td>
                                    @if ($items['status'] == 'penjemputan')
                                        <h4><span class="badge bg-primary text-light py-2">Penjemputan</span></h4>
                                    @elseif ($items['status'] == 'pengiriman')
                                        <h4><span class="badge bg-warning text-dark py-2">Pengiriman</span></h4>
                                    @else
                                        <h4><span class="badge bg-success text-light py-2">Telah Sampai</span></h4>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($items->status == 'terkirim')
                                        <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$items->id}}" disabled>
                                            Ubah Status
                                        </button>
                                    @else
                                        <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter{{$items->id}}">
                                            Ubah Status
                                        </button>
                                    @endif
                                    {{-- Modal --}}
                                    <div class="modal fade" id="exampleModalCenter{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Pengubahan Status pengiriman</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{url('kurir/home/store/'.$items->id)}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="col-sm-10 my-4">
                                                    @php
                                                        if ($items->status == 'pengiriman') {
                                                            $status = ['pengiriman', 'terkirim'];
                                                        } else {
                                                            $status = ['penjemputan', 'pengiriman'];
                                                        }
                                                    @endphp
                                                    @foreach ($status as $row)
                                                    @php $sel = ($row == $items->status) ? 'checked' : ''; @endphp
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                        <input class="form-check-input" type="radio" name="status" id="gridRadios_{{$loop->iteration}}" value="{{$row}}" {{$sel}}>
                                                        <label class="form-check-label" for="gridRadios_{{$loop->iteration}}">
                                                            {{$row}}
                                                        </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                @if ($items->status == 'pengiriman')
                                                    <div class="row mb-3 my-3">
                                                        <label for="bukti" class="col-sm-2 col-form-label">Bukti</label>
                                                        <div class="col-sm-10">
                                                        <input type="file" class="form-control" id="bukti" name="bukti_foto" readonly>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection