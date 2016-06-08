<div>
	<label>Tên phòng ban- chức vụ</label>
	{{ Form::select('dep_regency_id', ['' => 'Lựa chọn'] + $array, null, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
</div>
