<div class="modal-dialog modal- add-user-form">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
      <h4 class="modal-title">Add</h4>
    </div>
 

    {!! Form::open(array('url' => url('/admin/appointments'), 'method' => 'POST', 'id' => 'add-services-form')) !!} 
    <div class="modal-body">
      <!-- <div class="form-group">
          <label for="status">Status</label>
          <select class="form-control" name="status" id="status">
            <option value="pending">Pending</option>
            <option value="served">Served</option>
          </select>
          <span class="help-text text-danger"></span>
      </div>    -->
      <div class="form-group">
          <label for="patient_id">Patient</label> 
          <select class="form-control" name="patient_id">
            <option disabled selected>Select Patient</option>
            @foreach($patients as $patient)
              <option value="{{ $patient->id }}">{{ $patient->firstname.' '.$patient->lastname }}</option>
            @endforeach
          </select>
          <span class="help-text text-danger"></span>
      </div> 
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
              <label for="date_time">Date</label>
              <input type="date" class="form-control" id="date_time" name="date_time" autocomplete="false" value="{{ date('Y-m-d') }}">
              <span class="help-text text-danger"></span>
          </div>
        </div> 
        <div class="col-md-6">
          <div class="form-group">
              <label for="description">Time</label>
              <select class="form-control" name="timeslot_id" id="timeslot_id"> 
                @foreach($time_slots as $time_slot)
                  <option value="{{ $time_slot->id }}">{{ date('H:i A', strtotime($time_slot->from)).' - '.date('H:i A', strtotime($time_slot->to)) }}</option>
                @endforeach
              </select>
              <span class="help-text text-danger"></span>
          </div>
        </div>
      </div> 
      <div class="form-group">
          <label for="remarks">Remarks</label>
          <textarea class="form-control" name="remarks" id="remarks" rows="3" placeholder="Remarks"></textarea>
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
      $("#date_time").change(function(){
        getAvalable();
      });
        getAvalable();
      function getAvalable(){

              $.ajax({
                url: '/admin/getAvalableTime/'+$("#date_time").val(),         
                success: function(data) {
                  var str = '';
                  console.log(data.records);
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
                    str+='<option value="'+data.records[i]['id']+'">'+f[0]+':'+f[1]+' '+f_ampm+' - '+t[0]+':'+t[1]+' '+t_ampm+'</option>';
                  }
                  $('#timeslot_id').html(str);
                }
              });  
      }
  });  
 </script> 
 <table class="table">
  <tr>
    <th>Name:</th>
    <td>ksdgfkj</td>
  </tr>
 </table>