@extends('admin.layout.default')
@section('title')
{{ $title='Sửa chức vụ' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('RegencyController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		<!-- form start -->
			{{ Form::open(array('action' => array('RegencyController@update', $data->id), 'method' => 'PUT')) }}
			<div class="box-body">
				<div class="form-group">
					<label>Parent</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('parent_id', CommonOption::getOption('Regency'), Regency::find($data->id)->parent_id, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
			</div>
			<div class="box-body">
				<div class="form-group">
					<label for="username">Tên chức vụ</label>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="username" value="{{ $data->name }}" placeholder="Tên phòng" name="name">
						</div>
					</div>
				</div>
			</div>

			<div class="box-body">
				<div class="form-group">
					<label>Thuộc phòng ban liên quan</label>
					<div class="row">
						<div class="col-sm-6">
							@foreach(Department::lists('name', 'id') as $key =>$value)
								{{ $value }}:{{ Form::checkbox("dep_id[$key]", CommonOption::checkValueCheckbox('DepUserRegency', $key, $data->id, 'dep_id', 'regency_id'), CommonOption::checkOptionCheckbox('DepUserRegency', $key, $data->id, 'dep_id', 'regency_id')) }}
								<br/>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<input type="submit" class="btn btn-primary" value="Lưu lại" />
			</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>

@stop
