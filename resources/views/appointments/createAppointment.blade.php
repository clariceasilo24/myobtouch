@extends('layouts.admin')
@section('title', 'Appointments')

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
          <h3 class="section-title">Appointments</h3> 
          <!-- <button type="button" class="btn btn-info"><a href="{{ url('/home') }}"> Add a New Patient Record </a></button><br><br> -->
          <button type="button" class="btn btn-info" data-target="#serviceform" data-toggle="modal">Book an Appointment</button>
          <br>
          <br>
        </div>
      </div>

    <!--   <div class="container wow fadeInUp">
        <table id="users-table" class="table table-bordered table-dark">
          <thead class="thead-dark">
            <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Description</td>
              <td>Charge</td>
            </tr>
          </thead>
        </table>
      </div> -->
      <!-- <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div> -->

      <div class="modal fade bd-example-modal-lg" id="serviceform">
        <div class="modal-dialog modal-md">

          <!-- Modal content no 1-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-center form-title">Add a Service Record</h4>
            </div>
            <div class="modal-body padtrbl">
              <form id="serviceform" action="/services" method="POST">
                {{ csrf_field()}}
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="name">Service Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="service name">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="description">Description:</label>
                    <!-- <input type="text" class="form-control" id="description" name="description" placeholder="service description"> -->
                    <textarea id="description" name="description" class="form-control" rows="5"></textarea>
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="charge">Service Charge:</label>
                    <input type="text" class="form-control" id="charge" name="charge" placeholder="service charge">
                  </div>
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                
                <div class="form-row">
                <button type="submit" class="btn btn-primary">Save</button>
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
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

@endsection
