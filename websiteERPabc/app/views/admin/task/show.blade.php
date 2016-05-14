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
			<div class="box-body">
				<div class="form-group">
					<label>Tên task</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $task->name }}
						</div>
					</div>
				</div>
			</div>
			 {{ Form::open(array('action' => ['TaskController@comment', $task->id], 'method' => 'POST')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Chi tiết</label>
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
