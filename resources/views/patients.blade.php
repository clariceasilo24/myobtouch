@extends('layouts.admin')
@section('title', 'Home')

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
          <h3 class="section-title">Manage your Patients</h3> 
          <!-- <button type="button" class="btn btn-info"><a href="{{ url('/home') }}"> Add a New Patient Record </a></button><br><br> -->
          <button type="button" class="btn btn-info" data-target="#addpatient" data-toggle="modal">Add a New Patient Record</button>
          <br>
          <br>
          
        </div>
      </div>

      <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->

      <div class="modal fade bd-example-modal-lg" id="addpatient">
    <div class="modal-dialog modal-lg">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">Add a Patient Record</h4>
        </div>
        <div class="modal-body padtrbl">
          <form>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="name">First Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="First Name">
              </div>

              <div class="form-group col-md-4">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
              </div>

              <div class="form-group col-md-4">
                <label for="nickname">Nickname:</label>
                <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nick Name">
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="occupation">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Occupation">
              </div>

              <div class="form-group col-md-3">
                <label for="date">Birthdate</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="Birthdate">
              </div>

              <div class="form-group col-md-3">
                <label class="control-label requiredField" for="gender">
                 Gender
                </label>
                <select class="select form-control" id="gender" name="gender">
                 <option value="Female">
                  Female
                 </option>
                 <option value="Male">
                  Male
                 </option>                 
                </select>
               </div>
              
            </div>

              <div class="form-group col-md-2">
                <label class="control-label requiredField" for="status">
                 Status
                </label>
                <select class="select form-control" id="status" name="status">
                 <option value="Single">
                  Single
                 </option>
                 <option value="Married">
                  Married
                 </option>
                </select>
              </div>

            <div class="form-row">
            <div class="form-group">
              <label for="inputAddress2">Address</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, floor, Barangay, Town or Province">
            </div>
          </div>

          <div class="form-row">
               <div class="form-group col-md-5">
                <label for="p_nickname">Partner's Nickname</label>
                <input type="text" class="form-control" id="p_nickname" placeholder="Partner's Nickname">
              </div>

              <div class="form-group col-md-5">
                <label for="referred_by">Referred by</label>
                <input type="text" class="form-control" id="referred_by" placeholder="Person who referred you to this clinic">
              </div>

              <div class="form-group col-md-2">
                  <label class="control-label requiredField" for="account_type">
                     Account Type
                    </label>
                    <select class="select form-control" id="account_type" name="account_type">
                     <option value="patient">
                      Patient
                     </option>  
                    </select>
                </div>
              

          </div>

            <div class="form-row">

               <div class="form-group col-md-3">
                <label for="username">User Name:</label>
                <input type="username" class="form-control" id="username" placeholder="Your username">
              </div>

              <div class="form-group col-md-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email">
              </div>

              <div class="form-group col-md-3">
                <label for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
              </div>

              <div class="form-group col-md-3">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" placeholder="Retype your password">
              </div>

            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </form>
        </div>
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

