@extends('admin.layout.default')
@section('title')
{{ $title='Thêm mới báo cáo' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ReportController@index') }}" class="btn btn-success">Danh sách</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => 'ReportController@store')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Tên báo cáo</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('name', null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Thể loại</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::select('type_report_id', TypeReport::lists('name', 'id'), null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Nội dung</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => 5)) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Gửi đến</label>
						<div class="row">
							<div class="col-sm-12">
								<table class="assign" cellpadding="5px">
									<thead>
										<tr>
											<th>Thành viên</th>
										</tr>
									</thead>
									<tbody id="assignBox">
									</tbody>
								</table>
								<a onclick="assignReportUser()" class="assignBtn">Thêm thành viên</a>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
</div>
@include('admin.report.script')
@stop
