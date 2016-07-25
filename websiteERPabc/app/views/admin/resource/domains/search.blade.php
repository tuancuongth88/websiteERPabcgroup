<div class="margin-bottom">
	{{ Form::open(array('action' => 'DomainResourceController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên miền</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Nhà cung cấp</label>
			<input type="text" name="provider" class="form-control" placeholder="Nhà cung cấp" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tình trạng</label>
				{{ Form::select('status', [''=> 'Tất cả']+CommonOption::getStatusResource(), null, array('class' => 'form-control')) }}
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>