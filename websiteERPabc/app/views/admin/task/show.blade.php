@extends('admin.layout.default')
@section('title')
{{ $title='Xem công việc' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('TaskController@index') }}" class="btn btn-success">Danh sách</a>
		<a href="{{ action('TaskController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-body">
				<table class="table">
					<tr>
						<td width="20%">
							<label>Tên task</label>
						</td>
						<td>
							{{ $task->name }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Ngày bắt đầu</label>
						</td>
						<td>
							{{ $task->start }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Ngày kết thúc</label>
						</td>
						<td>
							{{ $task->end }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Dự án</label>
						</td>
						<td>
							@if($task->project_id)
								{{ CommonOption::getFieldTextByModel('Project', $task->project_id, 'id') }}
							@else 
								Không thuộc dự án nào
							@endif
						</td>
					</tr>
					<tr>
						<td>
							<label>Mức độ hoàn thành (%)</label>
						</td>
						<td>
							@if($task->percent)
								{{ $task->percent }}
							@else
								0%
							@endif
						</td>
					</tr>
					<tr>
						<td>
							<label>Mô tả</label>
						</td>
						<td>
							{{ $task->description }}
						</td>
					</tr>
					<tr>
						<td>
							<label>File đính kèm</label>
						</td>
						<td>
							@if($task->file_attach)
								<a href="{{ url(TASK_FILE_UPLOAD . '/' . $task->id . '/' .$task->file_attach)}}">Xem file đính kèm - {{ $task->file_attach }}</a>
							@endif
						</td>
					</tr>
					<tr>
						<td>
							<label>Trạng thái</label>
						</td>
						<td>
							{{ CommonOption::getStatusTaskValue('TaskStatus', 'name', 'id', $task->task_status_id) }}
						</td>
					</tr>

				</table>
				
				<?php $taskUser = TaskUser::where('task_id', $task->id)->get(); ?>
				@if(count($taskUser) > 0)
				<div class="form-group">
					<h3>Thành viên tham gia</h3>
					<div class="row">
						<div class="col-sm-12">
							<table class="assign table" cellpadding="5px">
								<thead>
									<tr>
										<th width="20%">Thành viên</th>
										<th>Quyền hạn</th>
									</tr>
								</thead>
								<tbody id="assignBox">
								@foreach($taskUser as $value)
									<tr>
										<td>
											{{ CommonOption::getFieldTextByModel('User', $value->user_id, 'username') }}
										</td>
										<td>
											{{ CommonOption::getPermissionArray()[$value->per_id] }}
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				@endif

			</div>

			{{ Form::open(array('action' => ['TaskController@comment', $task->id], 'method' => 'POST')) }}
				<div class="box-body">
					<div class="form-group">
						<h3>Comment</h3>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::textarea('description', '', array('class' => 'form-control', 'rows' => 5)) }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<br />
								{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
							</div>
						</div>
					</div>
				</div>
			{{ Form::close() }}
				
			@include('admin.comment.index', array('modelName' => 'Task', 'modelId' => $task->id))

		</div>
	</div>
</div>
@include('admin.task.script')
@stop
