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
              <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="img/logo.png" alt="" width="150" height="40" />
                    </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
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
                  <li><a href="{{ url('/patients/show/' .Auth::user()->id. '/' ) }}">My Profile</a></li>
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

       

    <footer>

      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>About Medicio</h5>
                <p>
                  Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                </p>
              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Information</h5>
                <ul>
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Laboratory</a></li>
                  <li><a href="#">Medical treatment</a></li>
                  <li><a href="#">Terms & conditions</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Medicio center</h5>
                <p>
                  Nam leo lorem, tincidunt id risus ut, ornare tincidunt naqunc sit amet.
                </p>
                <ul>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
                </span> Monday - Saturday, 8am to 10pm
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                </span> +62 0888 904 711
                  </li>
                  <li>
                    <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                </span> hello@medicio.com
                  </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4">
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Our location</h5>
                <p>The Suithouse V303, Kuningan City, Jakarta Indonesia 12940</p>

              </div>
            </div>
            <div class="wow fadeInDown" data-wow-delay="0.1s">
              <div class="widget">
                <h5>Follow us</h5>
                <ul class="company-social">
                  <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                  <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="sub-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInLeft" data-wow-delay="0.1s">
                <div class="text-left">
                  <p>&copy;Copyright - Medicio Theme. All rights reserved.</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
              <div class="wow fadeInRight" data-wow-delay="0.1s">
                <div class="text-right">
                  <div class="credits">
                    <!--
                      All the links in the footer should remain intact. 
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Medicio
                    -->
                    <a href="https://bootstrapmade.com/bootstrap-education-templates/">Bootstrap Education Templates</a> by BootstrapMade
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>

</html>