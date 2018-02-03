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

    {!! Form::open(array('url' => url('/admin/save_checkup/'.$checkup->id), 'method' => 'POST', 'id' => 'add-services-form', 'class'=>'form-horizontal')) !!} 
    <input type="hidden" name="appointment_id" value="{{ $checkup->appointment->id }}">
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
            <div class="panel-heading"><b>Pre-Check-up Detail</b>  
            </div>
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
          
          <div class="panel panel-info">
            <div class="panel-heading"><b>EDC Detail</b>  
            </div>
            <div class="panel-body">

                <div class="form-group">
                  
                        <label for="last_menstruation_date">Last Menstruation Date</label>
                        <div class="input-group date" data-provide="datepicker" id="date">
                            <input type="text" class="form-control" name="last_menstruation_date" id="last_menstruation_date" value="{{ date('m/d/Y') }}">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                  <input type="hidden" name="edc" class="edc">
                  <h3 id="edc"></h3>
                  <label>Estimated date of confinement</label>
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
                    <textarea class="form-control" rows="3" placeholder="Complaints" name="complaints">{{ $checkup->complaints }}</textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Assessments:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Assessments" name="assessments">{{ $checkup->assessments }}</textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Treatments:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Treatments" name="treatment">{{ $checkup->treatment }}</textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Prescribe Meds:</label>
                  <div class="col-md-9 col-sm-8">
                    <textarea class="form-control" rows="3" placeholder="Prescribe Meds" name="prescribed_meds">{{ $checkup->prescribed_meds }}</textarea>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Cases:</label>
                  <div class="col-md-9 col-sm-8">
                    <select name="cases[]" multiple="multiple" class="select2-multi form-control">
                      @foreach($cases as $case)
                        <option value="{{ $case->id }}" {{ $checkup->appointment->cases->where('case_id', $case->id)->first() ? 'selected':'' }}>{{ $case->name }}</option>
                      @endforeach
                    </select>
                    <span class="help-text text-danger"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-4" for="email">Service(s) availed:</label>
                  <div class="col-md-9 col-sm-8"> 
                    <select name="services[]" multiple="multiple" class="select2-multi form-control">
                      @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ $checkup->appointment->services->where('service_id', $service->id)->first() ? 'selected':'' }}> {{ $service->name }} </option>
                      @endforeach
                    </select>
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
<style type="text/css">
  .select2-container{
    width: 100% !important;
  }
</style>
 
<script type="text/javascript">
  $(function(){ 
        $('#date').datepicker(); 
    $('.select2-multi').select2();
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

      $('[name="last_menstruation_date"]').change(function(){
        
        var d = new Date($('[name="last_menstruation_date"]').val());
        var dd = d.setDate(d.getDate()+7);
        var day = d.getDate();
        // var month = (d.getMonth());
        var month = (d.getMonth()+1)-3;
        //var year = d.getFullYear()+1;
        var year = d.getFullYear();

        if(month < 1){
          month = month + 12;
        }
        else
        {
          year = d.getFullYear()+1;
        }

        console.log(year+'-'+month+'-'+day);
        $('.edc').val(year+'-'+month+'-'+day);
        $("#edc").html(getmonthName(month-1) +' '+day+', '+year);
      });

      function getmonthName($m){
        var m = ['January' , 'February', 'March' , 'April', 'May', 'June' , 'July', 'August', 'September', 'October', 'November' , 'December' ];
        return m[$m];
      }
      $('[name="last_menstruation_date"]').change();
  });  
 </script> 