<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    
    <title>@yield('title')</title>

    <!-- Favicons -->
    <link href="{{asset('logo/icon.png')}}" rel="icon">
    <link href="{{asset('homepage/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->


    <!-- Vendor CSS Files -->
    <link href="{{asset('homepage/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('homepage/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('homepage/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('homepage/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('homepage/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('homepage/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Template Main CSS File -->
    <link href="{{asset('homepage/css/style.css')}}" rel="stylesheet">


</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">logistik@gmail.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+6285602622966</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
        </div>
    </section><!-- End Top Bar-->

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between">

            <div id="logo">
                <h1><a href="index.php?#hero">TrackMy<span>Ship</span></a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt=""></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="index.php?#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="index.php?#about">About</a></li>
                    <li><a class="nav-link scrollto" href="index.php?#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="index.php?#team">Team</a></li>
                    <li><a class="nav-link scrollto" href="index.php?#contact">Contact</a></li>

                    <li><a class="nav-link scrollto" href="{{url('lacakpaket')}}">Lacak Paket</a></li>
                    <li><a class="nav-link scrollto" href="{{url('cek')}}">Cek Ongkos Kirim</a></li>
                    <li><a class="nav-link scrollto" href="{{route('login')}}">Login</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->