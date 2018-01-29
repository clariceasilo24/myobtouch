@extends('layouts.admin')
@section('title', 'My Record')

@section('body')

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
          <h2>  {{ $patient->firstname }} {{ $patient->lastname }} </h2>
        </div>
      </div>

      <div class="container">
        <p>My profile information.</p>  
        <div class="col-lg-6">
        <div class="table-responsive"></div>       
            <table class="table" style="width:100%">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td width="30%">First Name:</td>
                  <td width="70%"><b>{{ $patient->firstname }}</b></td>
                </tr>
                <tr>
                  <td>Last Name:</td>
                  <td><b>{{ $patient->lastname }}</b></td>
                </tr>
                <tr>
                  <td>Nickname:</td>
                  <td><b>{{ $patient->nickname }}</b></td>
                </tr>
                <tr>
                  <td>Date of Birth:</td>
                  <td><b>{{ $patient->birthdate }}</b></td>
                </tr>
                <tr>
                  <td>Gender:</td>
                  <td><b>{{ $patient->gender }}</b></td>
                </tr>
                <tr>
                  <td>Status:</td>
                  <td><b>{{ $patient->status }}</b></td>
                </tr>
                <tr>
                  <td>Occuptaion:</td>
                  <td><b>{{ $patient->occuptaion }}</b></td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td><b>{{ $patient->address }}</b></td>
                </tr>
                <tr>
                  <td>Partner's Firstname:</td>
                  <td><b>{{ $patient->p_firstname }}</b></td>
                </tr>
                <tr>
                  <td>Partner's Lastname:</td>
                  <td><b>{{ $patient->lastname }}</b></td>
                </tr>
                <tr>
                  <td>Referred by:</td>
                  <td><b>{{ $patient->referred_by }}</b></td>
                </tr>
                <tr>
                  <td>Mobile No.:</td>
                  <td><b>{{ $patient->mobile_no }}</b></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="button" class="btn btn-primary">Update Profile</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col-lg-6">
        <div class="table-responsive"></div>       
            <table class="table" style="width:100%">
              <thead>
              </thead>
              <tbody>
                <tr>
                  <td width="30%">Username:</td>
                  <td width="70%"><b>{{ $user->username }}</b></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="button" class="btn btn-success">Update Account</button>
                  </td>
                </tr>
              </tbody>
            </table>
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

@endsection
