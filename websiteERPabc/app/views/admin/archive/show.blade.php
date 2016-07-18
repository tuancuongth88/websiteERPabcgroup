@extends('admin.layout.default')
@section('title')
{{ $title='Xem công việc' }}
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
			<div class="box-body">
				<div class="form-group">
					<label>Tên task</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $task->name }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Ngày bắt đầu</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $task->start }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Ngày kết thúc</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $task->end }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Dự án</label>
					<div class="row">
						<div class="col-sm-6">
							@if($task->project_id)
								{{ Project::find($task->project_id)->id }}
							@else 
								Không thuộc dự án nào
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Mức độ hoàn thành (%)</label>
					<div class="row">
						<div class="col-sm-6">
							@if($task->percent)
								{{ $task->percent }}
							@else
								0%
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Mô tả</label>
					<div class="row">
						<div class="col-sm-6">
						 {{ $task->description }}
						</div>
					</div>
				</div>
				@if($task->file_attach)
					<div class="form-group">
					<label>Xem file</label>
						<div class="row">
							<div class="col-sm-10">
								<a href="{{ url(TASK_FILE_UPLOAD . '/' . $task->id . '/' .$task->file_attach)}}">Xem file đính kèm</a>
							</div>
						</div>
					</div>
				@endif
				<div class="form-group">
					<label>Trạng thái</label>
					<div class="row">
						<div class="col-sm-6">
							{{ CommonOption::getStatusTaskValue('TaskStatus', 'name', 'id', $task->task_status_id) }}
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
								@foreach(TaskUser::where('task_id', $task->id)->get() as $value)
									<tr>
										<td>
											{{ User::find($value->user_id)->username }}
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
			</div>
			{{ Form::open(array('action' => ['TaskController@comment', $task->id], 'method' => 'POST')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Comment</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::textarea('description', '', array('class' => 'form-control', 'rows' => 5)) }}
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
				
			@include('admin.comment.index', array('modelName' => 'Task', 'modelId' => $task->id))

		</div>
	</div>
</div>
@include('admin.task.script')
@stop
