@extends('admin.layout.default')

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ProposeSalaryListController@index') }}" class="btn btn-success">Danh sách de xuat lương cty</a>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
			<div class="box-body">
				<div class="form-group">
					<label>Lý do</label>
					<div class="row">
						<div class="col-sm-6">
							{{  $data->note_user_update }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Chọn phòng ban hoặc chức vụ</label>
					<div class="row">
						<div class="col-sm-6">
						ten phong ban
						</div>
					</div>
				</div>
				<div id = "salary_normal_id"></div>
				<div class="form-group">
					<label>Ngày de xuat</label>
					<div class="row">
						<div class="col-sm-6">
				  			{{ $data->start_date }}
				  		</div>
				  	</div>
				</div>
				<div class="form-group">
					<label>Lựa chọn tăng hoặc giảm lương</label>
					<div class="row">
						<div class="col-sm-6">
						{{ $data->type_salary }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>phần trăm</label>
					<div class="row">
						<div class="col-sm-6">
							{{ $data->percent }}
						</div>
					</div>
				</div>
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
