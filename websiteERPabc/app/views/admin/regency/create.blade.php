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

				<!-- <div class="box-body">
					<div class="form-group">
						<label>Thuộc phòng ban liên quan</label>
						<div class="row">
							<div class="col-sm-8">
							<table class="table">
							 <thead>
								<tr>
									<th>Tên phòng ban</th>
									<th>Chọn phòng</th>
									<th>Quyền hạn</th>
								</tr>
							</thead>
								@foreach(Department::lists('name', 'id') as $key =>$value)
								<tr>
									<td>{{ $value }}</td>
									<td>{{ Form::checkbox("dep_id[$key]") }}</td>
									<td>
										@if($per = CommonProject::getModelArray('Permission', 'name', 'id'))
									@foreach($per as $keyPer => $value)
										<label for="per_id{{ $key . '_' . $keyPer }}">{{ $value }}</label>
										{{ Form::checkbox('per_id['.$key.']['.$keyPer.']', $keyPer, false, array('id' => 'per_id_'.$key.'_'.$keyPer)) }}
									@endforeach
								@endif
									</td>
								</tr>
								@endforeach
							</table>
								
							</div>
						</div>
					</div>
				</div> -->
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop
