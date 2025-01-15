@extends('admin.template.appadmin')
@section('title', 'Detail Data Kurir')
@section('content')
<main id="main" class="main">
    <div class="pagetitle mt-4">
        <h1>Detail Kurir</h1>
    </div>
    <nav>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('kurir.index')}}">Kurir</a></li>
            @foreach ($kurir as $k)
            <li class="breadcrumb-item active"><a href="{{route('kurir.show',$k->id)}}">Detail</a></li>
            @endforeach
        </ol>
    </nav>
    <div class="detail-kurir bg-light p-4">

        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nama</span>
                    </div>
                    @foreach ($kurir as $k)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$k->nama_kurir}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">No Hp</span>
                    </div>
                    @foreach ($kurir as $k)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$k->nomor_telepon}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="inputGroup-sizing-default">Jadwal</span>
                    </div>
                    @foreach ($kurir as $k)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$k->jadwal}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="inputGroup-sizing-default">Layanan Pengiriman</span>
                    </div>
                    @foreach ($kurir as $k)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$k->layanan->nama_layanan}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection