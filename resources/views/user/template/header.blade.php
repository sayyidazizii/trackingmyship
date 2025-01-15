@php
use App\Models\Dompet;
$id = Auth::user()->dompet_id;
$dompet = dompet::where('id',$id)->get();

@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('logo/icon.png')}}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="{{asset('user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('user/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('user/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('user/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('user/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('user/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">

    <a href="{{url('my/home')}}" class="align-items-center mx-2">
      <img src="{{asset('logo/logo.png')}}" alt="Profile" style="width: 200px">
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <div class="search-bar">
    <form class="search-form d-flex align-items-center" method="POST" action="#">
      <input type="text" name="query" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
  </div><!-- End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="" data-bs-toggle="dropdown">
          @if (empty(Auth::user()->foto))
            <img src="{{asset('admin/photo_user/no_photo.jpg')}}" alt="Profile" class="rounded-circle" style="width: 36px">
          @else
            <img src="{{asset('storage/photo_user/'.Auth::user()->foto)}}"  alt="Profile" class="rounded-circle" style="aspect-ratio: 1/1; object-fit: cover;" width="36px">
          @endif
          <span class="d-none d-md-block dropdown-toggle ps-2">
            @if (empty(Auth::user()->username))
            {{''}}
            @else
            {{Auth::user()->username}}
            @endif
          </span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">

            <h6>
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

          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{url('my/profile')}}">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
              <i class="bi bi-box-arrow-right"></i>
              {{__('Sign Out')}}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item mb-3">
      <a href="{{url('my/dompetku/')}}" class="nav-item nav-link text-white bg-primary" style="hover: none">
        <i class="bi bi-wallet" style="color: #f5f5f5;"></i>@foreach($dompet as $d)
        Rp. {{number_format($d->saldo, 0, ',', '.')}} @endforeach
      </a>
    </li><!-- End saldo Nav -->

    <li class="nav-item">

      <a class="nav-link collapsed" href="{{url('my/home')}}">

        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('my/pengirimanUser')}}">
        <i class="ri-send-plane-line"></i>
        <span>Pengiriman</span>
      </a>
    </li><!-- End Blank Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('my/lacak')}}">
        <i class="ri-send-plane-line"></i>
        <span>lacak paket</span>
      </a>
    </li><!-- End Blank Page Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('my/cek')}}">
        <i class="ri-send-plane-line"></i>
        <span>cek ongkos kirim</span>
      </a>
    </li><!-- End Blank Page Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="{{url('my/pembayaranUser')}}">
        <i class="ri-file-history-line"></i>
        <span>Riwayat Pembayaran</span>
      </a>
    </li><!-- End Error 404 Page Nav -->
  </ul>

</aside><!-- End Sidebar-->