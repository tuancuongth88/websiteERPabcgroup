<tr id = "assignRow_{{ $departmentUserKey }}">
	<td>
		{{ Form::select('fun_id['.$departmentUserKey.']', CommonOption::getOptionFromModel('AdminFunction'), null, array('class' => 'form-control', 'onchange' => 'loadButton('.$departmentUserKey.')', 'id' => 'fun_id_'.$departmentUserKey, 'style' => 'width: 200px;')) }}
		{{ Form::hidden('departmentUserKey', $departmentUserKey) }}
	</td>
	<td>
		{{ Form::select('button_id['.$departmentUserKey.']', [], [2,6], array('id' => 'button_id_'.$departmentUserKey, 'multiple' => true, 'style' => 'width: 200px;')) }}
	</td>
	<td>
		<a onclick="removeAssignProjectUser({{ $departmentUserKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>