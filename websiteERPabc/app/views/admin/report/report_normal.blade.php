@if($url != '')
	<div class="form-group">
		<label>Mẫu báo cáo</label>
		<a href="{{ $url }}">Xem mẫu báo cáo</a>
	</div>
@else
	<div class="form-group">
		<label>Chưa có mẫu báo cáo</label>
	</div>		
@endif