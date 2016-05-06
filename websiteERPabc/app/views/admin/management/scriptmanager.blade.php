<style>
	.assign {
		
	}
	.assign td,
	.assign th {
		padding: 5px;
	}
	.assignBoxPermission input[type=checkbox] {
		vertical-align: text-top;
	}
	.assignBoxPermission label {
		margin-left: 10px;
		cursor: pointer;
	}
	.assignBtn {
		cursor: pointer;
	}
</style>
<script>
	(function($){
		
	})(jQuery);
	function assignDepartmentUser()
	{
		var departmentUserKey = $('input[name=departmentUserKey]').val();
		if(!departmentUserKey) {
			departmentUserKey = 0;
		}
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/management/assignDepartmentUser") }}',
			data : {
				'departmentUserKey' : departmentUserKey,
			},
			beforeSend: function() {
	            $('.assignBtn').html('Đang load...');
	        },
			success: function(responseText)
			{
				$('.assignBtn').html('Thêm phòng ban');
				console.log(responseText);
				$('#assignBox').append(responseText);
				departmentUserKey++;
				$('input[name=departmentUserKey]').val(departmentUserKey);
			}
		});
	}
	function removeAssignProjectUser(projectUserKey)
	{
		$('#assignRow_'+projectUserKey).remove();
	}

</script>