
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="{{ url('admin/home') }}" class="{{ Request::segment(2) == 'home' ? 'active':'' }}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="{{ url('admin/patients') }}" class="{{ Request::segment(2) == 'patients' ? 'active':'' }}"><i class="fa fa-user-md"></i> <span>Patients</span></a></li>
						<li><a href="{{ url('admin/services') }}" class="{{ Request::segment(2) == 'services' ? 'active':'' }}"><i class="fa fa-cogs"></i> <span>Services</span></a></li>
						<li><a href="{{ url('admin/cases') }}" class="{{ Request::segment(2) == 'cases' ? 'active':'' }}"><i class="fa fa-table"></i> <span>Cases</span></a></li>
						<li class="hidden"><a href="{{ url('admin/time-slots') }}" class="{{ Request::segment(2) == 'time-slots' ? 'active':'' }}"><i class="fa fa-clock-o"></i> <span>Time Slots</span></a></li>
						<li><a href="{{ url('admin/appointments') }}" class="{{ Request::segment(2) == 'appointments' ? 'active':'' }}"><i class="fa fa-calendar"></i> <span>Appointments</span></a></li>
						<li><a href="{{ url('admin/check-up') }}" class="{{ Request::segment(2) == 'check-up' ? 'active':'' }}"><i class="fa fa-check"></i> <span>Check Ups</span></a></li>
						<li><a href="{{ url('admin/users') }}" class="{{ Request::segment(2) == 'users' ? 'active':'' }}"><i class="lnr lnr-users"></i> <span>Users</span></a></li>
						<li><a href="{{ url('admin/cases-reports') }}" class="{{ Request::segment(2) == 'cases-reports' ? 'active':'' }}"><i class="fa fa-list-alt"></i> <span>Cases Reports</span></a></li>
						<li><a href="{{ url('admin/appointment-reports') }}" class="{{ Request::segment(2) == 'appointment-reports' ? 'active':'' }}"><i class="fa fa-list-alt"></i> <span>Appointment Reports</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->