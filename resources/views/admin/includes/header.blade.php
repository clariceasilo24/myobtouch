	<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" style="padding-bottom: 0px; padding-top: 10px;">
				<a href="{{ url('admin/home') }}">
					<img src="{{ asset('img/adlogo.png') }}" alt="Logo" class="img-responsive logo">
				</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div> 
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">  
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset('img/ico.png') }}" class="img-circle" alt="Avatar"> <span>{{ ucfirst(Auth::user()->username) }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li> 
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Change Password</span></a></li>
								<li>
									<a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="lnr lnr-exit"></i> <span>Sign out</span></a> 
					                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					                      {{ csrf_field() }}
					                  </form>
								</li>
							</ul>
						</li> 
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->