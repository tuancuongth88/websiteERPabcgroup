@extends('admin.layout.default')

@section('title')
{{ $title='Gửi đề xuất lương theo thời gian' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('SalaryBeforeController@index') }}" class="btn btn-success">Danh sách lương</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<a onclick="sendSalaryApprove();" class="btn btn-primary">Gửi tất cả</a>
		<div class="box box-primary">
			@include('admin.salary.before.salary_before_normal')
		</div>
	</div>
</div>

@stop
