@extends('layouts.admin')
@section('title', 'My Record')

@section('body')


  

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
          <h3 class="section-title">My Record</h3> 
          <!-- <button type="button" class="btn btn-info"><a href="{{ url('/home') }}"> Add a New Patient Record </a></button><br><br> -->
        </div>
      </div>

      <div class="container">
        <div class="row">
          <!-- <form id="serviceform" action="/services" method="POST"> -->
          {!! Form::open(array('url' => url('/patients/home/'.Auth::user()->id), 'method' => 'PATCH', 'id' => 'add-patients-form')) !!} 
                <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="firstname">Firstname</label>
                      <input type="text" id="firstname" name="firstname" placeholder="Enter Firstname" class="form-control" autocomplete="false" value="{{ $patient->firstname }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="lastname">Lastname</label>
                      <input type="text" id="lastname" name="lastname" placeholder="Enter Lastname" class="form-control" autocomplete="false" value="{{ $patient->lastname }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="nickname">Nickname</label>
                      <input type="text" id="nickname" name="nickname" placeholder="Enter Nickname" class="form-control" autocomplete="false" value="{{ $patient->nickname }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="mobile_no">Mobile No.</label>
                      <input type="text" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No." class="form-control" autocomplete="false" value="{{ $patient->mobile_no }}">
                      <span class="help-text text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="birthdate">Date of Birth</label>
                      <input type="date" id="birthdate" name="birthdate" placeholder="Enter Date of Birth" class="form-control" autocomplete="false" value="{{ $patient->birthdate }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="firstname">Gender</label> 
                      <select class="form-control" name="gender" id="gender">
                        <option disabled selected>Select Gender</option>
                        <option {{ $patient->gender == 'Male' ? 'selected':'' }}>Male</option>
                        <option {{ $patient->gender == 'Female' ? 'selected':'' }}>Female</option>
                      </select>
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="status">Status</label> 
                      <select class="form-control" name="status" id="status">
                        <option disabled selected>Select Staus</option>
                        <option {{ $patient->status == 'Single' ? 'selected':'' }}>Single</option>
                        <option {{ $patient->status == 'Married' ? 'selected':'' }}>Married</option>
                      </select>
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="address">Address</label>
                      <input type="text" id="address" name="address" placeholder="Enter Address" class="form-control" autocomplete="false" value="{{ $patient->address }}">
                      <span class="help-text text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="occupation">Occupation</label>
                      <input type="text" id="occupation" name="occupation" placeholder="Enter Occupation" class="form-control" autocomplete="false" value="{{ $patient->occupation }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" autocomplete="false" value="{{ $patient->email }}">
                      <span class="help-text text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <br>
                    <div class="form-group col-md-4">
                      <label for="p_firstname">Firstname</label>
                      <input type="text" id="p_firstname" name="p_firstname" placeholder="Enter Firstname" class="form-control" autocomplete="false" value="{{ $patient->p_firstname }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="p_lastname">Lastname</label>
                      <input type="text" id="p_lastname" name="p_lastname" placeholder="Enter Lastname" class="form-control" autocomplete="false" value="{{ $patient->p_lastname }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="reffered_by">Reffered By</label>
                      <input type="text" id="reffered_by" name="reffered_by" placeholder="Enter Reffered By" class="form-control" autocomplete="false" value="{{ $patient->reffered_by }}">
                      <span class="help-text text-danger"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="username">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" autocomplete="false" value="{{ $patient->user->username }}">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="false">
                      <span class="help-text text-danger"></span>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="exampleInputPassword1">Confirm Password</label>
                      <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" autocomplete="false">
                    </div>
                </div>
              {!! Form::submit('Update', ['class' => 'btn submit-btn btn-primary btn-gradient pull-right']) !!}
              {!! Form::close() !!}
                
          <!-- </form> -->
        </div>
      </div>

      <form id="serviceform" action="/services" method="POST">


      </form>
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

@endsection
