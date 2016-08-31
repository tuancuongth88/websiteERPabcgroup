@extends('admin.layout.default')
@section('title')
{{ $title='Cập nhật thiết bị máy tính' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ComputerResourceController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('ComputerResourceController@update', $data->id), 'method' => 'PUT')) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username">Tên thiết bị</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Tên thiết bị" value="{{$data->name }}" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">CPU</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="cpu" placeholder="CPU"  value="{{$data->cpu }}"name="cpu">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">RAM</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="ram" placeholder="Dung lượng ram"  value="{{$data->ram }}" name="ram">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ổ cứng</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="hhd" placeholder="Dung lượng ổ cứng"  value="{{$data->hhd }}" name="hhd">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Kích thước màn hình</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="size" placeholder="Kích thước màn hình"  value="{{$data->size }}" name="size">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Bên cung cấp</label>
							<div class="row">
								<div class="col-sm-6">
								{{ Form::select('provider', CommonContract::getNamePartnerProvided(), $data->provider, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="username">Số lượng</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" placeholder="Số lượng" value="{{$data->number }}"  name="number">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Thể loại</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('type', ['' => 'Lựa chọn'] + CommonResource::getResourceDevice(), $data->type, array('class' => 'form-control')) }}
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
									<input type="text" class="form-control" id="description" placeholder="Mô tả" value="{{$data->description }}" name="description">
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
