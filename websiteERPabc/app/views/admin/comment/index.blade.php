<div class="box-body">
@foreach(Common::getComment($modelName, $modelId) as $key => $value)
	<div class="form-group">
		<p>
			<label>{{ CommonOption::getFieldTextByModel('User', $value->user_id, 'username') }}:</label>
			{{ $value->description }}
			<br>
			<i>{{ $value->created_at }}</i>
		</p>
		<hr>
	</div>
@endforeach
</div>