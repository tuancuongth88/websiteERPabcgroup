@extends('admin.layout.default')
@section('title')
{{ $title='Sửa công việc' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('TaskController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => array('TaskController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên công việc</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', $data->name, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày bắt đầu</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('start', $data->start, array('class' => 'form-control', 'id' => 'start_date')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày kết thúc</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('end', $data->end, array('class' => 'form-control', 'id' => 'end_date')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Dự án</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('project_id', [NULL => 'Không chọn'] + CommonProject::getModelArray('Project', 'name', 'id'), $data->project_id, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mức độ hoàn thành (%)</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('percent', $data->percent, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::textarea('description', $data->description, array('class' => 'form-control', 'rows' => 5)) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('status', CommonOption::getStatusTaskArray(), $data->status, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Thành viên tham gia</label>
						<div class="row">
							<div class="col-sm-12">
								<table class="assign" cellpadding="5px">
									<thead>
										<tr>
											<th>Thành viên</th>
											<th>Quyền hạn</th>
										</tr>
									</thead>
									<tbody id="assignBox">
										@include('admin.task.editAssignBox', array('taskUser' => $taskUser))
									</tbody>
								</table>
								<a onclick="assignTaskUser()" class="assignBtn">Thêm thành viên</a>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@include('admin.task.script')
@stop
