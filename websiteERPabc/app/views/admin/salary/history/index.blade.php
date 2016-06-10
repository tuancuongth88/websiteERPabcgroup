@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý lương nhân viên' }}
@stop
@section('content')
@include('admin.salary.search')
<!-- <div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('SalaryUserController@create') }}" class="btn btn-primary">Đề xuất lương nhân viên mới</a>
	</div>

</div> -->
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
						<th>Tên nhân viên</th>
						<th>Mức lương</th>
						<th>Action</th>
						<!-- <th>Action</th>  -->
					</tr>
					@foreach($data as $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ CommonSalary::getNameUser($value->user_id) }}</td> 
						<td>{{ $value->salary }} </td>
						<td>
							<a href="{{ action('SalaryHistoryUserController@show', $value->id) }}" class="btn btn-primary">View</a>
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

