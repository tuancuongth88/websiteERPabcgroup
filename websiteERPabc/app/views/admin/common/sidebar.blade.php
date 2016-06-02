<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>

			<li><a href="{{ action('DashboardController@index') }}"><i class="fa fa-dashboard"></i> <span>Bảng tin</span></a></li>
			@if(User::editFunctionUserAd())
				<li><a href="{{ action('ManagementController@index') }}"><i class="fa fa-user"></i> <span>Quản lý nhân viên</span></a></li>
			@else
				<li><a href="{{ action('ManagementController@index') }}"><i class="fa fa-user"></i> <span>Danh sách nhân viên</span></a></li>
			@endif
			<li><a href="{{ action('ReportController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý báo cáo</span></a></li>
			<li><a href="{{ action('NotificationController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý thông báo</span></a></li>

			@if(User::isAdmin() == ROLE_ADMIN)
				<li><a href="{{ action('TypeReportController@index') }}"><i class="fa fa-laptop"></i> <span>Thể loại báo cáo</span></a></li>
				<li><a href="{{ action('TypeNotificationController@index') }}"><i class="fa fa-laptop"></i> <span>Thể loại thông báo</span></a></li>
				<li><a href="{{ action('TypeNotificationController@index') }}"><i class="fa fa-laptop"></i> <span>Thể loại công việc</span></a></li>
				<li><a href="{{ action('DeparmentController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý phòng ban</span></a></li>
				<li><a href="{{ action('RegencyController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý chức vụ</span></a></li>
			@endif
			<li class="treeview">
				<a href="#"><i class="fa fa-list"></i> <span>Quản lý công việc</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ action('TaskController@index') }}"><i class="fa fa-circle-o"></i> <span>Tất cả</span></a></li>
					<li><a href="{{ action('TaskController@filter', TASK_STATUS_1) }}"><i class="fa fa-circle-o"></i> <span>Đang làm</span></a></li>
					<li><a href="{{ action('TaskController@filter', TASK_STATUS_3) }}"><i class="fa fa-circle-o"></i> <span>Tạm dừng</span></a></li>
					<li><a href="{{ action('TaskController@filter', TASK_STATUS_2) }}"><i class="fa fa-circle-o"></i> <span>Đã hoàn thành</span></a></li>
					<li><a href="{{ action('TaskStatusController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý trạng thái công việc</span></a></li>
				</ul>
			</li>
			@if(User::isAdmin() == ROLE_ADMIN || Common::checkPermissionUser(FUNCTION_PROJECT, Config::get('button.manager_project')))
				<li class="treeview">
					<a href="#"><i class="fa fa-laptop"></i> <span>Quản lý dự án</span> <i class="fa fa-angle-left pull-right"></i></a>
					<ul class="treeview-menu">
						<li><a href="{{ action('ProjectController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý dự án</span></a></li>
						<li><a href="{{ action('TempRoleController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý vai trò dự án</span></a></li>
						<li><a href="{{ action('ProjectStatusController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý trạng thái dự án</span></a></li>
					</ul>
				</li>
			@endif
			@if(User::isAdmin() == ROLE_ADMIN)
				<li><a href="{{ action('UserTypeController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý thể loại nhân viên</span></a></li>
			@endif
			@if(User::isAdmin() == ROLE_ADMIN || Common::checkPermissionUser(FUNCTION_USER, Config::get('button.manager_salary')))
				<li><a href="{{ action('SalaryUserController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý lương nhân viên</span></a></li>
			@endif
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>