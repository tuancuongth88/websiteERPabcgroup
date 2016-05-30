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
		var functionKey = $('input[name^="functionKey"]').map(function () {
			return this.value;
		}).get();
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/management/assignFunPerUser") }}',
			data : {
				'functionKey' : functionKey,
			},
			beforeSend: function() {
				$('.assignBtn').html('Đang load...');
			},
			success: function(responseText)
			{
				console.log(responseText);
				$('.assignBtn').html('Thêm chức năng');
				$('#assignBoxFun').append(responseText);

				var functionKeys = $('input[name^="functionKey"]').map(function () {
					return this.value;
				}).get();
				maxFunctionKey = Math.max.apply(null, functionKeys) ;
				loadButton(maxFunctionKey);
			}
		});
	}
	function removeAssignFuction(projectUserkey)
	{
		$('#assignRow_'+projectUserkey).remove();
	}
	function loadButton(functionKey)
	{
		var fun_id = $('#fun_id_'+functionKey).val();
		$.ajax({
			type: 'POST',
			data: {
				'fun_id': fun_id
			},
			url: '{{ url("admin/management/loadButton") }}',
			success:function(data) {
				console.log(data);
				$('#button_id_'+functionKey).empty();
					$.each(data ,function(index, value){
						$('#button_id_'+functionKey).append('<option value="'+ index+'" >'+value+'</option>');
				});
			}
		});	
	}

</script>