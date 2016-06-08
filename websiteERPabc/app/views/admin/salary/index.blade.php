@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý lương nhân viên' }}
@stop
@section('content')
@include('admin.salary.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('SalaryUserController@create') }}" class="btn btn-primary">Đề xuất lương cá nhân</a>
	<a href="{{ action('SalaryUserController@createAll') }}" class="btn btn-primary">Đề xuất lương công ty</a>
	</div>

</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách lương nhân viên</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Mức lương</th>
						<th>Tên nhân viên</th>
						<th>Phòng ban</th>
						<!-- <th>Action</th>  -->
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->salary }}</td> 
						<td>{{ CommonUser::getUserNameSalary($value) }} </td>
						<td> {{ CommonUser::getDeparmentNameBySalary($value) }} </td>
						<!-- <td>
							<a href="{{ action('SalaryUserController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('SalaryUserController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
							<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
							{{ Form::close() }}
						</td> -->
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

