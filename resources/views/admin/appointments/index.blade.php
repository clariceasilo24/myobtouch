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
								Appointments
								<div class="add-data-btn btn-xs btn btn-success pull-right " style="margin-bottom: 15px;"><i class="fa fa-plus"></i> Add Appointments</div>
							</h3>
						</div>
						<div class="panel-body"> 
							<div class="row">
								<div class="col-md-12">
								
									<table class="table table-bordered table-hover" id="appointments-table">
										<thead>
											<th>#</th>
											<th>Paitent</th>
											<th>Date</th>
											<th>Time</th>
											<th>Scheduled By</th>
											<th>Status</th>
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
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="addmodal"></div>
  <div class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;" id="editmodal"></div>
@endsection

@section('scripts')
	<script>
		 $(function(){
		    var table = $('#appointments-table').DataTable({
		      bProcessing: true,
		      bServerSide: false,
		      sServerMethod: "GET",
		      'ajax': '/admin/get-appointments',
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
		        {data: 'patient',  name: 'patient', className: 'col-md-2 text-left',  searchable: true, sortable: true},  
		        {data: 'date_time',  name: 'date_time', className: 'col-md-3 text-left',  searchable: true, sortable: true},  
		        {data: 'timeslot',  name: 'timeslot', className: 'col-md-3 text-left',  searchable: true, sortable: true},  
		        {data: 'scheduled_by',  name: 'scheduled_by', className: 'col-md-3 text-left',  searchable: true, sortable: true},  
		        {data: 'status',  name: 'status', className: 'col-md-3 text-left',  searchable: true, sortable: true},  
		        {data: 'actions',   name: 'actions', className: 'col-md-2 text-left',  searchable: false,  sortable: false},
		      ], 
		      'order': [[0, 'asc']]
		    });

		    $(".add-data-btn").click(function(x){   
		          x.preventDefault();
		          var that = this;
		          $("#addmodal").html('');
		          $("#addmodal").modal();
		          $.ajax({
		            url: '/admin/appointments/create',         
		            success: function(data) {
		              $("#addmodal").html(data);
		            }
		          }); 
		    });
		    $(document).off('click','.edit-data-btn').on('click','.edit-data-btn', function(e){
		      e.preventDefault();
		      var that = this; 
		      $("#editmodal").html('');
		      $("#editmodal").modal('show');
		      $.ajax({
		        url: '/admin/appointments/'+that.dataset.id+'/edit',         
		        success: function(data) {
		          $("#editmodal").html(data);
		        }
		      }); 
		    });
		    $(document).off('click','.delete-data-btn').on('click','.delete-data-btn', function(e){
		      e.preventDefault();
		      var that = this; 
		            bootbox.confirm({
		              title: "Confirm Delete Data?",
		              className: "del-bootbox",
		              message: "Are you sure you want to delete record?",
		              buttons: {
		                  confirm: {
		                      label: 'Yes',
		                      className: 'btn-success'
		                  },
		                  cancel: {
		                      label: 'No',
		                      className: 'btn-danger'
		                  }
		              },
		              callback: function (result) {
		                 if(result){
		                  var token = '{{csrf_token()}}'; 
		                  $.ajax({
		                  url:'/admin/appointments/'+that.dataset.id,
		                  type: 'post',
		                  data: {_method: 'delete', _token :token},
		                  success:function(result){
		                    $("#appointments-table").DataTable().ajax.url( '/admin/get-appointments' ).load();
		                    swal({
		                        title: result.msg,
		                        icon: "success"
		                      });
		                  }
		                  }); 
		                 }
		              }
		          });
		    });
		  });
	</script>
@endsection