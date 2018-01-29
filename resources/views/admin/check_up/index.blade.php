@extends('admin.includes.app')

@section('content')

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content p-1 py-5">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline col-md-6 p-4">
						<div class="panel-heading p-0">
							<h3 class="panel-title">
								Appointments for Today (<b>{{ date('F d, Y') }}</b>)
							</h3>
						</div>
						<div class="panel-body p-0"> 
							<div class="row">
								<div class="col-md-12">
								
									<table class="table table-bordered table-hover" id="appointments-table" style="width: 100%;">
										<thead class=""> 
											<th>Time - Patient</th>  
											<th>Action</th>
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
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="add_pre_checkup_modal"></div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="add_checkup_modal"></div>
  <style type="text/css">
  	td, th{
  		vertical-align: middle !important;
  	}
  </style>
@endsection

@section('scripts')  
	<script>
		 $(function(){
		    var table = $('#appointments-table').DataTable({
		      bProcessing: true,
		      bServerSide: false,
		      sServerMethod: "GET",
		      'ajax': '/admin/get-appointments-today',
		      searching: false, 
		      paging: false, 
		      filtering:false, 
		      bInfo: false,
		      responsive: true,
  				"pageLength": 50,
		      language:{
		        "paginate": {
		          "next":       "<i class='fa fa-chevron-right'></i>",
		          "previous":   "<i class='fa fa-chevron-left'></i>"
		        }
		      },
		      "columns": [  
		        {data: 'patient',  name: 'patient', className: 'col-md-7 text-left',  searchable: true, sortable: true},   
		        {data: 'actions',   name: 'actions', className: 'col-md-4 text-center p-0',  searchable: false,  sortable: false},
		      ], 
		      'order': [[0, 'asc']]
		    });

		    $(document).off('click','.precheckup-data-btn').on('click','.precheckup-data-btn', function(x){ 
		          x.preventDefault();
		          var that = this;
		          $("#add_pre_checkup_modal").html('');
		          $.ajax({
		            url: '/admin/precheckup/'+that.dataset.id,         
		            success: function(data) {
		            	if(!data.success){
				              swal({
				                  title: data.msg,
				                  icon: "info"
				                });
		            	}else{
		          			$("#add_pre_checkup_modal").modal();
		              		$("#add_pre_checkup_modal").html(data);		            		
		            	}
		            }
		          }); 
		    });

		    $(document).off('click','.checkup-data-btn').on('click','.checkup-data-btn', function(x){ 
		          x.preventDefault();
		          var that = this;
		          $("#add_checkup_modal").html('');
		          $("#add_checkup_modal").modal();
		          $.ajax({
		            url: '/admin/checkup/'+that.dataset.id,         
		            success: function(data) {
		              $("#add_checkup_modal").html(data);
		            }
		          }); 
		    });

		  });

		
	</script>
@endsection