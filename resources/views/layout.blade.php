<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
      <link href='http://fonts.googleapis.com/css?family=Roboto:400, 700, 500' rel='stylesheet' type='text/css'>
      <!-- Body font -->
      <link href='http://fonts.googleapis.com/css?family=Lato:300, 400' rel='stylesheet' type='text/css'>

      <link rel="stylesheet" href="{{ asset('/lib/bootstrap/css/bootstrap.min.css') }}">

      <link rel="stylesheet" href="{{ asset('/lib/animations/css/animate.min.css') }}">
      <link rel="stylesheet" href="{{ asset('/lib/font-awesome/css/font-awesome.min.css') }}">
      <!-- Font Icons -->
      <link rel="stylesheet" href="{{ asset('/lib/owl-carousel/css/owl.carousel.css') }}">
      <link rel="stylesheet" href="{{ asset('/lib/owl-carousel/css/owl.theme.css') }}">

      <!-- Theme CSS -->
      <link rel="stylesheet" href="{{ asset('/css/reset.css') }}">
      <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('/css/mobile.css') }}">
      <!-- Skin CSS -->
      <link rel="stylesheet" href="{{ asset('/css/fresh-lime.css') }}">

  </head>
  <body data-spy="scroll" data-target="#main-navbar">
  <!--<div class="page-loader"></div>-->
  <!-- Display loading image while page loads -->
  <div class="body">

      <header id="header" class="header-main">
          <!-- Begin Navbar -->
          <nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="container2">
                  <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar" style="color:black !important"></span>
                          <span class="icon-bar" style="color:black !important"></span>
                          <span class="icon-bar" style="color:black !important"></span>
                      </button>
                      <a class="navbar-brand page-scroll" href="/" style="margin-left: 20px;">
                          Seat Hero
                      </a>
                  </div>
                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-left:90px;">
                      <ul class="nav navbar-nav navbar-right">
                          <li><a href="#how_it_works" class="page-scroll">HOW IT WORKS</a></li>
                          <li><a href="#get_3_months_free" class="page-scroll">GET 3 MONTHS FREE</a></li>
                          <li><a href="#signup" class="page-scroll login-menu">LOGIN</a></li>
                          <li><a href="#signup" class="page-scroll login-menu">SIGNUP</a></li>
                      </ul>
                  </div>
                  <!-- /.container -->
              </div>
          </nav>
          <!-- End Navbar -->
      </header>

            @yield('content')

      <!-- Scroll to top button -->

      <div class="col-lg-12 footer-shadow">
          <a href="#" class="scrolltotop"><i class="fa fa-arrow-up"></i></a>
          <div class="col-lg-6"> <img src="img/footer_logo.png"></div>
          <div class="col-lg-6" align="right" style="padding-top:30px"> Terms Of Use | Copy Right SeatHero 2016</div>
      </div>
  </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Plugins JS -->
          <script src="{{ asset('/lib/owl-carousel/js/owl.carousel.min.js')}}"></script>
          <script src="{{ asset('/lib/stellar/js/jquery.stellar.min.js') }}"></script>
          <script src="{{ asset('/lib/animations/js/wow.min.js') }}"></script>
          <script src="{{ asset('/lib/waypoints.min.js') }}"></script>
          <script src="{{ asset('/lib/isotope.pkgd.min.js') }}"></script>
          <script src="{{ asset('/lib/classie.js') }}"></script>
          <script src="{{ asset('/lib/jquery.easing.min.js') }}"></script>
          <script src="{{ asset('/lib/jquery.counterup.min.js') }}"></script>
          <script src="{{ asset('/lib/smoothscroll.js') }}"></script>

          <!-- Theme JS -->
          <script src="{{ asset('/js/theme.js') }}"></script>


  </body>
</html>
