@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới thiết bị máy tính' }}
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
				{{ Form::open(array('action' => 'ComputerResourceController@store', 'files'=> true)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="username">Tên thiết bị</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Tên thiết bị" name="name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">CPU</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="CPU" name="cpu">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">RAM</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Dung lượng ram" name="ram">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Ổ cứng</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Dung lượng ổ cứng" name="hhd">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Kích thước màn hình</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="name" placeholder="Kích thước màn hình" name="size">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Bên cung cấp</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" placeholder="bên cung cấp" name="provider">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Thông tin liên hệ</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" placeholder="Thông tin liên hệ" name="provider_contact">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="username">Số lượng</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="provider" placeholder="Số lượng" name="number">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Thể loại</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('type', ['' => 'Lựa chọn'] + CommonResource::getResourceDevice(), null, array('class' => 'form-control')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tình trạng</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::select('status', CommonOption::getStatusResource(), null, array('class' => 'form-control')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="linkFile">Mô tả</label>
							<div class="row">
								<div class="col-sm-6">
									<input type="text" class="form-control" id="description" placeholder="Mô tả" name="description">
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
