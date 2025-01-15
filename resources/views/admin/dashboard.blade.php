@extends('admin.template.appadmin')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa-solid fa-truck-arrow-right fa-2xl" style="color: #387fc2;"></i>
                <div class="ms-3">
                    <p class="mb-2">Pengiriman</p>
                    <h5 class="mb-0">{{$pengiriman}}</h5>

                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa-brands fa-cc-amex fa-2xl" style="color: #387fc2;"></i>
                <div class="ms-3">
                    <p class="mb-2">Layanan</p>
                    <h5 class="mb-0">{{$layanan}}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa-solid fa-people-carry-box fa-2xl" style="color: #387fc2;"></i>
                <div class="ms-3">
                    <p class="mb-2">Kurir</p>
                    <h5 class="mb-0">{{$kurir}}</h5>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center p-4">
                <i class="fa-solid fa-cube fa-2xl" style="color: #387fc2;"></i>
                <div class="ms-3">
                    <p class="mb-2">Paket</p>
                    <h5 class="mb-0">{{$saldo}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<div class="row">
    <div class="col-xl-6">
        <div class="card shadow mb-4 ml-md-4 mt-md-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Metode Pembayaran</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPie"></canvas>
                </div>
                <hr>
                Berikut ini adalah Pilihan Pembayaran yang dipilih User dengan total {{$pembayaran}} metode pembayaran
            </div>
        </div>
    </div>

    <div class="col-xl-6">
        <div class="card shadow mb-4 mr-md-3 mt-md-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chart Jumlah Layanan</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                Berikut ini adalah jumlah layanan yang dipilih penerima dengan total {{$pengiriman}} pengiriman paket
            </div>
        </div>
    </div>
</div>


<script>
    // Kode JavaScript untuk grafik pertama (myPie)

    var label12 = [@foreach($jpembayaran as $jp)
        '{{$jp->metode}}', @endforeach
    ];
    var data2 = [@foreach($jpembayaran as $jp)
        {{$jp->jumlah}}, @endforeach];

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#myPie'), {
            type: 'doughnut',
            data: {
                labels: label12,
                datasets: [{
                    data: data2,
                    backgroundColor: ['#008B8B', '#2E8B57', '#3c9faf'],
                    hoverBackgroundColor: ['#008080', '#3CB371', '#3c9faf'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    });

    // Kode JavaScript untuk grafik kedua (myPieChart)

    var label2 = [@foreach($jlayanan as $jly)
        '{{$jly->nama_layanan}}', @endforeach
    ];
    var data3 = [@foreach($jlayanan as $jly) {{$jly -> jumlah}}, @endforeach];

    document.addEventListener("DOMContentLoaded", () => {
        new Chart(document.querySelector('#myPieChart'), {
            type: 'doughnut',
            data: {
                labels: label2,
                datasets: [{
                    data: data3,
                    backgroundColor: ['#164863', '#427D9D', '#9BBEC8'],
                    hoverBackgroundColor: ['#123456', '#5F9EA0', '#98AFC7'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
    });
</script>



<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Detail Paket</h6>
            <a href="{{route('paket.index')}}">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th class="text-bold" scope="col">#</th>
                        <th class="text-bold" scope="col">Kode Pengiriman</th>
                        <th class="text-bold" scope="col">Berat</th>
                        <th class="text-bold" scope="col">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tbpengiriman as $row)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$row->kode}}</td>
                        <td>{{$row->paket->berat}} Kg</td>
                        <td>{{$row->paket->deskripsi}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Recent Sales End -->


    <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Kalender</h6>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Data layanan</h6>
                        <a href="{{route('layanan.index')}}">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Layanan</th>
                                    <th scope="col">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tblayanan as $lyn)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$lyn->nama_layanan}}</td>
                                    <td>Rp. {{$lyn->biaya}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Data Kurir</h6>
                        <a href="{{route('kurir.index')}}">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kurir</th>
                                    <th scope="col">Nomor Hp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tbkurir as $kr)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$kr->nama_kurir}}</td>
                                    <td>{{$kr->nomor_telepon}}</td>
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