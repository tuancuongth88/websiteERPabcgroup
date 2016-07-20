@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới tên miền' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('DomainResourceController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => 'DomainResourceController@store', 'files'=> true)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username">Tên miền</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Tên thiết bị" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Tài khoản</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" name="username">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Mật khẩu</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="password" placeholder="Mật khẩu" name="password">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Địa chỉ Web</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="url_login" placeholder="Địa chỉ Web" name="url_login">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày bắt đầu</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="datepickerStartdate" placeholder="Ngày bắt đầu" name="start_date">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày hết hạn</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="datepickerEnddate" placeholder="Ngày hết hạn" name="end_date">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Bên cung cấp</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" placeholder="bên cung cấp" name="provider">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Thông tin liên hệ</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" placeholder="Thông tin liên hệ" name="provider_contact">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tình trạng</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('status', CommonOption::getStatusResource(), null, array('class' => 'form-control')) }}
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
