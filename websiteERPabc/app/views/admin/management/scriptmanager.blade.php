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
	function assignFunUser()
	{
		var departmentUserKey = $('input[name=departmentUserKey]').val();
		if(!departmentUserKey) {
			departmentUserKey = 0;
		}
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/management/assignFunPerUser") }}',
			data : {
				'departmentUserKey' : departmentUserKey,
			},
			beforeSend: function() {
				$('.assignBtn').html('Đang load...');
			},
			success: function(responseText)
			{
				$('.assignBtn').html('Thêm phòng ban');
				$('#assignBoxFun').append(responseText);
				loadButton(departmentUserKey);
				departmentUserKey++;
				$('input[name=departmentUserKey]').val(departmentUserKey);
			}
		});
	}
	function removeAssignProjectUser(projectUserKey)
	{
		$('#assignRow_'+projectUserKey).remove();
	}
	function loadButton(projectUserKey)
	{
		var fun_id = $('#fun_id_'+projectUserKey).val();
		$.ajax({
			type: 'POST',
			data: {
				'fun_id': fun_id
			},
			url: '{{ url("admin/management/loadButton") }}',
			success:function(data) {
				console.log(data);
				$('#button_id_'+projectUserKey).empty();
					$.each(data ,function(index, value){
						$('#button_id_'+projectUserKey).append('<option value="'+ index+'" >'+value+'</option>');
				});
			}
		});	
	}

</script>