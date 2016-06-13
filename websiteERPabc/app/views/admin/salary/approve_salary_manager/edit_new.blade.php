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
								{{ Form::text('salary', $data->salary_new, array('class' => 'form-control', 'readonly' => 'true')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Mức lương admin muốn sửa</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('salary_edit', $data->salary_edit, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Tên nhân viên</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::label('', SalaryHistoryUser::getName($data, 'username'), array('class' => 'form-control', 'id' => 'user_salary')) }}
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Tên phòng ban- chức vụ</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::select('dep_regency_id', ['' => 'Lựa chọn'] + CommonSalary::getDepRegency($data->model_id), CommonSalary::getidDepRegPartner($salary), array('class' => 'form-control', 'disabled' => 'disabled')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Ngày đề xuất</label>
					<div class="row">
						<div class="col-sm-6">
				  			{{ Form::label('', $data->start_date, array('class' => 'form-control')) }}
				  		</div>
				  	</div>
				</div>
				<div class="form-group">
					<label>Lý do</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('note_user_update', $data->note_user_update, array('class' => 'form-control', 'readonly' =>'true')) }}
						</div>
					</div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Phê duyệt', array('class' => 'btn btn-primary')) }}
				</div>
				{{ Form::close() }}
			</div>
		</div>
	</div>
@include('admin.salary.style')
@stop
