<div class="modal-dialog modal-lg add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Edit</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/users/'.$user->id), 'method' => 'PATCH', 'id' => 'edit-users-form')) !!} 
    <div class="modal-body">
      <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" autocomplete="false" value="{{ $user->username }}">
          <span class="help-text text-danger"></span>
      </div>
      <div class="form-group">
          <label for="account_type">User Type</label>
          <select class="form-control" id="account_type" name="account_type">
            <option value="admin" {{ $user->account_type == 'admin'? 'selected':'' }}>Admin</option>
            <option value="secretary" {{ $user->account_type == 'secretary'? 'selected':'' }}>Secretary</option>
            <option value="patient" {{ $user->account_type == 'patient'? 'selected':'' }}>Patient</option>
          </select> 
          <span class="help-text text-danger"></span>
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="false">
          <span class="help-text text-danger"></span>
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" autocomplete="false">
      </div>  
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        {!! Form::submit('Submit', ['class' => 'btn submit-btn btn-primary btn-gradient pull-right']) !!}
      {!! Form::close() !!}
    </div>

  </div>
</div>

 
<script type="text/javascript">
  $(function(){ 
      $("#edit-users-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'PATCH',
          url: $url,
          data: $("#edit-users-form").serialize(), 
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
            $("#users-table").DataTable().ajax.url( '/admin/get-users' ).load();
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