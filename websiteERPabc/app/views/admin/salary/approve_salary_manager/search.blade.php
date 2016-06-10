<div class="margin-bottom">
	{{ Form::open(array('action' => 'SalaryApproveController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên user</label>
		  	{{ Form::text('username', null, array('class' => 'form-control')) }}
		</div>
		
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Phòng ban</label>
			 {{ Form::select('department', ['' => 'Tất cả'] + Department::lists('name', 'id'), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Chức vụ</label>
			 {{ Form::select('regency', ['' => 'Tất cả'] + Regency::lists('name', 'id'), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tăng giảm lương</label>
			{{ Form::select('type_salary',  CommonSalary::getTypeUpDow(), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày bắt đầu</label>
		  	<input type="text" name="start" class="form-control" id="datepickerStartdate" placeholder="Từ ngày"/>
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