<div class="margin-bottom">
	{{ Form::open(array('action' => 'ContractController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên hợp đồng</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Số hợp đồng</label>
		  	<input type="text" name="code" class="form-control" placeholder="Số" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>kiểu hợp đồng</label>
			 {{ Form::select('type', ['' => 'Tất cả'] + CommonOption::getTypeContract(), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Trạng thái</label>
			{{ Form::select('status', ['' => 'Tất cả'] + CommonOption::getStatusContract(), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày hiệu lực</label>
		  	<input type="text" name="date_active" class="form-control" id="datepickerEnddate" placeholder=" ngày" />
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>