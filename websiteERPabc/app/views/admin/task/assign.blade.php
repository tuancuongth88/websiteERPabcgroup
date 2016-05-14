<tr id="assignRow_{{ $taskUserKey }}">
	<td>
		{{ Form::select('user_id['.$taskUserKey.']', CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('taskUserKey[]', $taskUserKey) }}
	</td>
	<td>
		{{ Form::select('per_id['.$taskUserKey.']', CommonOption::getPermissionArray(), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
	</td>
	<td>
		<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')?removeAssignTaskUser({{ $taskUserKey }}):false;" class="removeAssignBtn">Xóa</a>
	</td>
</tr>