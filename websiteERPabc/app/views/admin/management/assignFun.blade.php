<tr id = "assignRow_{{ $functionKey }}">
	<td>
		{{ Form::select('fun_id['.$functionKey.']', CommonOption::getOptionFunByuser('AdminFunction'), null, array('class' => 'form-control', 'onchange' => 'loadButton('.$functionKey.')', 'id' => 'fun_id_'.$functionKey, 'style' => 'width: 200px;')) }}
		{{ Form::hidden('functionKey', $functionKey) }}
	</td>
	<td>
		{{ Form::select('button_id['.$functionKey.'][]', [], null, array('id' => 'button_id_'.$functionKey, 'multiple' => true, 'style' => 'width: 200px;', 'required'=>'required')) }}
	</td>
	<td>
		<a onclick="removeAssignFuction({{ $functionKey }})" class="removeAssignBtn">Xóa</a>
	</td>
</tr>
