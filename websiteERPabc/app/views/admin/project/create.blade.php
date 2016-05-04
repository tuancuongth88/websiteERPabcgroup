@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới chức vụ' }}
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
			{{ Form::open(array('action' => 'RegencyController@store')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Parent</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('parent_id', CommonOption::getOption('Regency'), null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label>Tên chức vụ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', null, array('class' => 'form-control')) }}
							</div>
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
