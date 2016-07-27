<div class="margin-bottom">
	{{ Form::open(array('action' => 'DocumentResourceController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên tài liệu</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Số tài liệu</label>
			<input type="text" name="code" class="form-control" placeholder="Số" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Mô tả</label>
			<input type="text" name="description" class="form-control" placeholder="Mô tả" />
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>