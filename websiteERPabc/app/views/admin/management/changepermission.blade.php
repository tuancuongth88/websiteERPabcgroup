@extends('admin.layout.default')
@section('title')
{{ $title='Phân quyền cho user' }}
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
				{{ Form::open(array('action' => array('ManagementController@doChangePermissionUser', $data->id), 'method' => 'POST')) }}
				<div class="box-body">
				<div class="form-group">
						<label>Tên User</label>
						<div class="row">
							<div class="col-sm-12">
								{{ Form::label('', $data->username, array('class' => 'form-control', 'style' => 'width: 400px; color:red;'))}}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Thêm Chức năng</label>
						<div class="row">
							<div class="col-sm-12">
								<table class="assign" cellpadding="5px">
									<thead>
										<tr>
											<th>Chức năng</th>
											<th>Chọn quyền</th>
										</tr>
									</thead>
									<tbody id="assignBoxFun">
										@if($dataPermission)
											@foreach($dataPermission as $key => $value)
											<tr id = "assignRow_{{ $key }}">
												<td>
													{{ Form::select('fun_id['.$key.']', CommonOption::getOptionFromModel('AdminFunction'), $value->fun_id, array('class' => 'form-control', 'onchange' => 'loadButton('.$key.')', 'id' => 'fun_id_'.$key, 'style' => 'width: 200px;')) }}
													{{ Form::hidden('key', $key) }}
												</td>
												<td>
													{{ Form::select('button_id['.$key.'][]', [], null, array('id' => 'button_id_'.$key, 'multiple' => true, 'style' => 'width: 200px;')) }}
												</td>
												<td>
													<a onclick="removeAssignProjectUser({{ $key }})" class="removeAssignBtn">Xóa</a>
												</td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
								<a onclick="assignFunUser()" class="assignBtn">Thêm chức năng</a>
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
@include('admin.management.scriptmanager')
@stop
