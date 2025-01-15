@extends('admin.template.appadmin')

@section('title', 'Table Data Penerima')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <h1 class="mt-4">Penerima</h1>
        <ol class="breadcrumb mb-4 bg-white">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Penerima</li>
            <li class="breadcrumb-item active">Penerima</li>
        </ol>
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Table Penerima</h6>
                    <div class="table-responsive">
                        <table id="datapegawai" class="table">
                            <thead>
                                <tr>
                                    <th class="text-bold" scope="col">#</th>
                                    <th class="text-bold" scope="col">Nama</th>
                                    <th class="text-bold" scope="col">Nomor Hp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penerima as $pnr)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pnr->nama }}</td>
                                        <td>{{ $pnr->nomor_telepon }}</td>
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
