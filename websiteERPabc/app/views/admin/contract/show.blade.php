@extends('admin.layout.default')

@section('title')
{{ $title='Lịch sử quản lý hợp đồng' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('ContractController@index') }}" class="btn btn-primary">Quay lại</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách lịch sử hợp đồng</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên hợp đồng</th>	
						<th>Số hợp đồng</th>
						<th>Nội dung tóm tắt</th>
						<th>Kiểu hợp đồng</th>
						<th>Ngày ký</th>
						<th>Ngày hết hạn</th>
						<th>Ngày hết hạn mới</th>
						<th>kiểu gia hạn</th>
						<th>File</th>
						<th>Trang thái</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->code }}</td>
						<td>{{ $value->description }}</td>
						<td>{{ CommonOption::getTypeContractText($value->type) }}</td>
						<td>{{ $value->date_sign }}</td>
						<td>{{ $value->date_expired_old }}</td>
						<td>{{ $value->date_expired_new }}</td>
						<td>{{ CommonOption::getTypeExtendContractText($value->type_extend) }}</td>
						<td><a href="{{ url(CONTRACT_FILE_UPLOAD . '/' . $value->id . '/' .$value->file)}}">{{ $value->file }}</a></td>
						<td>{{ CommonOption::getStatusContractText($value->status) }}</td>
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


