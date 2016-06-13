@extends('admin.layout.default')
@section('title')
	{{ $title='Đề xuất lương nhân viên' }}
@stop
@section('content')
	<div class="row margin-bottom">
		<div class="col-xs-12">
			<a href="{{ action('SalaryApproveController@index') }}" class="btn btn-success">Danh sách lương phê duyệt</a>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				{{ Form::open(array('action' => array('SalaryApproveController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên nhân viên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('username', SalaryHistoryUser::getName($data, 'username'), array('class' => 'form-control', 'id' => 'user_salary')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-6">
						@if($salary)
							<div><label>Tên phòng ban</label>: {{ CommonSalary::getNameDep($salary->dep_id) }}</div>
							<div><label>Tên chức vụ</label>: {{ CommonSalary::getNameRegency($salary->regency_id) }}</div>
							<div><label>Lương hiện tại</label> {{ $salary->salary }}</div>
						@else
							<div>Lỗi</div>
						@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Ngày đề xuất</label>
					<div class="row">
						<div class="col-sm-6">
				  			<input type="text" name="start_date" value="{{ $data->start_date }}" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
				  		</div>
				  	</div>
				</div>
				<div class="form-group">
					<label>Lựa chọn tăng hoặc giảm lương</label>
					<div class="row">
						<div class="col-sm-6">
						{{ Form::select('type_salary', CommonSalary::getTypeUpDow(), $data->type_salary, array('class' => 'form-control', 'disabled' => 'disabled')) }}
						</div>
					</div>
				</div>
					<div class="form-group">
					<label>Lựa chọn tăng hoặc giảm lương muốn điều chỉnh</label>
					<div class="row">
						<div class="col-sm-6">
						{{ Form::select('type_salary_edit', CommonSalary::getTypeUpDow(), null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Phần trăm</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('percent', $data->percent, array('class' => 'form-control', 'readonly' => 'true')) }}
						</div>
					</div>
				</div>
					<div class="form-group">
					<label>Phần trăm muốn điều chỉnh</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('percent_edit', null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Lý do</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('note_user_update', $data->note_user_update, array('class' => 'form-control')) }}
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
@include('admin.salary.style')
@stop
