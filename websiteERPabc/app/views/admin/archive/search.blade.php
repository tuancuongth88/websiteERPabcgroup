<div class="margin-bottom">
	{{ Form::open(array('action' => 'ArchiveController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Số</label>
		  	<input type="text" name="code" class="form-control" placeholder="Số" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Loại công văn/giấy tờ</label>
			{{ Form::select('type', ['' => 'Tất cả'] + CommonOption::getArchiveType(), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Đối tác</label>
			{{ Form::select('partner_id', ['' => 'Tất cả'] + CommonProject::getModelArray('partner', 'name', 'id'), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Trạng thái</label>
			{{ Form::select('status', ['' => 'Tất cả'] + CommonOption::getArchiveStatusHandling(), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày hiệu lực</label>
			{{ Form::text('date_active', null, array('class' => 'form-control datepicker')) }}
		</div>
		
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>