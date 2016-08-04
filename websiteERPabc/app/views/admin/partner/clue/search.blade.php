<div class="margin-bottom">

	{{ Form::open(array('action' => 'PartnerClueController@search', 'method' => 'GET')) }}
		<input type="hidden" name="id" value="{{ $id }}">
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên đối tác</label>
		  	<input type="text" name="name" class="form-control" placeholder="Tên" />
		</div>
		
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Phòng ban</label>
			<input type="text" name="department" class="form-control" placeholder="Phòng ban" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Chức vụ</label>
			<input type="text" name="regency" class="form-control" placeholder="Chức vụ" />
		</div>
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>