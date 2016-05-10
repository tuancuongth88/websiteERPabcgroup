<tr id = "assignRow_{{ $departmentUserKey }}">
	<td>
		{{ Form::select('dep_id[]', CommonProject::getModelArray('Department', 'name', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('departmentUserKey', $departmentUserKey) }}
	</td>
	<td>
		{{ Form::select('regency_id[]', Regency::lists('name', 'id'), null, array('class' => 'form-control','style' => 'width: 120px;')) }}
	</td>
	<td>
		{{ Form::select('function_id[]', [], null, array('class' => 'form-control','style' => 'width: 120px;')) }}
        </select>
	</td>
	<td class="assignBoxPermission">
		@if($per = CommonProject::getModelArray('Permission', 'name', 'id'))
			@foreach($per as $key => $value)
			<label for="per_id_{{ $key }}">{{ $value }}</label>
				{{ Form::checkbox('per_id['.$departmentUserKey.']['.$key.']', $key, false, array('id' => 'per_id_'.$key)) }}
			@endforeach
		@endif
	</td>
	<td>
		<a onclick="removeAssignProjectUser({{ $departmentUserKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>