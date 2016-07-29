@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới tài liệu' }}
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
				{{ Form::open(array('action' => 'DocumentResourceController@store', 'files'=> true)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username">Tên tài liệu</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Tên tài liệu" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Số</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="code" placeholder="Số" name="code">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Mô tả</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::textarea('description', null, array('class' => 'form-control')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày nhận</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" placeholder="Ngày nhận" name="date_receive">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày gửi</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" placeholder="Ngày gửi" name="date_send">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày ban hành</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" placeholder="Ngày ban hành" name="date_promulgate">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày hiệu lực</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control datepicker" placeholder="Ngày hiệu lực" name="date_active">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="username">File</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::file('file') }}
								</div>
							</div>
						</div>
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
