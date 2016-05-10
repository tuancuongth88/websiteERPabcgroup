<tr id="assignRow_{{ $projectUserKey }}">
	<td>
		{{ Form::select('user_id['.$projectUserKey.']', CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('projectUserKey[]', $projectUserKey) }}
	</td>
	<td>
		{{ Form::select('temp_role_id['.$projectUserKey.']', CommonProject::getModelArray('TempRole', 'name', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
	</td>
	<td class="assignBoxPermission">
		@if($per = CommonProject::getModelArray('Permission', 'name', 'id'))
			@foreach($per as $key => $value)
				<label for="per_id_{{ $projectUserKey . '_' . $key }}">{{ $value }}</label>
				{{ Form::checkbox('per_id['.$projectUserKey.']['.$key.']', $key, false, array('id' => 'per_id_'.$projectUserKey.'_'.$key)) }}
			@endforeach
		@endif
	</td>
	<td>
		<a onclick="removeAssignProjectUser({{ $projectUserKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>