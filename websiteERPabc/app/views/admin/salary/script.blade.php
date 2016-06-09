
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
	$(document).ready(function () {
		searchName();
	});
	function searchName() {
		var user =[
					@foreach($data as $value)
						{{ "'".$value."'"."," }}
					@endforeach
				];
		$('#user_salary').autocomplete({
			source: user,
			minLength: 0,
			scroll: true
		}).focus(function () {
			$(this).autocomplete("search", "");
		});
	}
	function getDep()
	{
		user = document.getElementById('user_salary');
		username = user.value;
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/salary/ajax/getUser") }}',
			data : {
				'username' : username,
			},
			success: function(responseText)
			{
				$('#assignBox').append(responseText);
			}
		});
	}
	function getDetail()
	{
		// alert(33);
		user = document.getElementById('user_salary');
		username = user.value;
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/salary/ajax/getDetailUser") }}',
			data : {
				'username' : username,
			},
			success: function(responseText)
			{
				$('#getDetailUserBox').append(responseText);
			}
		});
	}
</script>