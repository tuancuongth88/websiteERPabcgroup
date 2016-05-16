@extends('admin.layout.default')

@section('title')
{{ $title='Bảng tin' }}
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Bảng tin</h3>
			</div>

			@if(count($taskAssign) > 0)
			<div class="box-body table-responsive">
				<h4>Công việc chờ đồng ý tham gia</h4>
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
						<th>Tên công việc</th>
						<th>Tiến độ (%)</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Người tạo</th>
						<th>Dự án</th>
						<th>Action</th>
					</tr>
					@foreach($task as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
							<td>{{ $value->name }}</td>
							<td>{{ $value->percent }}</td>
							<td>{{ Common::getDateTimeString($value->start) }}</td>
							<td>{{ Common::getDateTimeString($value->end) }}</td>
							<td>{{ CommonUser::getUsernameById($value->user_id) }}</td>
							<td>{{ CommonOption::getFieldTextByModel('Project', $value->project_id, 'name') }}</td>
							<td>
								<a href="{{ action('TaskController@show', $value->id) }}" class="btn btn-primary">View</a>
								<a href="{{ action('TaskController@accept', $value->id) }}" class="btn btn-success">Đồng ý</a>
								<a href="{{ action('TaskController@refuse', $value->id) }}" class="btn btn-danger">Từ chối</a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			<hr />
			@endif

			@if(count($projectAssign) > 0)
			<div class="box-body">
				
			</div>
			<hr />
			@endif

			@if(count($task) > 0)
			<div class="box-body table-responsive">
				<h4>Công việc đang làm</h4>
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
						<th>Tên công việc</th>
						<th>Tiến độ (%)</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Người tạo</th>
						<th>Dự án</th>
					</tr>
					@foreach($task as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
							<td>{{ $value->name }}</td>
							<td>{{ $value->percent }}</td>
							<td>{{ Common::getDateTimeString($value->start) }}</td>
							<td>{{ Common::getDateTimeString($value->end) }}</td>
							<td>{{ CommonUser::getUsernameById($value->user_id) }}</td>
							<td>{{ CommonOption::getFieldTextByModel('Project', $value->project_id, 'name') }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			@endif

		</div>
		<!-- /.box -->
	</div>
</div>
@stop

