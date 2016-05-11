<tr id = "assignRow_{{ $departmentUserKey }}">
	<td>
		{{ Form::select('dep_id[]', CommonProject::getModelArray('Department', 'name', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('departmentUserKey', $departmentUserKey) }}
	</td>
	<td>
		{{ Form::select('regency_id[]', [NULL => 'Lựa chọn'] + Regency::lists('name', 'id'), null, array('class' => 'form-control','style' => 'width: 120px;')) }}
	</td>
	<td>
		<a onclick="removeAssignProjectUser({{ $departmentUserKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>