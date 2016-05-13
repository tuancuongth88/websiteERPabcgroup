<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>

			@if(Admin::isAdmin())
				<li><a href="{{ action('ManagementController@index') }}"><i class="fa fa-user"></i> <span>Quản lý Users</span></a></li>
			@endif
			@if(!Admin::isAdmin())
				<li><a href="{{ action('ManagementController@index') }}"><i class="fa fa-user"></i> <span>Danh sach nhân viên</span></a></li>
			@endif

			<li><a href="{{ action('DeparmentController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý phòng ban</span></a></li>
			<li><a href="{{ action('RegencyController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý chức vụ</span></a></li>
			<li><a href="{{ action('ResouceController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý tài nguyên</span></a></li>
			<li><a href="{{ action('TaskController@index') }}"><i class="fa fa-list"></i> <span>Quản lý công việc</span></a></li>
			<li class="treeview">
				<a href="#"><i class="fa fa-laptop"></i> <span>Quản lý dự án</span></a>
				<ul class="treeview-menu">
					<li><a href="{{ action('ProjectController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý dự án</span></a></li>
					<li><a href="{{ action('TempRoleController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý vai trò dự án</span></a></li>
					<li><a href="{{ action('ProjectStatusController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý trạng thái dự án</span></a></li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>