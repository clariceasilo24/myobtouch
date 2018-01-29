<div class="modal-dialog modal-lg add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Edit My Profile</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/patients/'.$patient->id), 'method' => 'PATCH', 'id' => 'add-patients-form')) !!} 
    <div class="modal-body">
      <input type="hidden" name="account_type" value="patient">
      <input type="hidden" name="username" value="{{ $patient->user->username }}">
      <input type="hidden" name="password">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" id="firstname" name="firstname" placeholder="Enter Firstname" class="form-control" autocomplete="false" value="{{ $patient->firstname }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-6">
          <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" id="lastname" name="lastname" placeholder="Enter Lastname" class="form-control" autocomplete="false" value="{{ $patient->lastname }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>

      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" autocomplete="false" value="{{ $patient->email }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-5">
          <div class="form-group">
            <label for="nickname">Nickname</label>
            <input type="text" id="nickname" name="nickname" placeholder="Enter Nickname" class="form-control" autocomplete="false" value="{{ $patient->nickname }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>
      
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="birthdate">Date of Birth</label>
            <input type="date" id="birthdate" name="birthdate" placeholder="Enter Date of Birth" class="form-control" autocomplete="false" value="{{ $patient->birthdate }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="firstname">Gender</label> 
            <select class="form-control" name="gender" id="gender">
              <option disabled selected>Select Gender</option>
              <option {{ $patient->gender == 'Male' ? 'selected':'' }}>Male</option>
              <option {{ $patient->gender == 'Female' ? 'selected':'' }}>Female</option>
            </select>
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-4">
          <div class="form-group">
            <label for="status">Status</label> 
            <select class="form-control" name="status" id="status">
              <option disabled selected>Select Staus</option>
              <option {{ $patient->status == 'Single' ? 'selected':'' }}>Single</option>
              <option {{ $patient->status == 'Married' ? 'selected':'' }}>Married</option>
            </select>
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" id="occupation" name="occupation" placeholder="Enter Occupation" class="form-control" autocomplete="false" value="{{ $patient->occupation }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-8">
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter Address" class="form-control" autocomplete="false" value="{{ $patient->address }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>


      <div class="row  form-group">
        <div class="col-md-8">
          <div class="form-group">
            <label for="pregnancy">Pregnancy</label>
            <input type="text" id="pregnancy" name="pregnancy" placeholder="Enter Address" class="form-control" autocomplete="false" value="{{ $patient->pregnancy }}">
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
            <input type="text" id="p_firstname" name="p_firstname" placeholder="Enter Firstname" class="form-control" autocomplete="false" value="{{ $patient->p_firstname }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-6">
          <div class="form-group">
            <label for="p_lastname">Lastname</label>
            <input type="text" id="p_lastname" name="p_lastname" placeholder="Enter Lastname" class="form-control" autocomplete="false" value="{{ $patient->p_lastname }}">
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
            <input type="text" id="reffered_by" name="reffered_by" placeholder="Enter Reffered By" class="form-control" autocomplete="false" value="{{ $patient->reffered_by }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-6">
          <div class="form-group">
            <label for="mobile_no">Mobile No.</label>
            <input type="text" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No." class="form-control" autocomplete="false" value="{{ $patient->mobile_no }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
        {!! Form::submit('Submit', ['class' => 'btn submit-btn btn-primary btn-gradient pull-right']) !!}
      {!! Form::close() !!}
    </div>

  </div>
</div>

 
<script type="text/javascript">
  $(function(){ 
      $("#add-patients-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'PATCH',
          url: $url,
          data: $("#add-patients-form").serialize(), 
          success: function(result){
            if(result.success){
              swal({
                  title: result.msg,
                  icon: "success"
                });
            }else{
              swal({
                  title: result.msg,
                  icon: "error"
                });
            }
            $('.modal').modal('hide');
            window.location.reload();   
          },
          error: function(xhr,status,error){
            var response_object = JSON.parse(xhr.responseText); 
            associate_errors(response_object.errors, $form);
          }
        });

      });
  });  
 </script> 