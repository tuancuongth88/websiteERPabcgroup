@extends('admin.layout.default')
@section('title')
{{ $title='Sửa User' }}
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
			{{ Form::open(array('action' => array('ManagementController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label for="name">Name</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="username" value="{{ $data->username }}" placeholder="name" name="username">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Phone</label>
						<div class="row">
							<div class="col-sm-6">
								<input type="text" class="form-control" id="phone" value="{{ $data->phone }}" placeholder="phone" name="phone">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Phòng ban</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('room_id', Room::lists('name', 'id'), $data->room_id, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Chức vụ</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('position_id', Position::lists('name', 'id'), $data->position_id, array('class' => 'form-control')) }}
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
