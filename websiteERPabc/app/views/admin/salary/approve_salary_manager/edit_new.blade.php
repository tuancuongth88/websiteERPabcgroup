@extends('admin.layout.default')
@section('title')
	{{ $title='Sửa đề xuất lương nhân viên' }}
@stop
@section('content')

	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
			{{ Form::open(array('action' => array('SalaryApproveController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Mức lương đề xuất</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('salary', $data->salary_new, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Tên nhân viên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::label('username', SalaryHistoryUser::getName($data, 'username'), array('class' => 'form-control', 'id' => 'user_salary')) }}
								<a href="#" class="btn btn-default room" id="room" onclick="getDep()">Phòng ban-chức vụ</a>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Tên phòng ban- chức vụ</label>
					<div class="row">
						{{ Form::select('dep_regency_id', ['' => 'Lựa chọn'] + $array, null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
					</div>
				</div>
				<div class="form-group">
					<label>Ngày đề xuất</label>
					<div class="row">
						<div class="col-sm-6">
				  			<input type="text" name="start_date" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
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
