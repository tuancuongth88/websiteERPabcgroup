@extends('admin.layout.default')

@section('title')
{{ $title='Danh sach de xuat lương cong ty' }}
@stop
@section('content')
@include('admin.salary.search')
<div class="row margin-bottom">
	<div class="col-xs-12">
	<a href="{{ action('SalaryUserController@createAll') }}" class="btn btn-primary">Đề xuất lương công ty</a>
	</div>

</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Danh sach de xuat lương cong ty</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
				<table class="table table-hover">
					<tr>
						<th>ID</th>
						<th>Phong ban</th>
						<th>Chuc vu</th>
						<th>ly do</th>
						<th>Up and Down</th>
						<th>phan tram</th>
						<th>Action</th>
					</tr>
					@foreach($data as $key => $value)
					<tr>
						<td>{{ $value->id }}</td>
						@if($value->model_name == 'Department')
							<td>
								{{ CommonSalary::getDepAndRegency($value->model_name, $value->model_id) }}
							</td>
						@else
							<td></td>
						@endif
						@if($value->model_name == 'Regency')
							<td>
								{{ CommonSalary::getDepAndRegency($value->model_name, $value->model_id) }}
							</td> 
						@else
							<td></td>
						@endif
						<td>{{ $value->note_user_update }} </td>
						<td>{{ CommonSalary::getUpAndDown($value) }}</td>
						<td> {{ $value->percent }} </td>
						<td> 
						<a href="{{ action('ProposeSalaryListController@show', $value->id) }}" class="btn btn-primary">View</a>
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

