<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Pusat Oleh - Oleh Jogja</title>
  <meta charset="UTF-8">
  <meta name="description" content="SolMusic HTML Template">
  <meta name="keywords" content="music, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Favicon -->
  <link href="assets1/img/favicon.ico" rel="shortcut icon"/>

  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>


  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  @stack('mycss')
</head>
<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Header section -->
  <header class="header-section clearfix">
    <a href="{{ url('/') }}" class="site-logo">
      <img src="assets/img/Logo.png" alt="" width="200">
    </a>
    <div class="header-right">
    </div>
    <ul class="main-menu">
    <ul class="nav ml-auto">
                <li class="nav-item">
                    <?php
                        $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
                        if(!empty($pesanan_utama))
                        {
                            $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count(); 
                        }
                    ?>
                    @if(auth()->user()->role == 'pemilik')  
                    <a class="nav-link" href="{{ url('/penjual/barang') }}">Tambah Produk</a>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/penjual') }}">Daftar Pesanan</a></li>
                    @else(auth()->user()->role == 'pembeli')
                    <a class="nav-link" href="{{ url('pembeli/keranjang') }}">
                        <i class="fa fa-shopping-cart"></i>
                        @if(!empty($notif))
                        <span class="badge badge-danger">{{ $notif }}</span>
                        @endif
                    </a>
                    @endif
                </li>
	          <li class="nav-item dropdown active">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->role == 'pemilik')  
                                    <a class="dropdown-item" href="{{ url('penjual/akun') }}">
                                        Informasi Akun
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                @else(auth()->user()->role == 'pembeli')
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        Informasi Akun
                                    </a>

                                    <a class="dropdown-item" href="{{ url('history') }}">
                                        Riwayat Transaksi
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
            </li>
	        </ul>
    </ul>
  </header>
  <!-- Header section end -->

  <br />
  <br />
  <div class="container">
    @yield('content')
  </div>
  <br />
  <br />

  <!-- Footer section -->
  <footer class="footer-section">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-3 order-lg-2">
          <div class="row">
            <div class="col-sm-4">
              <div class="footer-widget">
                <h2>Dikerjakan dengan</h2>
                <ul>
                  <li><a href="https://code.visualstudio.com/"><b>Visual Studio Code</b></a></li>
                  <li><a href="https://laravel.com/"><b>Laravel</b></a></li>
                  <li><a href="https://www.apachefriends.org/"><b>XAMPP</b></a></li>
                  <li><a href="https://trello.com/"><b>Trello</b></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="footer-widget">
                <h2>Hubungi Kami</h2>
                <ul>
                  <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=new"><b>18523073@students.uii.ac.id</b></a></li>
                  <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=new"><b>18523113@students.uii.ac.id</b></a></li>
                  <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=new"><b>18523094@students.uii.ac.id</b></a></li>
                  <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=new"><b>18523159@students.uii.ac.id</b></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="footer-widget">
                <h2>Alamat Kami</h2>
                <ul>
                  <li><a href="#"><b>Gedung GBPH Prabuningrat
                      Kampus Terpadu UII
                      Jalan Kaliurang km. 14,5 Sleman
                      Yogyakarta 55584</b></a></li>
                  <li><a href="https://www.uii.ac.id/"><b>Website</b></a></li>
                  <li><a href="#"><b>Telepon: +62 274 898444</b></a></li>
                  <li><a href="#"><b>Faks: +62 274 898459</b></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-5 order-lg-1">
          <img src="assets/img/logo.png" alt="">
          <div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
          <div class="social-links">
            <a href=""><i class="fa fa-instagram"></i></a>
            <a href=""><i class="fa fa-pinterest"></i></a>
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer section end -->
  
  <!--====== Javascripts & Jquery ======-->
  <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @include('sweet::alert') 
  @stack('myjs')
  <main class="py-4">
    @yield('footer')
  </main>
  </body>
</html>