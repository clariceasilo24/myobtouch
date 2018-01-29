<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MyOBTouch - @yield('title')</title>

  <!-- css -->
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/cubeportfolio/css/cubeportfolio.min.css') }}">
  <link href="{{ asset('css/nivo-lightbox.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/nivo-lightbox-theme/default/default.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/owl.carousel.cs') }}s" rel="stylesheet" media="screen" />
  <link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet" media="screen" />
  <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

  <!-- boxed bg -->
  <link id="bodybg" href="{{ asset('bodybg/bg1.css') }}" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="{{ asset('color/default.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Medicio
    Theme URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->

  <link rel="icon" href="{{ asset('img/ico.png') }}" type="image/gif" sizes="16x16">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">

  

      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
          <div class="top-area">
            <div class="container">
              <div class="row">
                <div class="col-sm-6 col-md-6">
                  <p class="bold text-left">Monday - Friday (3:00PM-6:00PM) Saturday (12:00PM-3:00PM) </p>
                </div>
                <div class="col-sm-6 col-md-6">
                  <p class="bold text-right">Call us now +63 949 990 7246</p>
                </div>
              </div>
            </div>
          </div>
          <div class="container navigation">

            <div class="navbar-header page-scroll">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
              <a class="navbar-brand" href="index.html">
                        <img src="img/logo.png" alt="" width="150" height="40" />
                    </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#intro">Home</a></li>
                {{-- <li><a href="{{ url('/patients') }}">Patients</a></li> --}}
                <li><a href="{{ url('/services') }}">Services</a></li>
{{--                 <li><a href="#facilities">Appointments</a></li>
                <li><a href="#facilities">Check Ups</a></li>
                <li><a href="#facilities">Users</a></li> --}}



                @guest
                <li><a href="{{ url('/login') }}">Log In</a></li>
                @else
                  
                  @if(Auth::user()->account_type == 'admin')
                  <li><a href="{{ url('/admin/home') }}"> <i class="fa fa-bank"></i> Admin Page</a></li>
                  @elseif(Auth::user()->account_type == 'secretary')
                  <li><a href="{{ url('/admin/home') }}">Secretary</a></li>
                  @else
                  <!-- return Auth::user()->id; -->
                  <li><a href="{{ url('/patients/appointments') }}">My Appointments</a></li>
                  <li><a href="{{ url('/patients/home/' .Auth::user()->id. '/' ) }}">My Profile</a></li>
                  <li><a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Sign out</span></a> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                  </li>
                  <!-- <li><a href="{{ url('/admin/home') }}">Patient</a></li> -->
                  @endif
                @endguest
                </li>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container -->
        </nav>

        @section('body')
        @show

       
</body>

</html>