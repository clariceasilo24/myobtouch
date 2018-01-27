@extends('layouts.admin')
@section('title', 'Services')

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
          <h3 class="section-title">Manage Services</h3> 
          <!-- <button type="button" class="btn btn-info"><a href="{{ url('/home') }}"> Add a New Patient Record </a></button><br><br> -->
          <button type="button" class="btn btn-info" data-target="#serviceform" data-toggle="modal">Add a New Service Record</button>
          <br>
          <br>
          <!-- <p class="section-description">Search or add a service record to start.</p>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-info my-2 my-sm-0" type="submit">Search</button>
          </form> -->
        </div>
      </div>

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

                
                <div class="form-row">
                <button type="submit" class="btn btn-primary">Save</button>
                <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
              </form>
              <!-- <form>
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name">
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label">Message:</label>
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </form> -->
              
            </div>
          </div>

        </div>
  </div>

</div>
    </section><!-- #contact -->

@endsection
