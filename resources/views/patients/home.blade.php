@extends('layouts.admin')
@section('title', 'My Record')

@section('body')

  <section id="contact" style="padding-top: 200px !important;padding-botton: 150px !important;" class="bg-white">
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
                  <td><b>{{ date('F d, Y', strtotime($patient->birthdate)) }}</b></td>
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
                  <td><b>{{ $patient->occupation }}</b></td>
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
                  <td><b>{{ $patient->reffered_by }}</b></td>
                </tr>
                <tr>
                  <td>Mobile No.:</td>
                  <td><b>{{ $patient->mobile_no }}</b></td>
                </tr>
                <tr>
                  <td></td>
                  <td>
                    <button type="button" class="btn btn-primary edit-data-btn" data-id="{{ $patient->id }}">Update Profile</button>
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
                    <button type="button" class="btn btn-success edit2-data-btn" data-id="{{ $patient->id }}">Update Account</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
      </div>

      
    </section><!-- #contact -->

  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="editmodal"></div>
    <!-- Core JavaScript Files -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/wow.min.js')}}"></script>
  <script src="{{asset('js/jquery.scrollTo.js')}}"></script>
  <script src="{{asset('js/jquery.appear.js')}}"></script>
  <script src="{{asset('js/stellar.js')}}"></script>
  <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
  <script src="{{asset('js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('js/nivo-lightbox.min.js')}}"></script>
  <script src="{{asset('js/custom.js')}}"></script>

  <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script type="text/javascript">
  
        $(document).off('click','.edit-data-btn').on('click','.edit-data-btn', function(e){
          e.preventDefault();
          var that = this; 
          $("#editmodal").html('');
          $("#editmodal").modal();
          $.ajax({
            url: '/patients/editMyProfile/'+that.dataset.id,         
            success: function(data) {
              $("#editmodal").html(data);
            }
          }); 
        });
        $(document).off('click','.edit2-data-btn').on('click','.edit2-data-btn', function(e){
          e.preventDefault();
          var that = this; 
          $("#editmodal").html('');
          $("#editmodal").modal();
          $.ajax({
            url: '/patients/updateaccount',         
            success: function(data) {
              $("#editmodal").html(data);
            }
          }); 
        });
</script>
@endsection
