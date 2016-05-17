<div class="margin-bottom">
	{{ Form::open(array('action' => 'TaskController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên công việc</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Trạng thái</label>
			 {{ Form::select('status', ['' => 'Tất cả'] + CommonOption::getStatusTaskArray(), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Dự án</label>
			 {{ Form::select('project_id', ['' => 'Tất cả'] + CommonProject::getModelArray('Project', 'name', 'id'), null, array('class' => 'form-control')) }}
		</div>
		@if(CommonUser::getUserRole() == ROLE_ADMIN)
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Người tạo</label>
			{{ Form::select('user_id', ['' => 'Tất cả'] + CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Người tham gia</label>
			{{ Form::select('assign_id', ['' => 'Tất cả'] + CommonProject::getModelArray('User', 'username', 'id'), null, array('class' => 'form-control')) }}
		</div>
		@endif
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày bắt đầu</label>
		  	<input type="text" name="start" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày kết thúc</label>
		  	<input type="text" name="end" class="form-control" id="datepickerEnddate" placeholder="Đến ngày" />
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom; margin-top: 3px;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>