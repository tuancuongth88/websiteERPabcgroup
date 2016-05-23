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
	$(function () {
	  loadRegency();
	});
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
	function loadRegency(projectUserKey)
	{
		var dep_id = $('select[name^="dep_id"]').map(function () {
			return this.value;
		}).get();
			$.ajax({
				type: 'POST',
				data: {
					dep_id:dep_id
				},
				url: '{{ url("admin/management/loadRegency") }}',
				success:function(data) {
				$('select[name^="regency_id"]').empty();
					$.each(data ,function(index, value){
						$('select[name^="regency_id"]').append('<option value="'+ index+'" >'+value+'</option>');
					});
				}
			});	
	}
</script>