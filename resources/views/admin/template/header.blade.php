{{-- head start --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('logo/icon.png')}}" rel="icon">
    <script src="https://kit.fontawesome.com/0b9d20e297.js" crossorigin="anonymous"></script>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Libraries Stylesheet -->
    <link href="{{asset('admin/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    <div class="container-fluid position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        {{-- head end --}}

        {{-- sizebar start--}}
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{url('admin/dashboard')}}" class="navbar-brand mx-4 mb-3">
                    <img src="{{asset('logo/logo.png')}}" alt="" style="width: 180px">
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if (empty(Auth::user()->foto))
                            <img src="{{asset('admin/photo_user/no_photo.jpg')}}" alt="Profile" class="rounded-circle" style="width: 40px">
                        @else
                            <img src="{{asset('storage/photo_user/'.Auth::user()->foto)}}" alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; object-fit: cover;" width="40px">
                        @endif
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">
                            @if (empty(Auth::user()->username))
                                {{''}}
                            @else
                                {{Auth::user()->username}}
                            @endif
                        </h6>
                        <span>
                            @if (empty(Auth::user()->level))
                                {{''}}
                            @else
                                {{Auth::user()->level}}
                            @endif
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{url('admin/dashboard')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('pengiriman.index')}}" class="nav-item nav-link"><i class="fa-solid fa-truck-ramp-box me-2"></i>Pengiriman</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-table me-2"></i>Data</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('paket.index')}}" class="dropdown-item">Paket</a>
                            <a href="{{route('penerima.index')}}" class="dropdown-item">Penerima</a>
                            <a href="{{route('pembayaran.index')}}" class="dropdown-item">Pembayaran</a>
                            <a href="{{route('layanan.index')}}" class="dropdown-item">Layanan</a>
                            <a href="{{route('kurir.index')}}" class="dropdown-item">Kurir</a>
                            <a href="{{route('akun.index')}}" class="dropdown-item">Akun</a>
                            <a href="{{route('dompet.index')}}" class="dropdown-item">Dompet</a>
                        </div>
                    </div>
                    <a href="{{url('admin/laporan')}}" class="nav-item nav-link"><i class="fa-solid fa-book-open-reader me-2"></i>Laporan</a>
                </div>
            </nav>
        </div>
        {{-- sizebar end --}}

        {{-- navbar start --}}
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            @if (empty(Auth::user()->foto))
                                <img src="{{asset('admin/photo_user/no_photo.jpg')}}" alt="Profile" class="rounded-circle" style="width: 40px">
                            @else
                                <img src="{{asset('storage/photo_user/'.Auth::user()->foto)}}" alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; object-fit: cover;" width="40px">
                            @endif
                            <span class="d-none d-lg-inline-flex">
                                @if (empty(Auth::user()->username))
                                    {{''}}
                                @else
                                    {{Auth::user()->username}}
                                @endif
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{url('admin/profile')}}" class="dropdown-item">My Profile</a>
                            <a class="dropdown-item d-flex" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span>Sign Out</span>
                            </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </div>
                    </div>
                </div>
            </nav>
            {{-- navbar end{{asset(' --}}