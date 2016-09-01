@extends('admin.layout.default')

@section('title')
{{ $title='Danh sách lương nhân viên đề xuất cần duyệt' }}
@stop
@section('content')
@include('admin.salary.approve_salary_manager.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a onclick="ApproveSelected();" class="btn btn-success">Duyệt lương</a>
		<a onclick="RejectSelected();" class="btn btn-danger">Từ chối</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách lương nhân viên đề xuất cần duyệt</h3>
			</div>
			<div class="box-header">
				<table class="table table-hover">
					<tr>
						<td>Tổng lương cả công ty:</td>
						<th>{{ number_format(SalaryUser::where('status', SALARY_APPROVE)->sum('salary')) }} /VNĐ</th>
					</tr>
					<tr>
						<td>Tổng lương hiện tại: </td>
						<th>{{ number_format($data->sum('salary_old'))}} /VNĐ</th>
						<td>Tổng lương đề xuất: </td>
						<th>{{ number_format($data->sum('salary_new')) }} /VNĐ</th>
						<td>Độ chênh: </td>
						<th>{{ number_format($data->sum('salary_new') -  $data->sum('salary_old')) }} /VNĐ</th>
					</tr>
				</table>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>
						<input type="checkbox" id="checkall" name="checkall" onClick="toggle(this)" />
						</th>
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
						<td>
						<input type="checkbox" class="salary_id" name="salary_id[]" value="{{ $value->id }}"/></td>
						<td>{{ $value->id }}</td>
						<td>{{ SalaryHistoryUser::getName($value, 'username') }} </td>
						<td>{{ $value->salary_old }}</td> 
						<td>{{ $value->salary_new }}</td> 
						<td>{{ $value->start_date }}</td>
						<td>{{ CommonSalary::getUpAndDown($value) }}</td>
						<td>{{ $value->percent }}</td>
						<td>{{ getStatusHistory($value) }}</td>
						<td>
							<a href="{{ action('SalaryApproveController@edit', $value->id) }}" class="btn btn-primary">edit</a>
							<a href="{{ action('SalaryApproveController@approveSalary', $value->id) }}" class="btn btn-primary">Duyệt lương</a>
							<a href="{{ action('SalaryApproveController@rejectSalary', $value->id) }}" class="btn btn-danger">Từ chối</a>
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
@include('admin.salary.approve_salary_manager.script')

@stop

