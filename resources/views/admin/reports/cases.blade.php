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
								Cases Reports
								<div class="form-group pull-right col-md-3 col-sm-5 col-xs-12">
									<select class="form-control" id="case_id" >
										<option selected value="all">All</option>
										@foreach($cases as $case)
											<option value="{{ $case->id }}" data-name="{{ $case->name }}">{{ $case->name }}</option>
										@endforeach
									</select>
								</div>
							</h3>
						</div>
						<div class="panel-body"> 
							<div class="row">
								<div class="col-md-12">
								
									<table class="table table-bordered table-hover" id="cases-table">
										<thead>
											<th>#</th>
											<th>Case</th>
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
		    var table = $('#cases-table').DataTable({
		      bProcessing: true,
		      bServerSide: false,
		      sServerMethod: "GET",
		      'ajax': '/admin/get-cases_reports/'+$('#case_id').val(),
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
		        {data: 'case',  name: 'case', className: 'col-md-4 text-left',  searchable: true, sortable: true},  
		        {data: 'patient',  name: 'patient', className: 'col-md-6 text-left',  searchable: true, sortable: true},
		      ], 
		      'order': [[0, 'asc']],

		        dom: 'Bfrtip',
		        buttons: [
		            {
		                extend: 'print',
		                messageTop: '<h3> Cases Reports</h3>',
		                title: '',
			            autoPrint: true
		            }
		        ]
		    });

		    $("#case_id").change(function(){
                $("#cases-table").DataTable().ajax.url( '/admin/get-cases_reports/'+$('#case_id').val() ).load();
		    });
    });
	</script>
@endsection