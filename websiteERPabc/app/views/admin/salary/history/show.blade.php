@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý lương nhân viên' }}
@stop
@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('SalaryHistoryUserController@index') }}" class="btn btn-primary">Danh sách lịch sử lương nhân viên</a>
	</div>

</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">
					<b>Tên nhân viên: </b> {{ $userdata->username }} &nbsp&nbsp&nbsp
					<b>Chức vụ: </b> {{ CommonSalary::getNameRegency($salary->regency_id) }}&nbsp&nbsp&nbsp
					<b>Phòng ban: </b> {{ CommonSalary::getNameDep($salary->dep_id) }}
				</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>Ngày làm</th>
						<th>Ngày đề xuất</th>
						<th>Lý do</th>
						<th>Lương cũ</th>
						<th>Lương mới</th>
						<th>Tăng hoặc giảm</th>
						<th>Phần trăm</th>
						<th>Trạng thái</th>
						<!-- <th>Action</th>  -->
					</tr>
					@foreach($data as $value)
					<tr>
						<td>{{ $value->created_at }}</td>
						<td>{{ $value->start_date }}</td>
						<td>{{ $value->note_user_update }}</td> 
						<td>{{ $value->salary_old }} </td>
						<td> @if($value->salary_edit)
									{{$value->salary_edit}}
								@else 
									{{$value->salary_new }}
								@endif </td>
						<td>{{ CommonSalary::getUpAndDown($value) }}</td>
						<td> @if($value->percent_edit)
									{{ $value->percent_edit }}
								@else 
									{{$value->percent }}
								@endif </td>
						<td>{{ getStatusHistory($value) }}</td>
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

