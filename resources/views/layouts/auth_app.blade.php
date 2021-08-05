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

  <br />
  <br />
  <div class="container">
    @yield('content')
  </div>
  
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