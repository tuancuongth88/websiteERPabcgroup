@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý công việc' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('TaskController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>

@include('admin.task.search')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách công việc</h3>
				<span> (Tổng số: {{ count($data) }})</span>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
						<th>Tên công việc</th>
						<th>Tiến độ (%)</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Người tạo</th>
						<th>Dự án</th>
						<th>Trạng thái</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
							<td>{{ $value->name }}</td>
							<td>{{ $value->percent }}</td>
							<td>{{ Common::getDateTimeString($value->start) }}</td>
							<td>{{ Common::getDateTimeString($value->end) }}</td>
							<td>{{ CommonUser::getUsernameById($value->user_id) }}</td>
							<td>{{ CommonOption::getFieldTextByModel('Project', $value->project_id, 'name') }}</td>
							<td>{{ CommonOption::getStatusTaskValue($value->status) }}</td>
							<td>
								<a href="{{ action('TaskController@show', $value->id) }}" class="btn btn-primary">View</a>
								@if(Common::checkModelUserStatus('TaskUser', $value->id, 'task_id') == ASSIGN_STATUS_1 && Common::checkModelUserFunction('TaskUser', $value->id, 'task_id'))
									<a href="{{ action('TaskController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
									{{ Form::open(array('method'=>'DELETE', 'action' => array('TaskController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
										<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
									{{ Form::close() }}
								@elseif(Common::checkModelUserStatus('TaskUser', $value->id, 'task_id') == ASSIGN_STATUS_3)
									<a href="{{ action('TaskController@accept', $value->id) }}" class="btn btn-success">Đồng ý</a>
									<a href="{{ action('TaskController@refuse', $value->id) }}" class="btn btn-danger">Từ chối</a>
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

