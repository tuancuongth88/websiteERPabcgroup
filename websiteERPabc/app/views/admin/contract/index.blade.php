@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý hợp đồng' }}
@stop

@section('content')
@include('admin.contract.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('ContractController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách hợp đồng</h3>
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
						<th>Ngày hiệu lực</th>
						<th>kiểu gia hạn</th>
						<th>Trang thái</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->code }}</td>
						<td>{{ $value->description }}</td>
						<td>{{ CommonOption::getTypeContractText($value->type) }}</td>
						<td>{{ $value->date_active }}</td>
						<td>{{ CommonOption::getTypeExtendContractText($value->type_extend) }}</td>
						<td>{{ CommonOption::getStatusContractText($value->status) }}</td>
						<td>
							<a href="{{ action('ContractController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							{{ Form::open(array('method'=>'DELETE', 'action' => array('ContractController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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


