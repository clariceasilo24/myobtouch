@extends('admin.includes.app')

@section('content')

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">
								Appointment Reports
								<div class="form-group pull-right col-md-3 col-sm-5 col-xs-12">
									
					              <label for="date_time">Date</label>
					              <div class="input-group date" data-provide="datepicker" id="date">
					                  <input type="text" class="form-control" name="date_time" value="{{ date('m/d/Y') }}">
					                  <div class="input-group-addon">
					                      <span class="glyphicon glyphicon-th"></span>
					                  </div>
					              </div>
								</div>
							</h3>
						</div>
						<div class="panel-body"> 
							<div class="row">
								<div class="col-md-12">
								
									<table class="table table-bordered table-hover" id="appointment-table">
										<thead>
											<th>#</th>
											<th>Date</th>
											<th>Time</th>
											<th>Patient</th>
										</thead>
									</table>
								</div>
							</div>
						</div>
					</div>   
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="addmodal"></div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="editmodal"></div>
@endsection

@section('scripts')
	<script>
		 $(function(){ 

    		$('#date').datepicker();

		    var table = $('#appointment-table').DataTable({
		      bProcessing: true,
		      bServerSide: false,
		      sServerMethod: "GET",
		      'ajax': '/admin/get-appointment_reports/?date='+$('[name="date_time"]').val(),
		      searching: true, 
		      paging: true, 
		      filtering:false, 
		      bInfo: true,
		      responsive: true,
		      language:{
		        "paginate": {
		          "next":       "<i class='fa fa-chevron-right'></i>",
		          "previous":   "<i class='fa fa-chevron-left'></i>"
		        }
		      },
		      "columns": [ 
		        {data: 'row',  name: 'row', className: ' text-left',   searchable: true, sortable: true}, 
		        {data: 'date_time',  name: 'date_time', className: 'col-md-4 text-left',  searchable: true, sortable: true}, 
		        {data: 'timeslot',  name: 'timeslot', className: 'col-md-4 text-left',  searchable: true, sortable: true},  
		        {data: 'patient',  name: 'patient', className: 'col-md-6 text-left',  searchable: true, sortable: true},
		      ], 
		      'order': [[0, 'asc']],

		        dom: 'Bfrtip',
		        buttons: [
		            {
		                extend: 'print',
		                messageTop: '<h3> Appointment Reports</h3>',
		                title: ''
		            }
		        ]
		    });

		    $('[name="date_time"]').change(function(){
                $("#appointment-table").DataTable().ajax.url( '/admin/get-appointment_reports/?date='+$('[name="date_time"]').val() ).load();
		    });
    });
	</script>
@endsection