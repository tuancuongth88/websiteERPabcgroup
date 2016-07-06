@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới mức lương phong ban hoac chuc vu' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ProposeSalaryListController@index') }}" class="btn btn-success">Danh sách lương</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			{{ Form::open(array('action' => 'SalaryUserController@storeAll')) }}
				<div class="box-body">
					<div class="form-group">
						<label>Lý do</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::textarea('note_user_update', null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Chọn phòng ban hoặc chức vụ</label>
						<div class="row">
							<div class="col-sm-6">
							{{ Form::select('type_dep_regency', CommonSalary::getTypeDepRegency(), null, array('class' => 'form-control', 'onchange' => 'changeTypeSalary()')) }}
							</div>
						</div>
					</div>
					<div id = "salary_normal_id"></div>
					<div class="form-group">
						<label>Ngày de xuat</label>
						<div class="row">
							<div class="col-sm-6">
					  			<input type="text" name="start_date" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
					  		</div>
					  	</div>
					</div>
					<div class="form-group">
						<label>Lựa chọn tăng hoặc giảm lương</label>
						<div class="row">
							<div class="col-sm-6">
							{{ Form::select('type_salary', CommonSalary::getTypeUpDow(), null, array('class' => 'form-control')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>phần trăm</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('percent', null, array('class' => 'form-control')) }}
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
<script type="text/javascript">
	(function($){
		
	})(jQuery);

	function changeTypeSalary()
	{
		var type_salary_id = $('select[name^="type_dep_regency"]').val();
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/salary/getFormatTypeSalary") }}',
			data : {
				'type_dep_regency' : type_salary_id,
			},
			success: function(responseText)
			{
				console.log(responseText);
				// var a = document.getElementById('url_format_type_report');
				// a.href = responseText;
				$('#salary_normal_id').html(responseText);
			}
		});
	}
</script>
@stop
