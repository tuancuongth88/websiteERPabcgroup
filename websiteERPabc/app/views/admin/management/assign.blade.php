<tr>
	<td>
		{{ Form::select('dep_id['.$departmentUserKey.']', CommonProject::getModelArray('Department', 'name', 'id'), null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
		{{ Form::hidden('departmentUserKey', $departmentUserKey) }}
	</td>
	<td>
		
		{{ Form::select('regency_id['.$departmentUserKey.']', Regency::lists('name', 'id'), null, array('class' => 'form-control','style' => 'width: 120px;')) }}
	</td>
	<td class="assignBoxPermission">
		@if($per = CommonProject::getModelArray('Permission', 'name', 'id'))
			@foreach($per as $key => $value)
			<label for="per_id_{{ $key }}">{{ $value }}</label>
				{{ Form::checkbox('per_id['.$departmentUserKey.']['.$key.']', $key, false, array('id' => 'per_id_'.$key)) }}
			@endforeach
		@endif
	</td>
</tr>