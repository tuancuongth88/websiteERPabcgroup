@extends('admin.layout.default')

@section('title')
{{ $title='Đề xuất lương theo thời gian' }}
@stop
@section('content')
@include('admin.salary.before.search')

{{ Form::open(array('action' => 'SalaryBeforeController@create', 'method' => 'GET')) }}
<div class="row margin-bottom">
	<div class="col-xs-12">
	{{ Form::submit('Gửi đề xuất nhân viên được chọn', array('class' => 'btn btn-primary')) }}
	</div>

</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sách lương nhân viên</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th><input type="checkbox" id="checkall" name="checkall" onClick="toggle(this)" /></th>
						<th>ID</th>
						<th>Tên nhân viên</th>
						<th>Mức lương</th>
						<th>Action</th>
					</tr>
					@foreach($data as $value)
					<tr>
						<td><input type="checkbox" class="history_id" name="history_id[]" value="{{ $value->id }}"/></td>
						<td>{{ $value->id }}</td>
						<td>{{ CommonSalary::getNameUserDate($value)}}</td> 
						<td>{{ CommonSalary::getSalaryUserDate($value) }} 
						</td>
						<td>
							<a href="{{ action('SalaryBeforeController@edit', $value->id) }}" class="btn btn-primary">Gửi đề xuất</a>
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
@include('admin.salary.before.script')
{{ Form::close() }}
@stop

