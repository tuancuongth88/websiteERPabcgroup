@extends('admin.layout.default')
@section('title')
{{ $title='Gia hạn hợp đồng' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
	<a href="{{ action('DashboardController@index') }}" class="btn btn-success">Danh sách</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		<!-- form start -->
		{{ Form::open(array('action' => array('ContractController@updateAdjourn', $data->id), 'method' => 'post', 'files' => true)) }}
		
		  <div class="box-body">
			<div class="form-group">
			  <label for="username">Tên </label>
			  <div class="row">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="name" value="{{ $data->name }}" name="name" readonly="true">
				</div>
			  </div>
			</div>

			<div class="form-group">
			  <label>Số hợp đồng</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="code" value="{{ $data->code }}" name="code" readonly="true">
					</div>
			   </div>
			</div>
			<div class="form-group">
			   <label for="linkFile">Kiểu hợp đồng</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="code" value="{{ CommonOption::getNameTypeContract($data->type) }}" name="type" readonly="true">

					</div>
			   </div>
			</div>
			<div class="form-group">
			  <label>Nội dung tóm tắt</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="description" value="{{ $data->description}}" name="description" readonly="true">
					</div>
			   </div>
			</div>
			<div class="form-group">
			   <label for="linkFile">Đối tác</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="code" value="{{ CommonContract::getNamePartnerId($data->partner_id) }}" name="partner_id" readonly="true">
						
					</div>
			   </div>
			</div>
			<div class="form-group">
			   <label for="linkFile">Kiểu gia hạn</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="code" value="{{ CommonOption::getNameTypeExtendContract($data->type_extend) }}" name="type_extend" readonly="true">
						
					</div>
			   </div>
			</div>
			<div class="form-group">
			   <label for="linkFile">Ngày ký hợp đồng</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="description" value="{{ $data->date_sign}}" name="date_sign" readonly="true">
					</div>
			   </div>
			</div>
			
			<div class="form-group">
			   <label for="linkFile">Ngày hiệu lực</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="description" value="{{ $data->date_active}}" name="date_active" readonly="true">
					</div>
			   </div>
			</div>
			<div class="form-group">
			   <label for="linkFile">Ngày hết hạn</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" id="description" value="{{ $data->date_expired_new}}" name="date_expired_old" readonly="true">
					</div>
			   </div>
			</div>
			<div class="form-group">
			   <label for="linkFile">Gia hạn đến ngày</label>
			   <div class="row">
					<div class="col-sm-6">
						<input type="text" name="date_expired_new" class="form-control datepicker" />
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
