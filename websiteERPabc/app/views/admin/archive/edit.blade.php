@extends('admin.layout.default')
@section('title')
{{ $title='Sửa công văn giấy tờ' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ArchiveController@index') }}" class="btn btn-success">Danh sách</a>
		@if(Common::checkPermissionUser(FUNCTION_ARCHIVE, Config::get('button.archive_add')))
			<a href="{{ action('ArchiveController@create') }}" class="btn btn-primary">Thêm mới</a>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => array('ArchiveController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên công văn/giấy tờ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', $data->name, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Số công văn/giấy tờ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('code', $data->code, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Loại công văn/giấy tờ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('type', CommonOption::getArchiveType(), $data->type, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày nhận</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_receive', $data->date_receive, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày gửi</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_send', $data->date_send, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày ban hành</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_promulgate', $data->date_promulgate, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày hiệu lực</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_active', $data->date_active, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<div class="row">
							<div class="col-sm-8">
								{{ Form::textarea('description', $data->description, array('class' => 'form-control', 'rows' => 5, 'id' => 'editor1')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>File đính kèm</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('file') }}
							</div>
						</div>
					</div>
					@if($data->file)
						<div class="form-group">
							<div class="row">
							<div class="col-sm-6">
								<a href="{{ url(ARCHIVE_FILE_UPLOAD . '/' . $data->id . '/' .$data->file)}}">Xem file đính kèm</a>
							</div>
							</div>
						</div>
					@endif
					<div class="form-group">
						<label>Đối tác</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('partner_id', CommonProject::getModelArray('partner', 'name', 'id'), $data->partner_id, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('status', CommonOption::getArchiveStatusHandling(), $data->status, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Thành viên</label>
						<div class="row">
							<div class="col-sm-12">
								<table class="assign" cellpadding="5px">
									<thead>
										<tr>
											<th>Thành viên</th>
											<th>Chức năng</th>
										</tr>
									</thead>
									<tbody id="assignBox">
										@include('admin.archive.editAssignBox', array('archiveUser' => $archiveUser))
									</tbody>
								</table>
								<a onclick="assignArchiveUser()" class="assignBtn">Thêm thành viên</a>
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
@include('admin.archive.script')
@stop
