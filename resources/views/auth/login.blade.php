<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.min.css">
  <link href="css/nivo-lightbox.css" rel="stylesheet" />
  <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
  <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
  <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
  <link href="css/animate.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">

  <!-- boxed bg -->
  <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
  <!-- template skin -->
  <link id="t-colors" href="color/default.css" rel="stylesheet">
  
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom"> 


      <div id="wrapper">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
      <div class="top-area">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6">
              <p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
            </div>
            <div class="col-sm-6 col-md-6">
              <p class="bold text-right">Call us now +62 008 65 001</p>
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
            <li><a href="#doctor">About Us</a></li>
            <li><a href="#facilities">Contact Us</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="index.html">Prenatal check-up</a></li>
                <li><a href="index-form.html">PAP Smear</a></li>
                <li><a href="index-video.html">Ultrasound</a></li>
                <li><a href="#">Cervical Cancer Screening and Prevention</a></li>
              </ul>
            <li><a href="#pricing">Log In</a></li>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>

   

  

	<!--==========================
      Contact Section
    ============================-->
    <br><br><br><br><br><br><br>
	<section id="contact">
      <div class="container wow fadeInUp">
        <div class="col-md-6 col-md-offset-3 text-center">
          <div class="panel panel-default"> 
            <div class="panel-body">
              <div class="section-header">
                <h3 class="section-title">Add User</h3>
                <p class="section-description">Log In and start using myOBtouch!</p>
              </div>

        {{--         @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <div class="form">

                  <form action="{{ route('custom.login') }}" method="post"class="contactForm">
                    {{ csrf_field()}}

                    <div class="form-group text-left {{ $errors->has('username') ? ' has-error' : '' }}">
                      <label for="username" class="control-label " >Username:</label>
                      <input type="text" class="form-control" placeholder="Username" name="username" id="username" value="{{old('username')}}" />
                      @if ($errors->has('username'))
                          <span class="help-block">
                              <strong>{{ $errors->first('username') }}</strong>
                          </span>
                      @endif
                    </div>
 
                    <div class="form-group text-left {{ $errors->has('password') ? ' has-error' : '' }}">
                      <label for="password" class="control-label " >Password:</label>
                      <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                    </div>
                      
                        <div class="form-group text-right">
                            <div class="col-md-12"> 

                                <a class="" href="{{ route('password.request') }}">
                                    Forgot Your Password?<br>
                                </a>
                                <h6 style="margin-bottom: 10px;">&nbsp;</h6>
                            </div>
                        </div>
                    <div class="text-center form-group">
                      <div class="col-md-12">
                        <button class="btn btn-success" type="submit">Log In</button>
                                <h6 style="margin-bottom: 10px;">&nbsp;</h6>
                      </div>
                    </div>
                    <br>
                    <br>
                  </form>
            </div>
          </div>
          
        </div>
      </div>

      <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->

      <div class="container wow fadeInUp">

        <div class="col-md-4 col-md-offset-4 text-center">
        <div class="row justify-content-center">
          <div class="col-md-12">

            </div>
          </div>

        </div>
      </div>
      </div>
    </section><!-- #contact -->


    <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
</body>
</html>

  