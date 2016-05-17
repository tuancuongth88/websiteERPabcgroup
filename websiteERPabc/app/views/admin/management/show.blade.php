@extends('admin.layout.default')
@section('title')
{{ $title='Chi tiết user' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ManagementController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="username">Tài khoản</label>
								{{ Form::label('username',$data->username, array('class'=> 'form-control'))}}
							</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="name">Tên đầy đủ</label>
								{{ Form::label('name',$data->name, array('class'=> 'form-control'))}}
							</div>
							<div class="col-sm-3">
								<label for="name">Ngày tháng năm sinh</label>
									{{ Form::label('date_of_birth',$data->date_of_birth, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Ảnh đại diện</label>
						<div class="row">
							<div class="col-sm-6">
								<img class="avatar" width="150px" height="150px" src="{{ url(PROFILE.'/'.$data->id.'/avatar'. '/' . $data->avatar) }}" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="name">Dân tộc</label>
								{{ Form::label('', $data->ethnic, array('class'=> 'form-control'))}}
							</div>
							<div class="col-sm-3">
								<label for="name">Giới tinh</label><br>
								{{ Form::radio('sex', SEX_MALE, $data->sex == SEX_MALE ? true : false, array('disabled'))}} Nam
								{{ Form::radio('sex', SEX_FEMALE, $data->sex == SEX_FEMALE ? true : false, array('disabled'))}} Nữ
								{{ Form::radio('sex', SEX_ORTHER, $data->sex == SEX_ORTHER ? true : false, array('disabled'))}} Khác
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Số chứng minh thư</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::label('',$data->identity_card, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ thường trú</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::label('',$data->address, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="current_address">Địa chỉ tạm trú</label>
									{{ Form::label('',$data->current_address, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Sơ yếu lý lịch</label>
						<div class="row">
							<div class="col-sm-6">
								<a href="{{ url(PROFILE.'/'.$data->id.'/file'. '/' . $data->personal_file)}}">Xem file</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Giấy khám sức khỏe</label>
						<div class="row">
							<div class="col-sm-6">
								<a href="{{ url(PROFILE.'/'.$data->id.'/file'. '/' . $data->medical_file)}}">Xem file</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Hồ sơ CV</label>
						<div class="row">
							<div class="col-sm-6">
								<a href="{{ url(PROFILE.'/'.$data->id.'/file'. '/' . $data->curriculum_vitae_file)}}">Xem file</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="degree">Bằng cấp</label>
								{{ Form::label('',$data->degree, array('class'=> 'form-control'))}}
							</div>
							<div class="col-sm-3">
								<label for="email">Email</label>
									{{ Form::label('email',$data->email, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="phone">Số điện thoại</label>
								{{ Form::label('phone',$data->phone, array('class'=> 'form-control'))}}
							</div>
							<div class="col-sm-3">
								<label for="skype">Skype</label>
									{{ Form::label('skyper',$data->skyper, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="number_tax">Mã số thuế</label>
								{{ Form::label('number_tax',$data->number_tax, array('class'=> 'form-control'))}}
							</div>
							<div class="col-sm-3">
								<label for="number_insure">Mã số bảo hiểm</label>
									{{ Form::label('number_insure',$data->number_insure, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="marriage">Tình trạng hôn nhân</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::radio('marriage', MARRIAG, $data->marriage == MARRIAG ? true : false, array('disabled'))}} Đã kết hôn
								{{ Form::radio('marriage', SINGLE, $data->marriage == SINGLE ? true : false, array('disabled'))}} Chưa kết hôn
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="note">Note</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::label('note',$data->note, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="type">Loại hợp đồng</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::select('type_id', CommonOption::getOptionAllModel('TypeUser'), $data->type_id, array('class' => 'form-control', 'disabled')) }}
							</div>
						</div>
					</div>
					@if(User::checkPermission($data->id))
					<div class="form-group">
						<label for="type">Ngạch, bậc lương</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::label('salary',$data->salary, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					@endif
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="start_time">Thời gian bắt đầu</label>
								{{ Form::label('start_time',$data->start_time, array('class'=> 'form-control'))}}
							</div>
							<div class="col-sm-3">
								<label for="end_time">Thời gian kết thúc </label>
									{{ Form::label('end_time',$data->end_time, array('class'=> 'form-control'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Thêm phòng ban</label>
						<div class="row">
							<div class="col-sm-12">
								<table class="assign" cellpadding="5px">
									<thead>
										<tr>
											<th>Phòng ban</th>
											<th>Chức vụ</th>
											<th>Quyền hạn</th>
										</tr>
									</thead>
									<tbody id="assignBox">
										@foreach(CommonUser::getDepUserRegency($data->id) as $departmentUserKey => $values)
										<tr id = "assignRow_{{ $departmentUserKey }}">
											<td>
												{{ Form::select('dep_id['.$departmentUserKey.']', [null => 'Lựa chọn'] + CommonProject::getModelArray('Department', 'name', 'id'), $values->dep_id, array('class' => 'form-control', 'style' => 'width: 120px;','disabled')) }}
											</td>
											<td>
												{{ Form::select('regency_id['.$departmentUserKey.']', [null => 'Lựa chọn'] +Regency::lists('name', 'id'), $values->regency_id, array('class' => 'form-control','style' => 'width: 120px;', 'disabled')) }}
											</td>
											<td>
												{{ Form::select('regency_id['.$departmentUserKey.']', [null => 'Lựa chọn'] + CommonOption::getPermissionArray(), $values->permission_id, array('class' => 'form-control','style' => 'width: 120px;', 'disabled')) }}
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>				
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<a href="{{ action('ManagementController@index') }}" class="btn btn-primary">Quay lại</a>
				</div>
		</div>
		<!-- /.box -->
	</div>
</div>
@include('admin.management.scriptmanager')
@stop
