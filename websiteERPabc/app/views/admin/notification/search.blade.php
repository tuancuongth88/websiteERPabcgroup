<div class="margin-bottom">
	{{ Form::open(array('action' => 'ReportController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên báo cáo</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Thể loại</label>
			 {{ Form::select('type_notification_id', ['' => 'Tất cả'] + TypeNotification::lists('name', 'id'), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Người tạo</label>
			{{ Form::select('user_id', ['' => 'Tất cả'] + CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control')) }}
		</div>
		<!-- <div class="input-group" style="width: 150px; display:inline-block;">
			<label>Người làm</label>
			{{-- Form::select('assign_id', ['' => 'Tất cả', 0 => 'Admin'] + CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control')) --}}
		</div> -->
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày bắt đầu</label>
		  	<input type="text" name="start" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày kết thúc</label>
		  	<input type="text" name="end" class="form-control" id="datepickerEnddate" placeholder="Đến ngày" />
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>