@extends('admin.layout.default')
@section('title')
{{ $title='Sửa tài liệu' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('DocumentResourceController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('DocumentResourceController@update', $data->id), 'method' => 'PUT', 'files' => true)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username">Tên tài liệu</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Số</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="code" value="{{ $data->code }}" name="code">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Mô tả</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" value="{{ $data->description }}" name="description">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày nhận</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" value="{{ $data->date_receive }}" name="date_receive">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày gửi</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" value="{{ $data->date_send }}" name="date_send">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày ban hành</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" value="{{ $data->date_promulgate }}" name="date_promulgate">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày hiệu lực</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" value="{{ $data->date_active }}" name="date_active">
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
									<a href="{{ url(DOCUMENT_FILE_UPLOAD . '/' . $data->id . '/' .$data->file)}}">Xem file đính kèm</a>
								</div>
								</div>
							</div>
						@endif
					</div>
				</div>
				<div class="box-footer">
					<input type="submit" class="btn btn-primary" value="Lưu lại" />
				</div>
				{{ Form::close() }}
			</div>
			<!-- /.box -->
	</div>
</div>

@stop
