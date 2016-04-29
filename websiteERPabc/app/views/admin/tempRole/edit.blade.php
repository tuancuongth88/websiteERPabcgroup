@extends('admin.layout.default')

@section('title')
{{ $title='Sửa vai trò' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('TempRoleController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => array('TempRoleController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Cấp trên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('parent_id', CommonOption::getOption('TempRole'), $data->parent_id, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Tên vai trò</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', $data->name, array('class' => 'form-control')) }}
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
