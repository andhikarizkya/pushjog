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

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">
 
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}"/>

  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>


  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
      <div class="user-panel">
      @if (Route::has('login'))
             @auth
             @if(auth()->user()->role == 'pemilik')
             <a href="{{ url('/home') }}" class="nav-link">Home</a>
             @else(auth()->user()->role == 'pembeli')
             <a href="{{ url('/home') }}" class="nav-link">Home</a>
                 @endif
                    @else
                  <a href="{{ route('login') }}" class="login">Login</a>

                 @if (Route::has('register'))
                 <a href="{{ route('register') }}" class="register">Register</a>
                 @endif
             @endauth
     @endif
      </div> 
    </div>
    <ul class="main-menu">
    </ul>
  </header>
  <!-- Header section end -->

  <!-- Hero section -->
  <section class="hero-section">
    <div class="hero-slider owl-carousel">
      <div class="hs-item">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="hs-text">
                <h2><span>Push</span> Jog</h2>
                <p>Selamat Datang di Website Kami</p>
                <a href="{{ url('/utama') }}" class="site-btn">Cari Barang</a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="hr-img">
                <img src="assets/img/malioboro.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hs-item">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="hs-text">
                <h2><span>Pusat Oleh </span> Oleh Jogja</h2>
                <p>Selamat Berbelanja Oleh-Oleh Khas Yogyakarta</p>
                 <a href="{{ url('/utama') }}" class="site-btn">Cari Barang</a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="hr-img">
                <img src="assets/img/tugu.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero section end -->
      

 
  <!-- Premium section end -->
  <section class="premium-section spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-title">
            <h2>Anggota Tim</h2>
          </div>
        </div>
        <div class="col-lg-6">
          <p></p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="premium-item">
            <img src="assets/img/andika.jpeg" alt="">
            <h4>Andhika Rizky Aryasta</h4>
            <p>18523073</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="premium-item">
            <img src="assets/img/sukek.jpeg" alt="">
            <h4>Rizky Achmad Almayda</h4>
            <p>18523094</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="premium-item">
            <img src="assets/img/gudis.jpg" alt="">
            <h4>Haris Riski Rakhman</h4>
            <p>18523113</p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="premium-item">
            <img src="assets/img/adam.jpeg" alt="">
            <h4>Adam Nurfaizi</h4>
            <p>18523159</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Premium section end -->

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

  </body>
</html>