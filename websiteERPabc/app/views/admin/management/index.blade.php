@extends('admin.layout.default')
@section('title')
{{ $title='Quản lý User' }}
@stop

@section('content')
@include('admin.management.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
		@if(User::isAdmin() == ROLE_ADMIN || Common::checkPermissionUser(FUNCTION_USER, Config::get('button.add_user_manage')))
			<a href="{{ action('ManagementController@create') }}" class="btn btn-primary">Thêm tài khoản nhân viên</a>
		@endif
		@if(User::isAdmin() == ROLE_ADMIN)
			<a href="{{  action('ManagementController@createadmin') }}" class="btn btn-primary">Thêm tài khoản Admin</a>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách User</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
				<th>ID</th>
				<th>Tài khoản</th>
				<th>Số điện thoại</th>
				<th>Phòng ban liên quan</th>
				<th>Action</th>
			</tr>
			@foreach($data as $key => $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->username }}</td>
				<td>{{ $value->phone }}</td>
				<td>{{ CommonUser::getDepartmentUser($value->id) }}</td>
				<td >
				@if(!User::checkUserIsAdmin($value->id) || User::isAdmin() == ROLE_ADMIN)
					@if(User::checkUserIsAdmin($value->id))
						<a href="{{ action('ManagementController@updateadmin', $value->id) }}" class="btn btn-primary">Sửa</a>
					@else
						@if(User::isAdmin() == ROLE_ADMIN || Common::checkPermissionUser(FUNCTION_USER, Config::get('button.user_edit')) || User::isAdmin() == User::getCurrentUser($value->id))
							<a href="{{ action('ManagementController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
						@endif
					@endif
					@if(User::isAdmin() == ROLE_ADMIN || Common::checkPermissionUser(FUNCTION_USER, Config::get('button.user_delete')))
						{{ Form::open(array('method'=>'DELETE', 'action' => array('ManagementController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
						<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
						{{ Form::close() }}
					@endif
					@if(User::checkPermission($value->id) || User::isAdmin() == ROLE_ADMIN || Common::checkPermissionUser(FUNCTION_USER, Config::get('button.change_password')))
						<a href="{{ action('ManagementController@resPassword', $value->id) }}" class="btn btn-primary">Đổi mật khẩu</a>
					@endif
					@if(User::isAdmin() == ROLE_ADMIN || Common::checkPermissionUser(FUNCTION_USER, Config::get('button.manager_permission')))
						<a href="{{ action('ManagementController@changePermissionUser', $value->id) }}" class="btn btn-primary">Phân quyền</a>
					@endif
				@endif
				@if(User::checkUserIsAdmin($value->id))
					<a href="{{ action('ManagementController@showadmin', $value->id) }}" class="btn btn-primary">Xem</a>
				@else
					<a href="{{ action('ManagementController@show', $value->id) }}" class="btn btn-primary">Xem</a>
				@endif
			  </td>
			</tr>
			@endforeach
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		<!-- phan trang -->
		{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop

