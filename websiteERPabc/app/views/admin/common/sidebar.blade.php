<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="header">Menu</li>
			<li><a href="{{ action('DashboardController@index') }}"><i class="fa fa-dashboard"></i> <span>Bảng tin</span></a></li>

			<li class="treeview">
				<a href="#"><i class="fa fa-users"></i> <span>Nhân viên</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					@if(User::editFunctionUserAd())
						<li><a href="{{ action('ManagementController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý nhân viên</span></a></li>
					@else
						<li><a href="{{ action('ManagementController@index') }}"><i class="fa fa-circle-o"></i> <span>Danh sách nhân viên</span></a></li>
					@endif
					@if(User::isAdmin() == ROLE_ADMIN)
						<li><a href="{{ action('UserTypeController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý thể loại nhân viên</span></a></li>
					@endif
				</ul>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-list"></i> <span>Quản lý Luơng nhân viên</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					@if(Common::checkPermissionUser(FUNCTION_SALARY, Config::get('button.manage_salary_propose')))
						<li><a href="{{ action('SalaryUserController@index') }}"><i class="fa fa-circle-o"></i> <span>Đề xuất lương nhân viên mới</span></a></li>
						<li><a href="{{ action('SalaryUserController@indexOld') }}"><i class="fa fa-circle-o"></i> <span>Đề xuất lương nhân viên cũ</span></a></li>
						<li><a href="{{ action('SalaryBeforeController@index') }}"><i class="fa fa-circle-o"></i> <span>Đề xuất lương theo thời gian</span></a></li>
						<li><a href="{{ action('ProposeSalaryListController@index') }}"><i class="fa fa-circle-o"></i> <span>Đề xuất lương công ty</span></a></li>
						<li><a href="{{ action('SalaryHistoryUserController@index') }}"><i class="fa fa-circle-o"></i> <span>Tra cứu lương nhân viên</span></a></li>
					@endif
					@if(Common::checkPermissionUser(FUNCTION_SALARY, Config::get('button.manage_salary_approve')))
						<li class="treeview">
							<a href="#"><i class="fa fa-circle-o"></i> <span>Quản lý phê duyệt lương</span> <i class="fa fa-angle-left pull-right"></i></a>
							<ul class="treeview-menu">
								<li><a href="{{ action('SalaryApproveController@index') }}"><i class="glyphicon glyphicon-arrow-right"></i> <span>lương nhân viên</span></a></li>
								<li><a href="{{ action('SalaryApproveController@indexDepReg') }}"><i class="glyphicon glyphicon-arrow-right"></i> <span>lương Phòng ban chức vụ</span></a></li>
							</ul>
						</li>
					@endif
				</ul>
			</li>
			@if(User::isAdmin() == ROLE_ADMIN)
				<li><a href="{{ action('DeparmentController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý phòng ban</span></a></li>
				<li><a href="{{ action('RegencyController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý chức vụ</span></a></li>
			@endif
			<li class="treeview">
				<a href="#"><i class="fa fa-list"></i> <span>Báo cáo / Thông báo</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ action('ReportController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý báo cáo</span></a></li>
					<li><a href="{{ action('NotificationController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý thông báo</span></a></li>
					@if(User::isAdmin() == ROLE_ADMIN)
						<li><a href="{{ action('TypeReportController@index') }}"><i class="fa fa-circle-o"></i> <span>Thể loại báo cáo</span></a></li>
						<li><a href="{{ action('TypeNotificationController@index') }}"><i class="fa fa-circle-o"></i> <span>Thể loại thông báo</span></a></li>
					@endif
				</ul>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-list"></i> <span>Quản lý công việc</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="{{ action('TaskController@index') }}"><i class="fa fa-circle-o"></i> <span>Tất cả</span></a></li>
					@foreach(TaskStatus::lists('name', 'id') as $key => $value)
					<li><a href="{{ action('TaskController@filter', $key) }}"><i class="fa fa-circle-o"></i> <span>{{ $value }}</span></a></li>
					@endforeach
					<li><a href="{{ action('TaskStatusController@index') }}"><i class="fa fa-circle-o"></i> <span>Quản lý trạng thái công việc</span></a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#"><i class="fa fa-list"></i> <span>Quản lý công văn/hợp đồng</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					@if(Common::checkPermissionUser(FUNCTION_ARCHIVE, Config::get('button.manager_archive')))
						<li><a href="{{ action('ArchiveController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý công văn giấy tờ</span></a></li>
					@endif
					@if(Common::checkPermissionUser(FUNCTION_CONTRACT, Config::get('button.manager_contract')))
						<li><a href="{{ action('ContractController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý hợp đồng</span></a></li>
					@endif
					<li><a href="{{ action('PartnerController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý đối tác</span></a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-list"></i><span>Quản lý tài nguyên</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					@if(Common::checkPermissionUser(FUNCTION_OFFICE, Config::get('button.manager_office')))
						<li><a href="{{ action('ResourceManagementController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý Thiết bị</span></a></li>
					@endif
					@if(Common::checkPermissionUser(FUNCTION_COMPUTER, Config::get('button.manager_computer')))
						<li><a href="{{ action('ComputerResourceController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý máy tính</span></a></li>
					@endif
					<li><a href="{{ action('DocumentResourceController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý tài liệu</span></a></li>
					@if(Common::checkPermissionUser(FUNCTION_DOMAIN, Config::get('button.manager_domain')))
						<li><a href="{{ action('DomainResourceController@index') }}"><i class="fa fa-laptop"></i> <span>Quản lý Tên miền</span></a></li>
					@endif
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>