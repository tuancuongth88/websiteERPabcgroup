@extends('admin.layout.default')
@section('title')
{{ $title='Sửa công việc' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ReportController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group">
					<label>Tên báo cáo</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $report->name }}
						</div>
					</div>
				</div>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label>Nội dung</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $report->description }}
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<a href="{{ action('ReportController@index') }}" class="btn btn-primary">Quay lại</a>
			</div>
			@include('admin.comment.index', array('modelName' => 'Task', 'modelId' => $report->id))

		</div>
	</div>
</div>
@include('admin.task.script')
@stop
