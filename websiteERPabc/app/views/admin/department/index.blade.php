@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý phòng ban' }}
@stop

@section('content')
@include('admin.department.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('DeparmentController@create') }}" class="btn btn-primary">Thêm phòng</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách phòng</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên phòng</th>
						<th>Parent</th>
						<th>Số người</th>
						<th>Action</th> 
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td> 
						<td>{{ CommonOption::getNameOption('Department', $value) }}</td>
						<td>{{ CommonCount::count('DepRegencyPerUser', $value->id, 'dep_id') }}</td>
						<td>
							<a href="{{ action('DeparmentController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('DeparmentController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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

