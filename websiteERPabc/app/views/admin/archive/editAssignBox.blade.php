@foreach($archiveUser as $keyArchiveUser => $valueArchiveUser)
	<tr id = "assignRow_{{ $keyArchiveUser }}">
		<td>
			{{ Form::select('user_id['.$keyArchiveUser.']', CommonProject::getModelArray('User', 'username', 'id'), $valueArchiveUser->user_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
			{{ Form::hidden('archiveUserKey[]', $keyArchiveUser) }}
		</td>
		<td>
			{{ Form::select('status['.$keyArchiveUser.']', CommonOption::getArchiveStatus(), $valueArchiveUser->per_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		</td>
		<td>
			<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')?removeAssignArchiveUser({{ $keyArchiveUser }}):false;" class="removeAssignBtn">Xóa</a>
		</td>
	</tr>
@endforeach