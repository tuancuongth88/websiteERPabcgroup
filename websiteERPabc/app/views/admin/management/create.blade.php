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
			{{ Form::open(array('action' => 'ManagementController@store')) }}
				<div class="box-body">
					<div class="form-group">
						<label for="name">Full name</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="name" placeholder="name" name="name">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Email</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="email" placeholder="name" name="email">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Tài khoản</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="username" placeholder="name" name="username">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Mật khẩu</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="password" placeholder="name" name="password">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Phone</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Phòng ban</label>
						<div class="row">
							<div class="col-sm-6">
								@foreach(Department::lists('name', 'id') as $key =>$value)
									{{ $value }}:{{ Form::checkbox("dep_id[$key]") }}
									<br/>
								@endforeach
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

@stop
