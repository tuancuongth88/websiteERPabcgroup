@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới thông báo' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NotificationController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => 'NotificationController@store', 'files' => true)) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên thông báo</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Thể loại</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('type_notification_id', TypeNotification::lists('name', 'id'), null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Nội dung</label>
						<div class="row">
							<div class="col-sm-10">
								{{ Form::textarea('description', null, array('class' => 'form-control', 'id' => 'editor1')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>File đính kèm</label>
						<div class="row">
							<div class="col-sm-10">
								{{ Form::file('link_url') }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Gửi đến</label>
						<div class="row">
							<div class="col-sm-6">
								<p>Tất cả
								{{ Form::checkbox('send_all') }}
								</p>
							</div>
						</div>
						<div class="form-group">
							<label>Gửi đến phòng ban</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('dep_id[]', Department::lists('name', 'id'), null, array('class' => 'form-control', 'multiple' => 'true')) }}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<table class="assign" cellpadding="5px">
									<thead>
										<tr>
											<th>Thành viên</th>
										</tr>
									</thead>
									<tbody id="assignBox">
									</tbody>
								</table>
								<a onclick="assignReportUser()" class="assignBtn">Thêm thành viên</a>
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
@include('admin.report.script')
@include('admin.common.ckeditor')
@stop
