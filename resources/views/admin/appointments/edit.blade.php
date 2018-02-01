<div class="modal-dialog modal-md add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Edit Appointment</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/appointments/'.$appointment->id), 'method' => 'PATCH', 'id' => 'edit-services-form')) !!} 
    <div class="modal-body">
      <!-- <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status">
            <option value="pending">Pending</option>
            <option value="served">Served</option>
          </select>
          <span class="help-text text-danger"></span>
      </div>    -->
      
      
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label for="patient_id">Patient</label> 
              <select class="form-control" name="patient_id">
                <option disabled selected>Select Patient</option>
                @foreach($patients as $patient)
                  <option value="{{ $patient->id }}" {{$appointment->patient_id == $patient->id ? 'selected':''}}>{{ $patient->firstname.' '.$patient->lastname }}</option>
                @endforeach
              </select>
              <span class="help-text text-danger"></span>
          </div> 
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label for="status">Status</label> 
              <!-- <input type="text" class="form-control" id="status" name="status" autocomplete="false" value="{{ $appointment->status}}"> -->
              <select class="form-control" name="status">
                <option disabled selected>Select Status</option>
                 <option value="pending" {{$appointment->status == "pending" ? 'selected':''}}>Pending</option>
                 <option value="served" {{$appointment->status == "served" ? 'selected':''}}>Served</option>
                 <option value="cancelled" {{$appointment->status == "cancelled" ? 'selected':''}}>Cancelled</option>
              </select>
              <span class="help-text text-danger"></span>
          </div> 
        </div>
      </div>

      <div class="row">

        <div class="col-md-12">
          <div class="form-group">
              <label for="date_time">Date</label>
              <div class="input-group date" data-provide="datepicker" id="date">
                  <input type="text" class="form-control" name="date_time" value="{{ date('m/d/Y') }}">
                  <div class="input-group-addon">
                      <span class="glyphicon glyphicon-th"></span>
                  </div>
              </div>
              <span class="help-text text-danger"></span>
          </div>
        </div> 
        {{-- <div class="col-md-6">
          <div class="form-group">
              <label for="date_time">Date</label>
              <input type="date" class="form-control" id="date_time" name="date_time" autocomplete="false" value="{{ date('Y-m-d', strtotime($appointment->date_time)) }}">
              <span class="help-text text-danger"></span>
          </div>
        </div> 
        <div class="col-md-6">
          <div class="form-group">
              <label for="description">Time</label>
              <select class="form-control timeslot_id_2" name="timeslot_id" id="timeslot_id">  
              </select>
              <span class="help-text text-danger"></span>
          </div>
        </div> --}}
      </div> 
      <div class="form-group">
          <label for="remarks">Remarks</label>
          <textarea class="form-control" name="remarks" id="remarks" rows="3" placeholder="Remarks">{{$appointment->remarks}}</textarea>
          <span class="help-text text-danger"></span>
      </div>   
    </div>
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
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
               $('.modal').modal('hide');
            }else{
              swal({
                  title: result.msg,
                  icon: "error"
                });
            }
            $("#appointments-table").DataTable().ajax.url( '/admin/get-appointments' ).load();
          },
          error: function(xhr,status,error){
            var response_object = JSON.parse(xhr.responseText); 
            associate_errors(response_object.errors, $form);
          }
        });

      });


      $("[name='date_time']").change(function(){
        getAvalable();
      });
       
      function getAvalable(){
              $.ajax({
                url: '/admin/getAvalableTime/?date='+$("[name='date_time']").val()+'/'+{{ $appointment->id }},         
                success: function(data) {
                  var str = ''; 
                  for(var i = 0 ; i < data.records.length ; i++){
                    var from  = data.records[i]['from']+'';
                    var to = data.records[i]['to']+'';
                    var f = from.split(':');
                    var t = to.split(':');
                    var f_ampm = '';
                    var t_ampm = '';
                    if(f > 11){
                        f_ampm="PM";
                    }else{
                        f_ampm="AM";
                    }
                    if(t > 11){
                        t_ampm="PM";
                    }else{
                        t_ampm="AM";
                    }
                    var selected = '';
                    if({{ $appointment->timeslot_id }} == data.records[i]['id']){
                      selected = 'selected';
                    }
                    str+='<option value="'+data.records[i]['id']+'" '+selected+'>'+f[0]+':'+f[1]+' '+f_ampm+' - '+t[0]+':'+t[1]+' '+t_ampm+'</option>';
                  }
                  $('.timeslot_id_2').html(str);
                }
              });  
      }
       getAvalable();
       $("[name='date_time']").change();

      var date = new Date();
      var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      $('#date').datepicker({ 
          startDate: today,
          minDate: date
      });
  });  
 </script> 