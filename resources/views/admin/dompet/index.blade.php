@extends('admin.template.appadmin')

@section('title', 'Table Data Dompet')

@section('content')
<div class="container-fluid pt-4 px-4">
    <h1 class="mt-4">Dompet</h1>
    <ol class="breadcrumb mb-4 bg-white">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Table</li>
        <li class="breadcrumb-item active">Dompet</li>
    </ol>
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Table Dompet</h6>
                <div class="table-responsive">
                    <table id="datapegawai" class="table">
                        <thead>
                            <tr>
                                <th class="text-bold" scope="col">#</th>
                                <th class="text-bold" scope="col">Username</th>
                                <th class="text-bold" scope="col">Saldo</th>
                                <th class="text-bold" scope="col">Bonus Poin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dompet as $row)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$row->name}}</td>
                                    <td>Rp. {{number_format($row->saldo, 0, ',', '.')}}</td>
                                    <td>{{$row->bonus}} Poin</td>
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