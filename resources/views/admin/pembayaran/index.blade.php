@extends('admin.template.appadmin')

@section('title', 'Table Data Pembayaran')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mt-4">Pembayaran</h1>
        <ol class="breadcrumb mb-4 bg-white">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Pembayaran</li>
            <li class="breadcrumb-item active">Pembayaran</li>
        </ol>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Table Pembayaran</h6>
                    <div class="table-responsive">
                        <table id="datapegawai" class="table">
                            <thead>
                                <tr>
                                    <th class="text-bold" scope="col">#</th>
                                    <th class="text-bold" scope="col">Metode</th>
                                    <th class="text-bold" scope="col">Harga Total</th>
                                    <th class="text-bold" scope="col">Keterangan</th>
                                    <th class="text-bold" scope="col">Kode Pengiriman</th>
                                    <th class="text-bold" scope="col">Username</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembayaran as $pyr)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pyr->metode }}</td>
                                        <td>Rp. {{number_format( $pyr->harga_total , 0, ',', '.')}}</td>
                                        <td>{{ $pyr->keterangan }}</td>
                                        <td>{{ $pyr->pengiriman->kode }}</td>
                                        <td>{{ $pyr->users->username }}</td>
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
