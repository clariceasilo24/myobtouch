@extends('admin.includes.app')

@section('content')

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid col-md-4 col-sm-6 col-xs-12">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-user"></i> My Profile
							</h3>
						</div>
						<div class="panel-body"> 
							<div class="row"> 
								<div class="col-md-12">
									<div class="box-body box-profile"> 

						              <h3 class="profile-username text-center">{{ Auth::user()->username }}</h3>

						              <p class="text-muted text-center">{{ Auth::user()->account_type == 'admin' ? 'Administrator': ucfirst(Auth::user()->account_type) }}</p>

    								{!! Form::open(array('url' => url('/admin/change-password'), 'method' => 'POST', 'id' => 'change-password-form')) !!}
						              <ul class="list-group list-group-unbordered">
						                <li class="list-group-item">
						                	<b>Change Password</b>
						                </li>
						                <li class="list-group-item py-5">
									      <div class="form-group">
									          <label for="old_password">Old Password</label>
									          <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" autocomplete="false">
									          <span class="help-text text-danger"></span>
									      </div> 
									      <div class="form-group">
									          <label for="new_password">New Password</label>
									          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" autocomplete="false">
									          <span class="help-text text-danger"></span>
									      </div> 
									      <div class="form-group">
									          <label for="confirm_password">Confirm Password</label>
									          <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" autocomplete="false">
									          <span class="help-text text-danger"></span>
									      </div>
						                </li>
						              </ul>
 
							        {!! Form::submit('Change Password', ['class' => 'btn btn-primary btn-block']) !!}
						            </div> 
							      {!! Form::close() !!}
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
		      $("#change-password-form").on('submit', function(e){
		        e.preventDefault(); //keeps the form from behaving like a normal (non-ajax) html form
		        var $form = $(this);
		        var $url = $form.attr('action');
		        var formData = {}; 
		        
		        $.ajax({
		          type: 'POST',
		          url: $url,
		          data: $("#change-password-form").serialize(), 
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
		            window.location.reload()
		          },
		          error: function(xhr,status,error){
		            var response_object = JSON.parse(xhr.responseText); 
		            associate_errors(response_object.errors, $form);
		          }
		        });

		      });
		  });
	</script>
@endsection