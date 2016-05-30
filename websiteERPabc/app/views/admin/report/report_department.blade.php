<div class="form-group">
	<label>Format riêng cho từng phòng ban</label>
	<div class="row">
		@foreach(CommonUser::getFormatReportDepartmentUser() as $key => $value)
			Phòng ban: {{ Department::find($key)->name }}
			<a href="{{ REPORT_FORMAT . '/' . $key . '/' . $value }}">Xem mẫu báo cáo</a>
		@endforeach
	</div>
</div>