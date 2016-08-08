@extends('admin.layout.default')

@section('title')
{{ $title='Bảng tin' }}
@stop
@section('notification')
{{ $notification =  $countNotification}}
@stop
@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<!-- <div class="box-header">
				<h3 class="box-title">Bảng tin</h3>
			</div> -->
			<!-- approve department -->
			

			@if(count($taskAssign) > 0)
			<div class="box-body table-responsive">
				<h4>Công việc chờ đồng ý tham gia</h4>
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
						<th>Tên công việc</th>
						<th>Tiến độ (%)</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Người tạo</th>
						<th>Dự án</th>
						<th>Action</th>
					</tr>
					@foreach($taskAssign as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
							<td>{{ $value->name }}</td>
							<td>{{ $value->percent }}</td>
							<td>{{ Common::getDateTimeString($value->start) }}</td>
							<td>{{ Common::getDateTimeString($value->end) }}</td>
							<td>{{ CommonUser::getUsernameById($value->user_id) }}</td>
							<td>{{ CommonOption::getFieldTextByModel('Project', $value->project_id, 'name') }}</td>
							<td>
								<a href="{{ action('TaskController@accept', $value->id) }}" class="btn btn-success">Đồng ý</a>
								<a href="{{ action('TaskController@refuse', $value->id) }}" class="btn btn-danger">Từ chối</a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			<hr />
			@endif

			@if(count($task) > 0)
			<div class="box-body table-responsive">
				<h4>Công việc đang làm</h4>
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
						<th>Tên công việc</th>
						<th>Tiến độ (%)</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Người tạo</th>
						<th>Dự án</th>
					</tr>
					@foreach($task as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
							<td>{{ $value->name }}</td>
							<td>{{ $value->percent }}</td>
							<td>{{ Common::getDateTimeString($value->start) }}</td>
							<td>{{ Common::getDateTimeString($value->end) }}</td>
							<td>{{ CommonUser::getUsernameById($value->user_id) }}</td>
							<td>{{ CommonOption::getFieldTextByModel('Project', $value->project_id, 'name') }}</td>
						</tr>
					@endforeach
				</table>
			</div>
			@endif

			@if(count($projectAssign) > 0)
			<div class="box-body table-responsive">
				<h4>Dự án chờ đồng ý tham gia</h4>
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
						<th>Tên dự án</th>
						<th>Tiến độ (%)</th>
						<th>Ngày bắt đầu</th>
						<th>Ngày kết thúc</th>
						<th>Trạng thái</th>
						<th>Action</th>
					</tr>
					@foreach($projectAssign as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
							<td>{{ $value->name }}</td>
							<td>{{ $value->percent }}</td>
							<td>{{ Common::getDateTimeString($value->start) }}</td>
							<td>{{ Common::getDateTimeString($value->end) }}</td>
							<td>{{ CommonOption::getFieldTextByModel('ProjectStatus', $value->status, 'name') }}</td>
							<td>
								<a href="{{ action('ProjectController@accept', $value->id) }}" class="btn btn-success">Đồng ý</a>
								<a href="{{ action('ProjectController@refuse', $value->id) }}" class="btn btn-danger">Từ chối</a>
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			<hr />
			@endif

			@if(Common::checkPermissionUser(FUNCTION_CONTRACT, Config::get('button.manager_contract')))
			@if(count($contractExpired) > 0)
			<div class="box-body table-responsive">
				<h4>Hợp đồng sắp hết hạn</h4>
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
						<th>Tên hợp đồng</th>
						<th>Số hợp đồng</th>
						<th>Kiểu hợp đồng</th>
						<th>Kiểu gia hạn</th>
						<th>Action</th>
					</tr>
					@foreach($contractExpired as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
							<td>{{ $value->name }}</td>
							<td>{{ $value->code }}</td>
							<td>{{ CommonOption::getTypeContractText($value->type) }}</td>
							<td>{{ CommonOption::getTypeExtendContractText($value->type_extend) }}</td>
							@if($value->type_extend != TYPE_EXTEND_2)
								<td>
									<a href="{{ action('ContractController@adjourn', $value->id) }}" class="btn btn-primary">Gia hạn</a>
								</td>
								@else
									<td>
										<a href="{{ action('ContractController@index', $value->id) }}" class="btn btn-success">Xem</a>
									</td>
							@endif

						</tr>
					@endforeach
				</table>
			</div>
			@endif
			@endif

			@if(Common::checkPermissionUser(FUNCTION_ARCHIVE, Config::get('button.manager_archive')))
			@if(count($archive) > 0)
			<div class="box-body table-responsive">
				<h4>Công văn/giấy tờ mới</h4>
				<table class="table table-hover">
					<tr>
						<th>Tên</th>
						<th>Số</th>
						<th>Loại</th>
						<th>Ngày nhận</th>
						<th>Ngày gửi</th>
						<th>Ngày ban hành</th>
						<th>Ngày hiệu lực</th>
						<th>File</th>
						<th>Trạng thái</th>
						<th>Action</th>
					</tr>
					@foreach($archive as $key => $value)
						<tr>
							<td>{{ $value->name }}</td>
							<td>{{ $value->code }}</td>
							<td>{{ CommonOption::getArchiveTypeText($value->type) }}</td>
							<td>{{ Common::getDateTimeString($value->date_receive) }}</td>
							<td>{{ Common::getDateTimeString($value->date_send) }}</td>
							<td>{{ Common::getDateTimeString($value->date_promulgate) }}</td>
							<td>{{ Common::getDateTimeString($value->date_active) }}</td>
							<td><a href="{{ url(ARCHIVE_FILE_UPLOAD . '/' . $value->id . '/' .$value->file)}}">{{ $value->file }}</a></td>
							<td>{{ CommonOption::getArchiveStatusHandlingText($value->status) }}</td>
							<td>
								@if(Common::checkPermissionUser(FUNCTION_ARCHIVE, Config::get('button.archive_show')))
									<a href="{{ action('ArchiveController@show', $value->id) }}" class="btn btn-success">Xem</a>
								@endif
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			@endif
			@endif

		</div>
		<!-- /.box -->
	</div>
</div>
@stop

