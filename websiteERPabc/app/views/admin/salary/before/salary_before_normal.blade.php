<table class="table table-hover">
	<tr>
		<th>Danh sách phòng ban</th>
		<th>Lý do</th>
		<th>Lựa chọn tăng hoặc giảm lương</th>
		<th>phần trăm</th>
		<th>Action</th>
	</tr>
	@foreach($data as $value)
	<tr>
			<td>{{ Form::text('percent', CommonSalary::getDepAndRegency('Department', $value->dep_id), array('class' => 'form-control', 'disabled' => 'disabled')) }}</td>
			<td>{{ Form::text('note_user_update', null, array('class' => 'form-control')) }}</td>
			<td> {{ Form::select('type_salary', CommonSalary::getTypeUpDow(), null, array('class' => 		'form-control')) }}
			</td>
			<td>{{ Form::text('percent', null, array('class' => 'form-control')) }}</td>
			<td>
				{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			</td>
	</tr>
	@endforeach
	<tr>
		<td>
			
		</td>
	</tr>
</table>
