@extends('admin.template.appadmin')

@section('title', 'Table Data Paket')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Paket</h1>
    <ol class="breadcrumb mb-4 bg-white">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Paket</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Paket</h6>
                </a>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">#</th>
                                <th class="text-bold" scope="col">Berat</th>
                                <th class="text-bold" scope="col">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($paket as $pk)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$pk->berat}} Kg</td>
                                <td>{{$pk->deskripsi}}</td>
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
