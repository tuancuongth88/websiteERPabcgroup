@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý thiết bị văn phòng' }}
@stop

@section('content')
@include('admin.resource.office.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('ResourceManagementController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách thiết bị văn phòng</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên thiết bị</th>	
						<th>Nhà cung cấp</th>
						<th>Tình trạng</th>
						<th>Số lượng</th>
						<th>Loại thiết bị</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->provider }}</td>
						<td>{{ CommonOption::getNameStatusResource($value->status) }}</td>
						<td>{{ $value->number }}</td>
						<td>{{ CommonResource::getTypeResource($value->type) }}</td>
						<td>
							<a href="{{ action('ResourceManagementController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('ResourceManagementController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
							<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
							{{ Form::close() }}
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

