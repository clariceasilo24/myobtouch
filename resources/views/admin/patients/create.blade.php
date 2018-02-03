<div class="modal-dialog modal-lg add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Add</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/patients'), 'method' => 'POST', 'id' => 'add-patients-form')) !!} 
    <div class="modal-body">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" id="firstname" name="firstname" placeholder="Enter Firstname" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-6">
          <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter Lastname" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>

      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-5">
          <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" id="nickname" name="nickname" placeholder="Enter Nickname" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>
      
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="birthdate">Date of Birth</label>
            <input type="date" id="birthdate" name="birthdate" placeholder="Enter Date of Birth" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="firstname">Gender</label> 
            <select class="form-control" name="gender" id="gender">
              <option disabled selected>Select Gender</option>
              <option>Male</option>
              <option>Female</option>
            </select>
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="status">Status</label> 
            <select class="form-control" name="status" id="status">
              <option disabled selected>Select Staus</option>
              <option>Single</option>
              <option>Married</option>
            </select>
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" id="occupation" name="occupation" placeholder="Enter Occupation" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-8">
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter Address" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>

      
      <div class="row">
        <div class="col-md-12"> 
            <small>Partner Detail</small>
          </div> 
      </div>
      <div class="row form-group">
        <div class="col-md-6">
          <div class="form-group">
            <label for="p_firstname">Firstname</label>
            <input type="text" id="p_firstname" name="p_firstname" placeholder="Enter Firstname" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-6">
          <div class="form-group">
            <label for="p_lastname">Lastname</label>
            <input type="text" id="p_lastname" name="p_lastname" placeholder="Enter Lastname" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>
      <div class="row">
        <div class="col-md-12"> 
            <small>Other Details</small>
          </div> 
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="reffered_by">Reffered By</label>
            <input type="text" id="reffered_by" name="reffered_by" placeholder="Enter Reffered By" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-6">
          <div class="form-group">
            <label for="mobile_no">Mobile No.</label>
            <input type="text" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No." class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>
      <div class="row">
        <div class="col-md-12"> 
            <small>Account Details</small>
          </div> 
      </div>
      <div class="row">
        <div class="col-md-6">
          <input type="hidden" name="account_type" value="patient"> 
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" autocomplete="false">
                <span class="help-text text-danger"></span>
            </div>{{-- 
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="false">
                <span class="help-text text-danger"></span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" autocomplete="false">
            </div>   --}}
        </div> 
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('Submit', ['class' => 'btn submit-btn btn-primary btn-gradient pull-right']) !!}
      {!! Form::close() !!}
    </div>

  </div>
</div>
<style type="text/css">
  .pass{
    font-family: monospace; 
    color: black;
  }
  .swal2-content{
    display: none;
  }
</style>
 
<script type="text/javascript">
  $(function(){ 
      $("#add-patients-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'POST',
          url: $url,
          data: $("#add-patients-form").serialize(), 
          success: function(result){
            if(result.success){
              swal({
                  title: result.msg+ "<br>Patient  Password is: <b class='pass'>"+result.pass+"</b>",
                  icon: "success",
                  html: true
                });
            }else{
              swal({
                  title: result.msg,
                  icon: "error"
                });
            }
            $("#patients-table").DataTable().ajax.url( '/admin/get-patients' ).load();
            $('.modal').modal('hide');
          },
          error: function(xhr,status,error){
            var response_object = JSON.parse(xhr.responseText); 
            associate_errors(response_object.errors, $form);
          }
        });

      });
  });  
 </script> 