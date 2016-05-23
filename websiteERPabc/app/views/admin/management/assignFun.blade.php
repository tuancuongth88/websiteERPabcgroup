<tr id = "assignRow_{{ $departmentUserKey }}">
	<td>
		{{ Form::select('fun_id[]', CommonOption::getOptionAllModel('AdminFunction'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('departmentUserKey', $departmentUserKey) }}
	</td>
	<td>
	</td>
	<td>
		<a onclick="removeAssignProjectUser({{ $departmentUserKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>