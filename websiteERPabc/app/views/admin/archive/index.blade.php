@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý công văn - giấy tờ' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ArchiveController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>

@include('admin.archive.search')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách dự án</h3>
				<span> (Tổng số: {{ $data->getTotal() }})</span>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<!-- <th>ID</th> -->
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
					@foreach($data as $key => $value)
						<tr>
							<!-- <td>{{-- $value->id --}}</td> -->
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
								<a href="{{ action('ArchiveController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
								{{ Form::open(array('method'=>'DELETE', 'action' => array('ArchiveController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
									<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
								{{ Form::close() }}
							</td>
						</tr>
					@endforeach
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
			<!-- phan trang -->
			{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>
@stop
