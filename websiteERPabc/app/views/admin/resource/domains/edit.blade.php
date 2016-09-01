@extends('admin.layout.default')
@section('title')
{{ $title='Cập nhật tên miền' }}
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
				{{ Form::open(array('action' => array('DomainResourceController@update', $data->id), 'method' => 'PUT')) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username">Tên miền</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Tên thiết bị" value="{{$data->name }}" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Tài khoản</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="username" placeholder="Tên đăng nhập" value="{{$data->username }}" name="username">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Mật khẩu</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="password" placeholder="Mật khẩu" value="{{$data->password }}" name="password">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Địa chỉ Web</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="url_login" placeholder="Địa chỉ Web" value="{{$data->url_login }}" name="url_login">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày bắt đầu</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="datepickerStartdate" placeholder="Ngày bắt đầu" value="{{$data->start_date }}" name="start_date">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ngày hết hạn</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="datepickerEnddate" placeholder="Ngày hết hạn" value="{{$data->end_date }}" name="end_date">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Bên cung cấp</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('provider', CommonContract::getNamePartnerProvided(), $data->provider, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Tình trạng</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('status', CommonOption::getStatusResource(), $data->status, array('class' => 'form-control')) }}
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
