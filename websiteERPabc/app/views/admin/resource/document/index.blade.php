@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tài liệu' }}
@stop

@section('content')
@include('admin.resource.document.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('DocumentResourceController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách tài liệu</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên tài liệu</th>	
						<th>Số</th>	
						<th>Ngày nhận</th>	
						<th>Ngày gửi</th>	
						<th>Ngày ban hành</th>	
						<th>Ngày hiệu lực</th>
						<th>Mô tả</th>
						<th>File</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->code }}</td>
						<td>{{ $value->date_receive }}</td>
						<td>{{ $value->date_send }}</td>
						<td>{{ $value->date_promulgate }}</td>
						<td>{{ $value->date_active }}</td>
						<td>{{ $value->description }}</td>
						<td><a href="{{ url(DOCUMENT_FILE_UPLOAD . '/' . $value->id . '/' .$value->file)}}">{{ $value->file }}</a></td></td>
						<td>
							<a href="{{ action('DocumentResourceController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('DocumentResourceController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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

