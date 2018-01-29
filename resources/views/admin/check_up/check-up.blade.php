<div class="modal-dialog modal-lg add-user-form w-75">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Checkup Details</h4>
    </div>
 <style type="text/css">
   .no-border{
    border: 0px !important;
    box-shadow: 0px 0px 0px !important;
   }
 </style>

    {!! Form::open(array('url' => url('/admin/services'), 'method' => 'POST', 'id' => 'add-services-form', 'class'=>'form-horizontal')) !!} 
    <div class="modal-body">
      <div class="row mb-5">
        <div class="col-md-12">
             <h4 class="modal-title mb-3">PATIENT: <b>{{ $checkup->appointment->patient->firstname.' '.$checkup->appointment->patient->lastname }}</b></h4>
            <h4 class="modal-title mb-3">Date and Time: <b>{{ 
                date('F d, Y', strtotime($checkup->appointment->date_time)).' ['.
                date('H:i A', strtotime($checkup->appointment->timeslot->from)).'-'.
                date('H:i A', strtotime($checkup->appointment->timeslot->to)).']'
              }}</b></h4>
  
        </div>  
      </div>
      <div class="row">

        <div class="col-md-4">
          <div class="panel panel-info">
            <div class="panel-heading"><b>Pre-Check-up Detail</b></div>
            <div class="panel-body">
                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-6" for="email">Pregnancy:<span class="text-danger">*</span></label>
                  <div class="col-md-8 col-sm-6">
                    <select class="form-control no-border" id="pregnancy" name="pregnancy">
                      <option value="1" {{ $checkup->pregnancy ? 'selected':''}}>POSITIVE</option>
                      <option value="0" {{ $checkup->pregnancy ? '':'selected'}}>NEGATIVE</option>
                    </select>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-6" for="email">BP:</label>
                  <div class="col-md-8 col-sm-6">
                  <input type="text" class="form-control no-border" id="bp" name="bp" placeholder="Blood Pressure" value="{{ $checkup->bp }}">
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-6" for="email">HR:</label>
                  <div class="col-md-8 col-sm-6">
                  <input type="text" class="form-control no-border" id="hr" name="hr" placeholder="Heart Rate" value="{{ $checkup->hr }}">
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-6" for="email">RR:</label>
                  <div class="col-md-8 col-sm-6">
                  <input type="text" class="form-control no-border" id="rr" name="rr" placeholder="Respiratory Rate" value="{{ $checkup->rr }}">
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-6" for="email">Height:</label>
                  <div class="col-md-8 col-sm-6">
                  <input type="text" class="form-control no-border" id="height" name="height" placeholder="Height" value="{{ $checkup->height }}">
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4 col-sm-6" for="email">Weight:</label>
                  <div class="col-md-8 col-sm-6">
                  <input type="text" class="form-control no-border" id="weight" name="weight" placeholder="Weight" value="{{ $checkup->weight }}">
                    <span class="help-text text-danger"></span>
                  </div>
                </div>
            </div>
          </div>
          

        </div>

        <div class="col-md-8">

          <div class="panel panel-success">
            <div class="panel-heading"><b>Check-up Detail</b></div>
            <div class="panel-body">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Complaints:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Complaints"></textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Assessments:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Assessments"></textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Treatments:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Treatments"></textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Prescribe Meds:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Prescribe Meds"></textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Cases:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Cases"></textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Service:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Service"></textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>


            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
        {!! Form::submit('Save', ['class' => 'btn submit-btn btn-primary btn-gradient pull-right']) !!}
      {!! Form::close() !!}
    </div>

  </div>
</div>

 
<script type="text/javascript">
  $(function(){ 

      $("#add-services-form").on('submit', function(e){
        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
        var $form = $(this);
        var $url = $form.attr('action');
        var formData = {}; 
        
        $.ajax({
          type: 'POST',
          url: $url,
          data: $("#add-services-form").serialize(), 
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