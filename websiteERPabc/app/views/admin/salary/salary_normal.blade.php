<div class="form-group">
	<label>Danh sách phòng ban hoặc chức vụ</label>
	<div class="row">
		<div class="col-sm-6">
		{{ Form::select('model_id', $data, null, array('class' => 'form-control')) }}
		</div>
	</div>
</div>