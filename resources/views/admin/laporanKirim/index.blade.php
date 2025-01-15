@extends('admin.template.appadmin')

@section('title', 'Laporan Pengiriman')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Laporan Pengiriman</h1>
    <ol class="breadcrumb mb-4  bg-white">
        <li class="breadcrumb-item"><a href="index.php?url=dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Laporan Pengiriman</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded overflow-hidden h-100 p-4">
                <h6 class="mb-4">Table Laporan Pengiriman</h6>
                <a href="{{url('admin/laporan/laporanPDF')}}" class="btn btn-outline-primary mb-3">Download <i class="fa-solid fa-download"></i></a>
                <a href="{{url('admin/laporan/laporanExcel')}}" class="btn btn-outline-success mb-3 ml-1">Excel <i class="fa-solid fa-file-excel"></i></a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">#</th>
                                <th class="text-bold" scope="col">Kode</th>
                                <th class="text-bold" scope="col">Tanggal</th>
                                <th class="text-bold" scope="col">Lokasi Tujuan</th>
                                <th class="text-bold" scope="col">Detail Paket</th>
                                <th class="text-bold" scope="col">Layanan</th>
                                <th class="text-bold" scope="col">Nama Penerima</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporanKirim as $row)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$row->kode}}</td>
                                    <td>{{$row->tanggal}}</td>
                                    <td>{{$row->lokasi_tujuan}}</td>
                                    <td>{{$row->paket->deskripsi}}</td>
                                    <td>{{$row->layanan->nama_layanan}}</td>
                                    <td>{{$row->penerima->nama}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection