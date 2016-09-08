@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý phụ lục' }}
@stop

@section('content')
<!-- @include('admin.contract.search') -->
<div class="row margin-bottom">
	<div class="col-xs-12">
	@if(Common::checkPermissionUser(FUNCTION_CONTRACT, Config::get('button.appendix_contract_add')))
		<a href="{{ action('ContractController@createAppendix', $id) }}" class="btn btn-primary">Thêm mới</a>
	@endif
	<a href="{{ action('ContractController@index') }}" class="btn btn-primary">Danh sach hợp đồng</a>
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
						<th>Tên phụ lục</th>	
						<th>Số phụ lục</th>
						<th>Nội dung tóm tắt</th>
						<th>Ngày ký</th>
						<th>Trang thái</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						<td>{{ $value->name }}</td>
						<td>{{ $value->code }}</td>
						<td>{{ $value->description }}</td>
						<td>{{ $value->date_sign }}</td>
						<td>{{ CommonOption::getStatusContractText($value->status) }}</td>
						<td>
							@if(Common::checkPermissionUser(FUNCTION_CONTRACT, Config::get('button.appendix_contract_edit')))
								<a href="{{ action('ContractController@editAppendix', $value->id) }}" class="btn btn-primary">Sửa</a>
								{{ Form::open(array('method'=>'DELETE', 'action' => array('ContractController@destroyAppendix', $value->id), 'style' => 'display: inline-block;')) }}
							@endif
							@if(Common::checkPermissionUser(FUNCTION_CONTRACT, Config::get('button.appendix_contract_show')))
								<a href="{{ action('ContractController@showAppendix', $value->id) }}" class="btn btn-success">Xem</a>
							@endif
							@if(Common::checkPermissionUser(FUNCTION_CONTRACT, Config::get('button.appendix_contract_delete')))
								<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
								{{ Form::close() }}
							@endif
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


