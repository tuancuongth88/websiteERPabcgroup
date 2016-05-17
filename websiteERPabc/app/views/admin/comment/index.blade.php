@foreach(Common::getComment($modelName, $modelId) as $key => $value)
	<div class="form-group">
		<label>Ngày cập nhật:{{ $value->created_at }}</label>
		<div class="row">
			<div class="col-sm-6">
				<label>Nội dung</label>
				{{ $value->description }}
			</div>
		</div>
		<label>Người cập nhật:{{ User::find($value->user_id)->username }}</label>
	</div>
@endforeach