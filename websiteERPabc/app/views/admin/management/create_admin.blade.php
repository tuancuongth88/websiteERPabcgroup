@extends('admin.layout.default')
@section('title')
{{ $title='Thêm' }}
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
			{{ Form::open(array('action' => array('ManagementController@doCreateadmin'), 'method' => 'POST')) }}
				<div class="box-body">
					<div class="form-group">
						<label for="email">Tên đầy đủ</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::text('name', null, array('class' => 'form-control',  'placeholder'=> 'Tên đây đủ')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="username">Tài khoản</label>
								{{ Form::text('username', null, array('class'=> 'form-control', 'id'=> 'username', 'placeholder'=> 'Tên tài khoản'))}}
							</div>
							<div class="col-sm-3">
								<label for="password">Mật khẩu</label>
									{{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder'=> 'Mật khẩu')) }}
							</div>
						</div>
					</div>					
					<div class="form-group">
						<label for="email">Email</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::text('email', null, array('class' => 'form-control',  'placeholder'=> 'Email')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="phone">Số điện thoại</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::text('phone', null, array('class' => 'form-control',  'placeholder'=> 'Số điện thoại')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Tên skype</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::text('skyper', null, array('class' => 'form-control',  'placeholder'=> 'skyper')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary'))}}
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>
@include('admin.management.scriptmanager')
@stop

