@extends('user.template.appuser')

@section('title', 'Dashboard - TrackMyShipment')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <div class="alert alert-light " role="alert">
        <div class="text">
            <h4 class="alert-heading">Selamat Datang Di TrackMyShipment</h4>
            <p class="mt-2">Periksa semua update barang anda disini</p>
        </div>
    </div>
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Sales Card -->
                    <div class="col-xl-6">
                        <div class="card info-card sales-card shadow-sm ">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="ps-1 pt-4">
                                        <h6>{{$pengiriman}}</h6>
                                        <p class="font-weight-bold">jumlah pengiriman</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->

                    <div class="col-xl-6">
                        <div class="card info-card sales-card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="ps-1 pt-4">
                                        <h6>{{$status}}</h6>
                                        <p class="font-weight-bold">belum diambil</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                    <div class="col-xl-6">
                        <div class="card info-card sales-card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="ps-1 pt-4">
                                        <h6>{{$diterima}}</h6>
                                        <p class="font-weight-bold">diterima</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card -->
                    {{-- <div class="col-xl-6">
                        <div class="card info-card sales-card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="ps-1 pt-4">
                                        <h6>18</h6>
                                        <p class="font-weight-bold">Order Return</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Sales Card --> --}}

                    <!-- Reports -->
                    <div class="col-12">
                        {{-- <div class="alert alert-light " role="alert">
                            <div class="text">
                                <h4 class="alert-heading">Analisis Bisnis</h4>
                                <p class="mt-2">Analisis bisnis hanya menampilkan informasi mengenai aktifitas toko anda saat berkurang</p>
                            </div>
                        </div> --}}
                        <div class="card">

                            

                            {{-- <div class="card-body">
                                <h5 class="card-title">Reports <span>/Today</span></h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Sales',
                                                data: [31, 40, 28, 51, 42, 82, 56],
                                            }, {
                                                name: 'Revenue',
                                                data: [11, 32, 45, 32, 34, 52, 41]
                                            }, {
                                                name: 'Customers',
                                                data: [15, 11, 32, 18, 9, 24, 11]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                                    "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                                    "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                                    "2018-09-19T06:30:00.000Z"
                                                ]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div> --}}

                        </div>
                    </div><!-- End Reports -->

                   <!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">
                <div class="card info-card sales-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="ps-1 pt-4">
                                <h6>{{$perjalanan}}</h6>
                                <p class="font-weight-bold">Dalam Perjalanan</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Budget Report -->


                <!-- Website Traffic -->
               

                <!-- News & Updates Traffic -->
               

            </div>

        </div>
    </section>

</main><!-- End #main -->
@endsection