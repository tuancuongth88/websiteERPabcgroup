<table class="table table-hover">
	<tr>
		<th><input type="checkbox" id="checkall" name="checkall" onClick="toggle(this)" /></th>
		<th>Nhân viên</th>
		<th>Chức vụ</th>
		<th>Phòng ban</th>
		<th>Lý do</th>
		<th>Lựa chọn tăng/giảm lương</th>
		<th>phần trăm</th>
		<th>Ngày đề xuất</th>
		<th>Action</th>
	</tr>
	@foreach($data as $key => $value)
	<tr>
			<td><input type="checkbox" class="history_id" name="history_id[]" value="{{ $value->id }}"/></td>
			<td>{{ Form::label('',  CommonSalary::getNameUser($value->user_id), array('class' => 'form-control', 'id' => 'username_'.$key)) }}</td>
			<td>{{ Form::label('',  CommonSalary::getNameRegency($value->regency_id), array('class' => 'form-control')) }}</td>
			<td>{{ Form::text('model_name', CommonSalary::getDepAndRegency('Department', $value->dep_id), array('class' => 'form-control', 'disabled' => 'disabled')) }}</td>
			<td>{{ Form::text('note_user_update[]', null, array('class' => 'form-control', 'id' => 'note_user_update_'.$key)) }}</td>
			<td> {{ Form::select('type_salary[]', CommonSalary::getTypeUpDow(), null, array('class' => 		'form-control', 'id' => 'type_salary_'.$key)) }}
			</td>
			<td>{{ Form::text('percent[]', null, array('class' => 'form-control', 'id' => 'percent_'.$key)) }}</td>
			<td>
				<input type="text[]" name="start_date" id="start_date_{{$key}}" class="form-control datepickerStartdate" placeholder="Từ ngày" />
			</td>
			<td>
			<a onclick="sendSalaryApprove({{$key}});" class="btn btn-primary">gửi đi</a>
			</td>
	</tr>
	@endforeach
	<tr>
		<td>
			
		</td>
	</tr>
</table>
@include('admin.salary.before.script')