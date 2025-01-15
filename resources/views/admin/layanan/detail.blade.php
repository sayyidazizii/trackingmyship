@extends('admin.template.appadmin')
@section('title', 'Detail Data Layanan')
@section('content')
<main id="main" class="main">
    <div class="pagetitle mt-4">
        <h1>Layanan</h1>
    </div>
    <nav>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('layanan.index')}}">Layanan</a></li>
            @foreach ($layanan as $lyn)
            <li class="breadcrumb-item active"><a href="{{route('layanan.show',$lyn->id)}}">Detail</a></li>
            @endforeach
        </ol>
    </nav>
    <div class="detail-layanan bg-light p-4">

        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Nama Layanan</span>
                    </div>
                    @foreach ($layanan as $lyn)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$lyn->nama_layanan}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Biaya</span>
                    </div>
                    @foreach ($layanan as $lyn)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="Rp. {{$lyn->biaya}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection