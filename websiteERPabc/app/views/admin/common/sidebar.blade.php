<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>
			<li><a href="{{ action('ManagementController@index') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
			<li><a href="{{ action('DeparmentController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý phòng ban</span></a></li>
			<li><a href="{{ action('RegencyController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý chức vụ</span></a></li>
			<li><a href="{{ action('ResouceController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý tài nguyên</span></a></li>
			<li><a href="{{ action('ProjectController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý công việc</span></a></li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>