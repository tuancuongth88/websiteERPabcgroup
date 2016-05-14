@foreach($taskUser as $keyTaskUser => $valueTaskUser)
	<tr id = "assignRow_{{ $keyTaskUser }}">
		<td>
			{{ Form::select('user_id['.$keyTaskUser.']', CommonProject::getModelArray('User', 'username', 'id'), $valueTaskUser->user_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
			{{ Form::hidden('taskUserKey[]', $keyTaskUser) }}
		</td>
		<td class="assignBoxPermission">
			@if($per = CommonProject::getModelArray('Permission', 'name', 'id'))
				@foreach($per as $key => $value)
					<?php 
						$perCheckboxStatus = CommonTask::checkTaskUserPerStatus($valueTaskUser->task_id, $valueTaskUser->user_id, $key);
					?>
					<label for="per_id_{{ $keyTaskUser . '_' . $key }}">{{ $value }}</label>
					{{ Form::checkbox('per_id['.$keyTaskUser.']['.$key.']', $key, $perCheckboxStatus, array('id' => 'per_id_'.$keyTaskUser.'_'.$key)) }}
				@endforeach
			@endif
		</td>
		<td>
			<a onclick="removeAssignTaskUser({{ $keyTaskUser }})" class="removeAssignBtn">Xóa</a>
		</td>
	</tr>
@endforeach