@foreach($taskUser as $keyTaskUser => $valueTaskUser)
	<tr id = "assignRow_{{ $keyTaskUser }}">
		<td>
			{{ Form::select('user_id['.$keyTaskUser.']', CommonProject::getModelArray('User', 'username', 'id'), $valueTaskUser->user_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
			{{ Form::hidden('taskUserKey[]', $keyTaskUser) }}
		</td>
		<td>
			{{ Form::select('per_id['.$keyTaskUser.']', CommonOption::getPermissionArray(), $valueTaskUser->per_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		</td>
		<td>
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')?removeAssignTaskUser({{ $keyTaskUser }}):false;" class="removeAssignBtn">Xóa</a>
		</td>
	</tr>
@endforeach