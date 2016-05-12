<header class="main-header">
	<a href="#" class="logo">
		<span class="logo-mini">Online</span>
		<span class="logo-lg">Online</span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Menu</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="user">
				@if(Admin::isAdmin())
					<a href="#"><i class="fa fa-user">{{ Auth::admin()->get()->username }}</i></a>
				@else
					<a href="#"><i class="fa fa-user">{{ Auth::user()->get()->username }}</i></a>
				@endif
				</li>
				<li class="user">
				@if(Admin::isAdmin())
					<a href="{{ action('ManagementController@edit', Auth::admin()->get()->id) }}"><i class="fa fa-user"></i>Tài khoản</a>
				@else
					<a href="{{ action('ManagementController@edit', Auth::user()->get()->id) }}"><i class="fa fa-user"></i>Tài khoản</a>
				@endif
				</li>
				<li class="user">
					<a href="{{ action('AdminController@logout') }}"><i class="fa fa-power-off"></i>Đăng xuất</a>
				</li>
			</ul>
		</div>
	</nav>
</header>