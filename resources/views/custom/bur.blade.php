<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset="UTF-8">
	<title>Custom Registration</title>

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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
	<section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Add User</h3>
          <p class="section-description">Register and start using myOBtouch!</p>
        </div>
      </div>

      <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->

      <div class="container wow fadeInUp">
        <div class="row justify-content-center">

          <div class="col-lg-7 col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form">

              <form action="{{ route('custom.register') }}" method="post"class="contactForm">
                {{ csrf_field()}}

                <div class="form-group">
                  <label for="name" class="control-label" >First Name:</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                
                <div class="form-group">
                  <label for="lastname" class="control-label" >Last Name:</label>
                  <input type="text" name="lastname" class="form-control" id="lastname" value="{{old('lastname')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>


                <div class="form-group ">
                <label class="control-label requiredField" for="account_type">
                 Account Type
                </label>
                <select class="select form-control" id="account_type" name="account_type">
                 <option value="Admin">
                  Admin
                 </option>
                 <option value="Secretary">
                  Secretary
                 </option>
                 <option value="Patient">
                  Patient
                 </option>
                </select>
               </div>


                <div class="form-group">
                	<label for="email" class="control-label" >Email:</label>
                  <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                	<label for="password" class="control-label" >Password:</label>
                  <input type="password" class="form-control" name="password" id="password" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label for="password_confirmation" class="control-label" >Confirm password:</label>
                  <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label for="username" class="control-label" >User Name:</label>
                  <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>

                <div class="form-group">
                  <label for="birthdate" class="control-label" >Date of Birth:</label>
                  <input type="date" name="birthdate" class="form-control" id="birthdate" value="{{old('birthdate')}}"/>
                  <div class="validation"></div>
                </div>

        

                <div class="form-group ">
                <label class="control-label requiredField">
                 Gender:
                </label>
                <div class="">
                 <div class="radio">
                  <label class="radio">
                   <input name="genderradio" type="radio" value="Male"/>
                   Male
                  </label>
                 </div>
                 <div class="radio">
                  <label class="radio">
                   <input name="genderradio" type="radio" value="Female"/>
                   Female
                  </label>
                 </div>
                </div>
               </div>


               <div class="form-group ">
                  <label class="control-label requiredField">
                   Status:
                  </label>
                  <div class="">
                   <div class="radio">
                    <label class="radio">
                     <input name="statusradio" type="radio" value="Single"/>
                     Single
                    </label>
                   </div>
                   <div class="radio">
                    <label class="radio">
                     <input name="statusradio" type="radio" value="Married"/>
                     Married
                    </label>
                   </div>
                  </div>
                </div>


                 <div class="form-group">
                  <label for="address" class="control-label" >Address:</label>
                  <input type="text" name="address" class="form-control" id="address" value="{{old('address')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                 </div>

                 <div class="form-group">
                  <label for="nationality" class="control-label" >Nationality:</label>
                  <input type="text" name="nationality" class="form-control" id="nationality" value="{{old('nationality')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                 </div>

                 <div class="form-group">
                  <label for="religion" class="control-label" >Religion:</label>
                  <input type="text" name="religion" class="form-control" id="religion" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                 </div>

                 <div class="form-group">
                  <label for="contact_no" class="control-label" >Mobile No:</label>
                  <input type="text" name="contact_no" class="form-control" id="contact_no" data-rule="minlen:4" value="{{old('contact_no')}}" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                 </div>

                <div class="text-center"><button type="submit">Register</button></div>
                <br>
                <br>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->


    <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.appear.js"></script>
  <script src="js/stellar.js"></script>
  <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/nivo-lightbox.min.js"></script>
  <script src="js/custom.js"></script>

</body>
</html>

