<tr id="assignRow_{{ $reportUserKey }}">
	<td>
		{{ Form::select('user_id['.$reportUserKey.']', ['' => 'Lựa chọn'] + User::lists('username', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('reportUserKey[]', $reportUserKey) }}
	</td>
	<td>
		<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')?removeassignReportUser({{ $reportUserKey }}):false;" class="removeAssignBtn">Xóa</a>
	</td>
</tr>