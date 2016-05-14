@foreach(Common::getComment($modelName, $modelId) as $key => $value)
	<div class="form-group">
		<label>Ngày cập nhật:{{ $value->created_at }}. Chi tiet</label>
		<div class="row">
			<div class="col-sm-6">
				{{ $value->description }}
			</div>
		</div>
	</div>
@endforeach