<div class="modal-dialog modal-lg add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Edit</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/services/'.$service->id), 'method' => 'PATCH', 'id' => 'edit-services-form')) !!} 
    <div class="modal-body">
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" autocomplete="false" value="{{ $service->name }}">
          <span class="help-text text-danger"></span>
      </div> 
      <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" id="description" placeholder="Enter Description" rows="3">{{ $service->description }}</textarea>
          <span class="help-text text-danger"></span>
      </div> 
      <div class="form-group">
          <label for="charge">Charge</label>
          <input type="number" class="form-control" id="charge" min="1" name="charge" placeholder="Enter Charge" autocomplete="false" value="{{ $service->charge }}">
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
      $("#edit-services-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'PATCH',
          url: $url,
          data: $("#edit-services-form").serialize(), 
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
            $("#services-table").DataTable().ajax.url( '/admin/get-services' ).load();
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