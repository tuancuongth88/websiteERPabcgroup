@if($ad)
<label>Thêm phòng ban</label>
	<div class="row">
		<div class="col-sm-12">
			<table class="assign" cellpadding="5px">
				<thead>
					<tr>
						<th>Phòng ban</th>
						<th>Chức vụ</th>
						<th>Người quản lý</th>
					</tr>
				</thead>
				@if(User::isAdmin() == ROLE_ADMIN || User::checkPermissionFunction(FUNCTION_USER))
					<tbody id="assignBox">
						@foreach(CommonUser::getDepUserRegency($data->id) as $departmentUserKey => $values)
						<tr id = "assignRow_{{ $departmentUserKey }}">
							<td>
								{{ Form::select('dep_id['.$departmentUserKey.']', CommonProject::getModelArray('Department', 'name', 'id'), $values->dep_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
							</td>
							<td>
								{{ Form::select('regency_id['.$departmentUserKey.']',  Regency::lists('name', 'id'), $values->regency_id, array('class' => 'form-control','style' => 'width: 120px;')) }}
							</td>
							<td>
								{{ Form::select('user_id['.$departmentUserKey.']', CommonOption::getListUser(),  $values->parent_user_id, array('class' => 'form-control', 'style' => 'width: 120px;')) }}
							</td>
							<td>
								<a onclick="removeAssignFuction({{ $departmentUserKey }})" class="removeAssignBtn">Xóa</a>
							</td>
							<td>
								@if($values->status == ASSIGN_STATUS_2)
									<label style="color: red">Tài khoản này từ chối vào phòng ban</label>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				@else
				<tbody id="assignBox">
						@foreach(CommonUser::getDepUserRegency($data->id) as $departmentUserKey => $values)
						<tr id = "assignRow_{{ $departmentUserKey }}">
							<td>
								{{ Form::select('dep_id['.$departmentUserKey.']', CommonProject::getModelArray('Department', 'name', 'id'), $values->dep_id, array('class' => 'form-control', 'style' => 'width: 120px;', 'disabled')) }}
							</td>
							<td>
								{{ Form::select('regency_id['.$departmentUserKey.']', Regency::lists('name', 'id'), $values->regency_id, array('class' => 'form-control','style' => 'width: 120px;', 'disabled')) }}
							</td>
							<td>
								{{ Form::select('per_id['.$departmentUserKey.']', CommonOption::getListUser(),  $values->parent_user_id, array('class' => 'form-control', 'style' => 'width: 120px;', 'disabled')) }}
							</td>
							<td>
							</td>
							<td>
								@if($values->status == ASSIGN_STATUS_2)
									<label style="color: red">Tài khoản này từ chối vào phòng ban</label>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				@endif
			</table>
			@if(User::isAdmin() == ROLE_ADMIN || User::checkPermissionFunction(FUNCTION_USER))
			<a onclick="assignDepartmentUser()" class="assignBtn">Thêm phòng ban</a>
			@endif
		</div>
	</div>
</div>
@endif