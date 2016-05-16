@foreach($projectUser as $keyProjectUser => $valueProjectUser)
	<tr id = "assignRow_{{ $keyProjectUser }}">
		<td>
			{{ Form::select('user_id['.$keyProjectUser.']', CommonProject::getModelArray('User', 'username', 'id'), $valueProjectUser->user_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
			{{ Form::hidden('projectUserKey[]', $keyProjectUser) }}
		</td>
		<td>
			{{ Form::select('temp_role_id['.$keyProjectUser.']', CommonProject::getModelArray('TempRole', 'name', 'id'), $valueProjectUser->temp_role_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		</td>
		<td>
			{{ Form::select('per_id['.$keyProjectUser.']', CommonOption::getPermissionArray(), $valueProjectUser->per_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		</td>
		<td>
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')?removeAssignProjectUser({{ $keyProjectUser }}):false;" class="removeAssignBtn">Xóa</a>
		</td>
	</tr>
@endforeach