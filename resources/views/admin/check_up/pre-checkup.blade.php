<div class="modal-dialog add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Pre-Checkup Details</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/save_precheckup'), 'method' => 'POST', 
    'id' => 'add-pre-checkup-form', 'class'=>'form-horizontal')) !!} 
    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
    <div class="modal-body">
      <div class="row mb-5">
        <div class="col-md-12">
             <h4 class="modal-title mb-3">PATIENT: <b>{{ $appointment->patient->firstname.' '.$appointment->patient->lastname }}</b></h4>
            <h4 class="modal-title mb-3">Date and Time: <b>{{ 
                date('F d, Y', strtotime($appointment->date_time)).' ['.
                date('H:i A', strtotime($appointment->timeslot->from)).'-'.
                date('H:i A', strtotime($appointment->timeslot->to)).']'
              }}</b></h4>
            
        </div>  
      </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Pregnancy:<span class="text-danger">*</span></label>
          <div class="col-sm-10">
            <select class="form-control" id="pregnancy" name="pregnancy">
              <option value="1">POSITIVE</option>
              <option value="0">NEGATIVE</option>
            </select>
            <span class="help-text text-danger"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">BP:</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="bp" name="bp" placeholder="Blood Pressure">
            <span class="help-text text-danger"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">HR:</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="hr" name="hr" placeholder="Heart Rate">
            <span class="help-text text-danger"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">RR:</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="rr" name="rr" placeholder="Respiratory Rate">
            <span class="help-text text-danger"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Height:</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="height" name="height" placeholder="Height">
            <span class="help-text text-danger"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Weight:</label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="weight" name="weight" placeholder="Weight">
            <span class="help-text text-danger"></span>
          </div>
        </div>


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {!! Form::submit('Save', ['class' => 'btn submit-btn btn-primary btn-gradient pull-right']) !!}
      {!! Form::close() !!}
    </div>

  </div>
</div>

 
<script type="text/javascript">
  $(function(){ 
      $("#add-pre-checkup-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'POST',
          url: $url,
          data: $("#add-pre-checkup-form").serialize(), 
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
          },
          error: function(xhr,status,error){
            var response_object = JSON.parse(xhr.responseText); 
            associate_errors(response_object.errors, $form);
          }
        });

      });
  });  
 </script> 