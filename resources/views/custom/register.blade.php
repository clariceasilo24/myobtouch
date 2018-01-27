@extends('layouts.admin')
@section('title', 'Add User')

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

      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Manage Users</h3> 
          <!-- <button type="button" class="btn btn-info"><a href="{{ url('/home') }}"> Add a New Patient Record </a></button><br><br> -->
          <button type="button" class="btn btn-info" data-target="#contactForm" data-toggle="modal">Add a New User</button>
          <br>
          <br>
        </div>
      </div>

      <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->

      <div class="modal fade bd-example-modal-lg" id="contactForm">
        <div class="modal-dialog modal-md">

          <!-- Modal content no 1-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center form-title">Add a User</h4>
            </div>
            <div class="modal-body padtrbl">
              <form id="contactForm" action="{{ route('custom.register') }}" method="POST">
                {{ csrf_field()}}

                <div class="form-group">
                  <label for="username" class="control-label" >User Name:</label>
                  <input type="text" name="username" class="form-control" id="username" value="{{old('username')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                
                <div class="form-group ">
                  <div class="form-group col-md-12">
                    <label class="control-label" for="account_type">
                     Account Type:
                    </label>
                    <select class="select form-control" id="account_type" name="account_type">
                     <option value="Admin">
                      Admin
                     </option>
                     <option value="Secretary">
                      Secretary
                     </option>
                    </select>
                  </div>
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
                
                <div class="form-row">
                <button type="submit" class="btn btn-primary">Save</button>
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
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

@endsection

