<tr id = "assignRow_{{ $departmentUserKey }}">
	<td>
		{{ Form::select('dep_id[]', CommonProject::getModelArray('Department', 'name', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('departmentUserKey', $departmentUserKey) }}
	</td>
	<td>
		{{ Form::select('regency_id[]', Regency::lists('name', 'id'), null, array('class' => 'form-control','style' => 'width: 120px;', 'id' => 'regency_id[]')) }}
	</td>
	<td>
		{{ Form::select('user_id[]', CommonOption::getListUser(), null,  array('class' => 'form-control', 'style' => 'width: 120px;'))}}
		<!-- {{ Form::select('per_id[]', CommonOption::getPermissionArray(), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }} -->
	</td>
	<td>
		<a onclick="removeAssignFuction({{ $departmentUserKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>