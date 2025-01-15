<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{asset('logo/icon.png')}}" rel="icon">
	<title>@yield('title')</title>
	<style type="text/css">
		  #logo-main {
		    display: block;
		    margin: 20px auto;
		  }

		  #map_canvas {
		      width:100%;
		      height:100%;
		      position: absolute;
		      top: 0px;
		      left: 0px;
		  }

		  @media only screen and (max-width: 600px) {
		  	#font {
		  		font-size: 24px;
		  	}
		  	#font_p {
		  		font-size: 16px;
		  	}
		  }
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<!-- Start NavBar Top -->
	<header class="border-bottom bg-light fixed-top">
	  <img id="logo-main" src="https://thumbs2.imgbox.com/2a/e4/jsSoKf4p_t.png" width="200" alt="Logo Thing main logo">
	</header>
	<!-- End Navbar Top -->

	<!-- Start Body -->
	<main>

        @yield('konten')
        
    </main>
	<!-- End Body -->

	<!-- Start Bottom Navbar -->
	<nav class="navbar navbar-light bg-light border-top navbar-expand fixed-bottom p-0">
	    <ul class="navbar-nav nav-justified w-100">
	        <li class="nav-item">
	            <a href="{{url('kurir/home')}}" class="nav-link text-center">
	                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-house" fill="currentColor"
	                    xmlns="http://www.w3.org/2000/svg">
	                    <path fill-rule="evenodd"
	                        d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
	                    <path fill-rule="evenodd"
	                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
	                </svg>
	                <span class="small d-block">Home</span>
	            </a>
	        </li>
	        <li class="nav-item">
	            <a href="{{url('kurir/maps')}}" class="nav-link text-center">
	                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
	                  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
	                  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
	                </svg>
	                <span class="small d-block">Maps</span>
	            </a>
	        </li>
	        <li class="nav-item dropup">
	            <a href="{{url('kurir/profile')}}" class="nav-link text-center">
	                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor"
	                    xmlns="http://www.w3.org/2000/svg">
	                    <path fill-rule="evenodd"
	                        d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
	                </svg>
	                <span class="small d-block">Profile</span>
	            </a>
	        </li>
	    </ul>
	</nav>
	<!-- End Bottom Navbar -->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- Script Date -->
	<script>
	    function formatTanggal(tanggal, formatString) {
	          var bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
	                        "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
	          var hari = tanggal.getDate();
	          var bulanIndex = tanggal.getMonth();
	          var tahun = tanggal.getFullYear();

	          return formatString.replace(/dd/g, hari)
	                          .replace(/MMM/g, bulan[bulanIndex])
	                          .replace(/yyyy/g, tahun);
	        }

	        function tampilkanTanggal() {
	          var tanggal = new Date();
	          var teksTanggal = formatTanggal(tanggal, "dd MMM yyyy");

	          document.getElementById("tanggal").innerHTML = teksTanggal;
	        }

	        tampilkanTanggal();
	  </script>
</body>
</html>