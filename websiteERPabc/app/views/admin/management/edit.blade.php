@extends('admin.layout.default')
@section('title')
{{ $title='Sửa User' }}
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
			{{ Form::open(array('action' => array('ManagementController@update', $data->id), 'method' => 'PUT')) }}
				<div class="box-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="username">Tài khoản</label>
								{{ Form::text('username', $data->username, array('class'=> 'form-control', 'id'=> 'username', 'placeholder'=> 'Tên tài khoản'))}}
							</div>
							<div class="col-sm-3">
								<label for="password">Mật khẩu</label>
									{{ Form::password('password', array('class' => 'form-control', 'id' => 'password', 'placeholder'=> 'Mật khẩu')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="name">Tên đầy đủ</label>
								{{ Form::text('name', $data->name, array('class'=> 'form-control', 'id'=> 'name', 'placeholder'=> 'Tên đầy đủ'))}}
							</div>
							<div class="col-sm-3">
								<label for="name">Ngày tháng năm sinh</label>
									{{ Form::text('date_of_birth', $data->date_of_birth, array('class' => 'form-control', 'id' => 'input_dateofbirth')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Ảnh đại diện</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('avatar')}}
								<img class="avatar" width="150px" height="150px" src="{{ url(PROFILE.'/'.$data->id.'/avatar'. '/' . $data->avatar) }}" />
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="name">Dân tộc</label>
								{{ Form::text('ethnic', $data->ethnic, array('class'=> 'form-control', 'id'=> 'name', 'placeholder'=> 'Dân tộc'))}}
							</div>
							<div class="col-sm-3">
								<label for="name">Giới tinh</label><br>
								{{ Form::radio('sex', SEX_MALE, $data->sex == SEX_MALE ? true : false)}} Nam
								{{ Form::radio('sex', SEX_FEMALE, $data->sex == SEX_FEMALE ? true : false)}} Nữ
								{{ Form::radio('sex', SEX_ORTHER, $data->sex == SEX_ORTHER ? true : false)}} Khác
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Số chứng minh thư</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('identity_card', $data->identity_card, array('class'=> 'form-control', 'id'=> 'name', 'placeholder'=> 'Số chứng minh thư'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="address">Địa chỉ thường trú</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('address', $data->address, array('class'=> 'form-control', 'id'=> 'address', 'placeholder'=> 'Địa chỉ thường trú'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="current_address">Địa chỉ tạm trú</label>
									{{ Form::text('current_address', $data->current_address, array('class' => 'form-control',  'placeholder'=> 'Địa chỉ tạm trú')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Sơ yếu lý lịch</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('personal_file')}}
								<a href="{{ url(PROFILE.'/'.$data->id.'/file'. '/' . $data->personal_file)}}">Xem file</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Giấy khám sức khỏe</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('medical_file')}}
								<a href="{{ url(PROFILE.'/'.$data->id.'/file'. '/' . $data->medical_file)}}">Xem file</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Hồ sơ CV</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('curriculum_vitae_file')}}
								<a href="{{ url(PROFILE.'/'.$data->id.'/file'. '/' . $data->curriculum_vitae_file)}}">Xem file</a>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="degree">Bằng cấp</label>
								{{ Form::text('degree', $data->degree , array('class'=> 'form-control', 'id'=> 'degree', 'placeholder'=> 'Bằng cấp'))}}
							</div>
							<div class="col-sm-3">
								<label for="email">Email</label>
									{{ Form::text('email', $data->email, array('class' => 'form-control',  'placeholder'=> 'Email')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="phone">Số điện thoại</label>
								{{ Form::text('phone', $data->phone, array('class'=> 'form-control', 'id'=> 'phone', 'placeholder'=> 'Số điện thoại'))}}
							</div>
							<div class="col-sm-3">
								<label for="skype">Skype</label>
									{{ Form::text('skyper', $data->skyper, array('class' => 'form-control',  'placeholder'=> 'Skype name')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="number_tax">Mã số thuế</label>
								{{ Form::text('number_tax', $data->number_tax, array('class'=> 'form-control', 'id'=> 'number_tax', 'placeholder'=> 'Mã số thuế'))}}
							</div>
							<div class="col-sm-3">
								<label for="number_insure">Mã số bảo hiểm</label>
									{{ Form::text('number_insure', $data->number_insure, array('class' => 'form-control',  'placeholder'=> 'Mã số bảo hiểm')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="marriage">Tình trạng hôn nhân</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::radio('marriage', MARRIAG, $data->marriage == MARRIAG ? true : false)}} Đã kết hôn
								{{ Form::radio('marriage', SINGLE, $data->marriage == SINGLE ? true : false)}} Chưa kết hôn
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="note">Note</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::textarea('note', $data->note, array('class' => 'form-control',  'placeholder'=> 'ghi chú')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="type">Loại hợp đồng</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::select('type_id', CommonOption::getOptionAllModel('Type'), $data->type_id, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="type">Ngạch, bậc lương</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::text('salary', $data->salary, array('class' => 'form-control', 'placeholder'=> 'Nhập mức lương')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-3">
								<label for="start_time">Thời gian bắt đầu</label>
								{{ Form::text('start_time', $data->start_time, array('class'=> 'form-control', 'id'=> 'number_tax', 'placeholder'=> 'Thời gian bắt đầu', 'id'=> 'datepickerStartdate'))}}
							</div>
							<div class="col-sm-3">
								<label for="end_time">Thời gian kết thúc </label>
									{{ Form::text('end_time', $data->end_time, array('class' => 'form-control',  'placeholder'=> 'Thời gian kết thúc', 'id'=> 'datepickerEnddate')) }}
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
										
									</tbody>
								</table>
								<a onclick="assignDepartmentUser()" class="assignBtn">Thêm phòng ban</a>
							</div>
						</div>
					</div>				
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary'))}}
				</div>
			{{ Form::close() }}
		</div>
		<!-- /.box -->
	</div>
</div>

@stop
