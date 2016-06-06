@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới mức lương nhân viên' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('SalaryUserController@index') }}" class="btn btn-success">Danh sách lương</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => 'SalaryUserController@store')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Mức lương nhân viên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('salary', null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Tên nhân viên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('salary', null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Tên nhân viên</label>
					<div class="row">
						<div class="col-sm-6">
						{{ Form::select('user_id', User::where('role_id', '!=', ROLE_ADMIN)->whereNull('salary_id')->lists('username', 'id'), null, array('class' => 'form-control')) }}
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
@stop
