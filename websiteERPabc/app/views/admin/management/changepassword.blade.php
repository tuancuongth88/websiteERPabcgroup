@extends('admin.layout.default')
@section('title')
{{ $title='Sửa mật khẩu' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ManagementController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
				{{ Form::open(array('action' => array('ManagementController@updatePassword', $data->id), 'method' => 'POST')) }}
				<div class="box-body">

					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="username">Tài khoản</label>
								tunglaso1
								{{ Form::text('username', $data->username, array('class'=> 'form-control', 'id'=> 'username', 'placeholder'=> 'Tên tài khoản'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="password">Mật khẩu mới</label>
								{{ Form::password('password', array('class'=> 'form-control', 'id'=> 'password', 'placeholder'=> 'Mật khẩu mới'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="repassword">nhập lại mật khẩu</label>
								{{ Form::password('repassword', array('class'=> 'form-control', 'id'=> 'repassword', 'placeholder'=> 'Nhập lại mật khẩu'))}}
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary'))}}
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>
@stop
