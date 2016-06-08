<style>
	.assign td,
	.assign th {
		padding: 5px;
	}
	a.assignBtn {
		cursor: pointer;
	}
	a.removeAssignBtn {
		color: #e00;
		cursor: pointer;
	}
</style>
<script>
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