@extends('admin.layout.default')
@section('title')
{{ $title='Cập nhật thiết bị văn phòng' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ResourceManagementController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('ResourceManagementController@update', $data->id), 'method' => 'PUT')) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username">Tên thiết bị</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" value="{{ $data->name}}" placeholder="Tên thiết bị" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Bên cung cấp</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" value="{{ $data->provider}}"  placeholder="bên cung cấp" name="provider">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Thông tin liên hệ</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" value="{{ $data->provider_contact}}"  placeholder="Thông tin liên hệ" name="provider_contact">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Số lượng</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" value="{{ $data->number}}"  placeholder="Số lượng" name="number">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Thể loại</label>
							<div class="row">
								<div class="col-sm-6">
										{{ Form::select('type', [0 => 'Lựa chọn'] + CommonResource::getResourceDevice(), $data->type, array('class' => 'form-control')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tình trạng</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('status', CommonOption::getStatusResource(), $data->status, array('class' => 'form-control')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="linkFile">Mô tả</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" value="{{ $data->description}}"  id="description" placeholder="Mô tả" name="description">
								</div>
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
