<div class="modal-dialog modal-lg add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Edit My Profile</h4>
    </div>
 

    {!! Form::open(array('url' => url('/patients/changeMyPass/'.Auth::user()->id), 'method' => 'POST', 'id' => 'change-patients-form')) !!} 
    <div class="modal-body">  
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="username">Firstname</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" class="form-control" autocomplete="false" value="{{ Auth::user()->username }}">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 
        <div class="col-md-12">
          <div class="form-group">
            <label for="old_password">Old Password</label>
            <input type="password" id="old_password" name="old_password" placeholder="Old password" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" id="new_password" name="new_password" placeholder="New password" class="form-control" autocomplete="false">
            <span class="help-text text-danger"></span>
          </div> 
        </div> 

        <div class="col-md-12">
          <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" class="form-control" autocomplete="false">
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
      $("#change-patients-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'POST',
          url: $url,
          data: $("#change-patients-form").serialize(), 
          success: function(result){
            if(result.not_match){
              swal({
                  title: result.msg,
                  icon: "error"
                });
            }else{
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
            }
          },
          error: function(xhr,status,error){
            var response_object = JSON.parse(xhr.responseText); 
            associate_errors(response_object.errors, $form);
          }
        });

      });
  });  
 </script> 