<tr id="assignRow_{{ $archiveUserKey }}">
	<td>
		{{ Form::select('user_id['.$archiveUserKey.']', CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('archiveUserKey[]', $archiveUserKey) }}
	</td>
	<td>
		{{ Form::select('status['.$archiveUserKey.']', CommonOption::getArchiveStatus(), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
	</td>
	<td>
		<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')?removeAssignArchiveUser({{ $archiveUserKey }}):false;" class="removeAssignBtn">Xóa</a>
	</td>
</tr>