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
				<div class="box-body">
					<div class="form-group">
						<label for="email">Tên đầy đủ</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::label('', $data->name, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="username">Tài khoản</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::label('', $data->username, array('class'=> 'form-control'))}}
							</div>
						
						</div>
					</div>					
					<div class="form-group">
						<label for="email">Email</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::label('', $data->email, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="phone">Số điện thoại</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::label('', $data->phone, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Tên skype</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::label('', $data->skyper, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<a href="{{ action('ManagementController@index') }}" class="btn btn-primary">Quay lại</a>
				</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@include('admin.management.scriptmanager')
@stop

