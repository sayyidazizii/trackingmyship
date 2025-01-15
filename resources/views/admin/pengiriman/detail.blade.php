@extends('admin.template.appadmin')
@section('content')
<main id="main" class="main">
    <div class="pagetitle mt-4">
        <h1>Detail pengiriman</h1>
    </div>
    <nav>
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{route('pengiriman.index')}}">Pengiriman</a></li>
            @foreach ($pengiriman as $items)
            <li class="breadcrumb-item active"><a href="{{route('pengiriman.show',$items->id)}}">Detail</a></li>
            @endforeach
        </ol>
    </nav>
    <div class="detail-pengiriman bg-light p-4">

        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Kode</span>
                    </div>
                    @foreach ($pengiriman as $items)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$items->kode}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Tanggal</span>
                    </div>
                    @foreach ($pengiriman as $items)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$items->tanggal}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="inputGroup-sizing-default">Lokasi tujuan</span>
                    </div>
                    @foreach ($pengiriman as $items)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$items->lokasi_tujuan}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="inputGroup-sizing-default">Id Paket</span>
                    </div>
                    @foreach ($pengiriman as $items)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$items->paket_id}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="inputGroup-sizing-default">Layanan</span>
                    </div>
                    @foreach ($pengiriman as $items)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$items->layanan->nama_layanan}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="inputGroup-sizing-default">Nama Penerima</span>
                    </div>
                    @foreach ($pengiriman as $items)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$items->penerima->nama}}">
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 m-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text " id="inputGroup-sizing-default">Username</span>
                    </div>
                    @foreach ($pengiriman as $items)
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{$items->penerima->nama}}">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
@endsection