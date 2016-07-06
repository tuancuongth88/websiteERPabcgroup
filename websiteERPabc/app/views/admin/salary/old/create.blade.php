@extends('admin.layout.default')
@section('title')
	{{ $title='Đề xuất lương nhân viên' }}
@stop
@section('content')
	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('SalaryUserController@indexOld') }}" class="btn btn-success">Danh sách lương</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				{{ Form::open(array('action' => 'SalaryUserController@storeOld')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên nhân viên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('username', null, array('class' => 'form-control', 'id' => 'user_salary')) }}
								<a href="#" class="btn btn-default room" onclick="getDetail()">Chi tiết lương cũ</a>
							</div>
						</div>
					</div>
				</div>
				<div id = "getDetailUserBox"></div>
				<div class="form-group">
					<label>Ngày de xuat</label>
					<div class="row">
						<div class="col-sm-6">
				  			<input type="text" name="start_date" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
				  		</div>
				  	</div>
				</div>
				<div class="form-group">
					<label>Lựa chọn tăng hoặc giảm lương</label>
					<div class="row">
						<div class="col-sm-6">
						{{ Form::select('type_salary', CommonSalary::getTypeUpDow(), null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Phần trăm</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('percent', null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Lý do</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('note_user_update', null, array('class' => 'form-control')) }}
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
@include('admin.salary.script')
@include('admin.salary.style')
@stop
