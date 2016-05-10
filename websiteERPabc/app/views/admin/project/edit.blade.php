@extends('admin.layout.default')
@section('title')
{{ $title='Sửa dự án' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ProjectController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => array('ProjectController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên dự án</label>
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
								{{ Form::select('status', CommonProject::getModelArray('ProjectStatus', 'name', 'id'), $data->status, array('class' => 'form-control')) }}
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
											<th>Vai trò</th>
											<th>Quyền hạn</th>
										</tr>
									</thead>
									<tbody id="assignBox">
										
									</tbody>
								</table>
								<a onclick="assignProjectUser()" class="assignBtn">Thêm thành viên</a>
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
@include('admin.project.script')
@stop
