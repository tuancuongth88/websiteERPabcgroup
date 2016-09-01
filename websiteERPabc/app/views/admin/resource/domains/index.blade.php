@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tên miền' }}
@stop

@section('content')
@include('admin.resource.domains.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
	@if(Common::checkPermissionUser(FUNCTION_DOMAIN, Config::get('button.domain_add')))
		<a href="{{ action('DomainResourceController@create') }}" class="btn btn-primary">Thêm mới</a>
	@endif
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách tên miền</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên miền</th>	
						<th>Tài khoản</th>	
						<th>Mật khẩu</th>	
						<th>Địa chỉ đăng nhập</th>	
						<th>ngày bắt đầu</th>	
						<th>ngày kết thúc</th>	
						<th>Nhà cung cấp</th>
						<th>Tình trạng</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->username }}</td>
						<td>{{ $value->password }}</td>
						<td><a href="{{ $value->url_login }}" >Đăng nhập</a></td>
						<td>{{ $value->start_date }}</td>
						<td>{{ $value->end_date }}</td>
						<td>{{ CommonContract::getNamePartnerId($value->provider) }}</td>
						<td>{{ CommonOption::getNameStatusResource($value->status) }}</td>
						<td>
							@if(Common::checkPermissionUser(FUNCTION_DOMAIN, Config::get('button.domain_edit')))
								<a href="{{ action('DomainResourceController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							@endif
							@if(Common::checkPermissionUser(FUNCTION_DOMAIN, Config::get('button.domain_delete')))
								{{ Form::open(array('method'=>'DELETE', 'action' => array('DomainResourceController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
								<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
								{{ Form::close() }}
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

