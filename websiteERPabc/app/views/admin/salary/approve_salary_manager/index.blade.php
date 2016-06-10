@extends('admin.layout.default')

@section('title')
{{ $title='Danh sách lương nhân viên đề xuất cần duyệt' }}
@stop
@section('content')
@include('admin.salary.approve_salary_manager.search')

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách lương nhân viên đề xuất cần duyệt</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên nhân viên</th>
						<th>Mức lương hiện tại</th>
						<th>Mức lương đã đề xuất</th>
						<th>Ngày đề xuất</th>
						<th>Tăng/Giảm</th>
						<th>Phần trăm</th>
						<th>Trạng thái</th>
						<th>Action</th>
					</tr>
					@foreach($data as $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ SalaryHistoryUser::getName($value, 'username') }} </td>
						<td>{{ $value->salary_old }}</td> 
						<td>{{ $value->salary_new }}</td> 
						<td>{{ $value->start_date }}</td>
						<td>{{ $value->type_salary }}</td>
						<td>{{ $value->percent }}</td>
						<td>{{ getStatusHistory($value) }}</td>
						<td>
							<a href="{{ action('SalaryApproveController@edit', $value->id) }}" class="btn btn-primary">edit</a>
							<a href="{{ action('SalaryApproveController@approveSalary', $value->id) }}" class="btn btn-primary">Duyệt lương</a>
							<a href="{{ action('SalaryApproveController@edit', $value->id) }}" class="btn btn-danger">Từ chối</a>
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

