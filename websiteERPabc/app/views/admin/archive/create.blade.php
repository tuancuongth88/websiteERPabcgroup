@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới công văn giấy tờ' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ArchiveController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => 'ArchiveController@store', 'files' => true)) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên công văn/giấy tờ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Số công văn/giấy tờ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('code', null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Loại công văn/giấy tờ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('type', CommonOption::getArchiveType(), null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày nhận</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_receive', null, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày gửi</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_send', null, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày ban hành</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_promulgate', null, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Ngày hiệu lực</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('date_active', null, array('class' => 'form-control datepicker')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mô tả</label>
						<div class="row">
							<div class="col-sm-8">
								{{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => 5, 'id' => 'editor1')) }}
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
					<div class="form-group">
						<label>Đối tác</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('partner_id', CommonContract::getNamePartner(), null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Trạng thái</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('status', CommonOption::getArchiveStatusHandling(), null, array('class' => 'form-control')) }}
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
