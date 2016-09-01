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
			{{ Form::open(array('action' => array('TaskController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
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
								{{ Form::text('start', $data->start, array('class' => 'form-control', 'id' => 'datepickerStartdate')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày kết thúc</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('end', $data->end, array('class' => 'form-control', 'id' => 'datepickerEnddate')) }}
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
						<label>List công việc</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('parent_id', [NULL => 'Không chọn'] + Task::lists('name', 'id'), $data->parent_id, array('class' => 'form-control')) }}
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
								{{ Form::textarea('description', $data->description, array('class' => 'form-control','id' => 'editor1')) }}
							</div>
						</div>
					</div>

					<div class="form-group">
						<label>File đính kèm</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('file_attach') }}
							</div>
						</div>
					</div>
					@if($data->file_attach)
						<div class="form-group">
							<div class="row">
							<div class="col-sm-10">
								<a href="{{ url(TASK_FILE_UPLOAD . '/' . $data->id . '/' .$data->file_attach)}}">Xem file đính kèm</a>
							</div>
							</div>
						</div>
					@endif

					<div class="form-group">
						<label>Trạng thái</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('task_status_id', CommonOption::getStatusTaskArray('TaskStatus', 'name', 'id'), $data->task_status_id, array('class' => 'form-control')) }}
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
@include('admin.common.ckeditor')
@include('admin.task.script')
@stop
