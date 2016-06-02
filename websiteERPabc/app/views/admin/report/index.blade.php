@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý báo cáo' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ReportController@create') }}" class="btn btn-primary">Thêm mới</a>
	</div>
</div>
@include('admin.report.search')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách báo cáo</h3>
				<span> (Tổng số: {{ count($data) }})</span>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Tên báo cáo</th>
						<th>Thể loại</th>
						<th>Người báo cáo</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
						<tr>
							<td>{{ $value->id }}</td>
							<td>{{ $value->name }}</td>
							@if($typeReport = TypeReport::find($value->type_report_id))
								<td>{{ $typeReport->name }}</td>
							@else
								<td>Chưa có thể loại báo cáo</td>
							@endif
							<td>{{ User::find($value->user_id)->username }}</td>
							<td>
								<a href="{{ action('ReportController@show', $value->id) }}" class="btn btn-primary">View</a>
								@if(User::isAdmin() == ROLE_ADMIN)
								{{ Form::open(array('method'=>'DELETE', 'action' => array('ReportController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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

