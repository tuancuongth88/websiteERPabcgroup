@extends('admin.layout.default')
@section('title')
{{ $title='Thêm phòng ban' }}
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
		{{ Form::open(array('action' => 'DeparmentController@store')) }}
		  <div class="box-body">
		  	<div class="box-body">
				<div class="form-group">
					<label>Parent</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('parent_id', CommonOption::getOption('Department'), null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			  <label for="username">Tên phòng</label>
			  <div class="row">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="username" placeholder="Tên phòng" name="name">
				</div>
			  </div>
			</div>
			<div class="form-group">
			  <label for="name">Quyền hạn</label>
				<div class="row">
				  <div class="col-sm-6">
					
				  </div>
				</div>
			</div>
		  </div>
		  <!-- /.box-body -->

		  <div class="box-footer">
			<input type="submit" class="btn btn-primary" value="Lưu lại" />
			<input type="reset" class="btn btn-default" value="Nhập lại" />
		  </div>
		{{ Form::close() }}
	  </div>
	  <!-- /.box -->
	</div>
</div>

@stop
