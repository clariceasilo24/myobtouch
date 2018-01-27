<div class="modal-dialog add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Add</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/time-slots'), 'method' => 'POST', 'id' => 'add-time-slots-form')) !!} 
    <div class="modal-body">
      <div class="form-group">
          <label for="from">Time From</label>
          <input type="time" class="form-control" id="from" name="from">
          <span class="help-text text-danger"></span>
      </div>  
      <div class="form-group">
          <label for="to">Time To</label>
          <input type="time" class="form-control" id="to" name="to">
          <span class="help-text text-danger"></span>
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
      $("#add-time-slots-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'POST',
          url: $url,
          data: $("#add-time-slots-form").serialize(), 
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
            $("#time-slots-table").DataTable().ajax.url( '/admin/get-time-slots' ).load();
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