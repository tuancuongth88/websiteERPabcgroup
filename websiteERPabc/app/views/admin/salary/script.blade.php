<script>
	$(document).ready(function () {
		searchName();
	});
	function searchName() {
		var user =[
					@foreach($data as $value)
						{{ "'".$value['username']."'"."," }}
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
</script>