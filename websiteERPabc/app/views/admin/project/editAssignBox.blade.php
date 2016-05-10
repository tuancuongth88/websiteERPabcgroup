@foreach($projectUser as $keyProjectUser => $valueProjectUser)
	<tr id = "assignRow_{{ $keyProjectUser }}">
		<td>
			{{ Form::select('user_id['.$keyProjectUser.']', CommonProject::getModelArray('User', 'username', 'id'), $valueProjectUser->user_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
			{{ Form::hidden('projectUserKey[]', $keyProjectUser) }}
		</td>
		<td>
			{{ Form::select('temp_role_id['.$keyProjectUser.']', CommonProject::getModelArray('TempRole', 'name', 'id'), $valueProjectUser->temp_role_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		</td>
		<td class="assignBoxPermission">
			@if($per = CommonProject::getModelArray('Permission', 'name', 'id'))
				@foreach($per as $key => $value)
					<?php 
						$perCheckboxStatus = CommonProject::checkProjectUserPerStatus($valueProjectUser->project_id, $valueProjectUser->user_id, $valueProjectUser->temp_role_id, $key);
					?>
					<label for="per_id_{{ $keyProjectUser . '_' . $key }}">{{ $value }}</label>
					{{ Form::checkbox('per_id['.$keyProjectUser.']['.$key.']', $key, $perCheckboxStatus, array('id' => 'per_id_'.$keyProjectUser.'_'.$key)) }}
				@endforeach
			@endif
		</td>
		<td>
			<a onclick="removeAssignProjectUser({{ $keyProjectUser }})" class="removeAssignBtn">Xóa</a>
		</td>
	</tr>
@endforeach