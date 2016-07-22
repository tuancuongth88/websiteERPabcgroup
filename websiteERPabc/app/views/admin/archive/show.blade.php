@extends('admin.layout.default')
@section('title')
{{ $title='Xem công văn giấy tờ' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ArchiveController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<div class="box-body">
				<table class="table">
					<tr>
						<td width="20%">
							<label>Tên công văn/giấy tờ</label>
						</td>
						<td>
							{{ $data->name }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Số công văn/giấy tờ</label>
						</td>
						<td>
							{{ $data->code }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Loại công văn/giấy tờ</label>
						</td>
						<td>
							{{ $data->type }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Ngày nhận</label>
						</td>
						<td>
							{{ $data->date_receive }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Ngày gửi</label>
						</td>
						<td>
							{{ $data->date_send }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Ngày ban hành</label>
						</td>
						<td>
							{{ $data->date_promulgate }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Ngày hiệu lực</label>
						</td>
						<td>
							{{ $data->date_active }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Mô tả</label>
						</td>
						<td>
							{{ $data->description }}
						</td>
					</tr>
					<tr>
						<td>
							<label>File đính kèm</label>
						</td>
						<td>
							<a href="{{ url(ARCHIVE_FILE_UPLOAD . '/' . $data->id . '/' .$data->file)}}">Xem file đính kèm - {{ $data->file }}</a>
						</td>
					</tr>
					<tr>
						<td>
							<label>Đối tác</label>
						</td>
						<td>
							{{ CommonOption::getFieldTextByModel('Partner', $data->partner_id, 'name') }}
						</td>
					</tr>
					<tr>
						<td>
							<label>Trạng thái</label>
						</td>
						<td>
							{{ CommonOption::getArchiveStatusHandlingText($data->status) }}
						</td>
					</tr>

				</table>
				
				@if(count($archiveUser) > 0)
				<div class="form-group">
					<h3>Thành viên</h3>
					<div class="row">
						<div class="col-sm-12">
							<table class="assign table" cellpadding="5px">
								<thead>
									<tr>
										<th width="20%">Thành viên</th>
										<th>Chức năng</th>
									</tr>
								</thead>
								<tbody id="assignBox">
								@foreach($archiveUser as $value)
									<tr>
										<td>
											{{ CommonOption::getFieldTextByModel('User', $value->user_receive, 'username') }}
										</td>
										<td>
											{{ CommonOption::getArchiveFunctionText($value->fun_id) }}
										</td>
									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
				@endif
			</div>

		</div>
	</div>
</div>
@include('admin.archive.script')
@stop
