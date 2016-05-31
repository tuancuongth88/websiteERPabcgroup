@if($checkPermission)
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
				<tbody id="assignBox">
					@foreach(CommonUser::getDepUserRegency($data->id) as $departmentUserKey => $values)
					<tr id = "assignRow_{{ $departmentUserKey }}">
						<td>
							{{ Form::select('dep_id['.$departmentUserKey.']', CommonProject::getModelArray('Department', 'name', 'id'), $values->dep_id, array('class' => 'form-control', 'style' => 'width: 120px;', $adPer)) }}
						</td>
						<td>
							{{ Form::select('regency_id['.$departmentUserKey.']',  Regency::lists('name', 'id'), $values->regency_id, array('class' => 'form-control','style' => 'width: 120px;', $adPer)) }}
						</td>
						<td>
							{{ Form::select('user_id['.$departmentUserKey.']', CommonOption::getListUser(),  $values->parent_user_id, array('class' => 'form-control', 'style' => 'width: 120px;', $adPer)) }}
						</td>
						<td>
							<a onclick="removeAssignFuction({{ $departmentUserKey }})" class="removeAssignBtn">Xóa</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<a onclick="assignDepartmentUser()" class="assignBtn">Thêm phòng ban</a>
		</div>
	</div>
</div>
@endif