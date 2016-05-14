<tr id="assignRow_{{ $taskUserKey }}">
	<td>
		{{ Form::select('user_id['.$taskUserKey.']', CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('taskUserKey[]', $taskUserKey) }}
	</td>
	<td class="assignBoxPermission">
		@if($per = CommonProject::getModelArray('Permission', 'name', 'id'))
			@foreach($per as $key => $value)
				<label for="per_id_{{ $taskUserKey . '_' . $key }}">{{ $value }}</label>
				{{ Form::checkbox('per_id['.$taskUserKey.']['.$key.']', $key, false, array('id' => 'per_id_'.$taskUserKey.'_'.$key)) }}
			@endforeach
		@endif
	</td>
	<td>
		<a onclick="removeAssignTaskUser({{ $taskUserKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>