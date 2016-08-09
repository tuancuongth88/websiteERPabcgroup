<div class="margin-bottom">
	{{ Form::open(array('action' => 'PartnerController@searchService', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Tên nhà cung cấp</label>
		  	<input type="text" name="fullname" class="form-control" placeholder="Tên" />
		</div>
		
		<!-- <div class="input-group" style="width: 150px; display:inline-block;">
			<label>Email</label>
			<input type="text" name="email" class="form-control" placeholder="Email" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Địa chỉ</label>
			<input type="text" name="address" class="form-control" placeholder="Địa chỉ" />
		</div> -->
		<div class="input-group" style="display: inline-block; vertical-align: bottom;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	</form>
</div>