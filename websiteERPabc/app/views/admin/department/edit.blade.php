@extends('admin.layout.default')
@section('title')
{{ $title='Sửa phòng ban' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
	<a href="{{ action('DeparmentController@index') }}" class="btn btn-success">Danh phòng ban</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		<!-- form start -->
	   {{ Form::open(array('action' => array('DeparmentController@update', $data->id), 'method' => 'PUT')) }}
		  <div class="box-body">
			<div class="form-group">
			 	<label>Parent</label>
			 	<div class="row">
					<div class="col-sm-6">
						{{ Form::select('parent_id', CommonOption::getOption('Department'), Department::find($data->id)->parent_id, array('class' => 'form-control')) }}
					</div>
			 	</div>
			</div>
			<div class="form-group">
			  <label for="username">Tên phòng</label>
			  <div class="row">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" value="{{ $data->name }}" placeholder="Tên phòng" name="name">
				</div>
			  </div>
			</div>
			<div class="form-group">
			  <label for="name">Quyền hạn</label>
				<div class="row">
				  	<div class="col-sm-6">
				  		@if($functions = CommonOption::getOptionModel('Functions'))
							@foreach($functions as $key => $value)
							<p>
								{{ Form::checkbox('function[]', $key, false, array('id' => 'function_'.$key)) }}
	 						<label for="{{ 'function_'.$key }}">{{ $value }}</label>
	 						</p>
							@endforeach
						@endif
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
