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

	function assignTaskUser()
	{
		var taskUserKey = $('input[name^="taskUserKey"]').map(function () {
			return this.value;
		}).get();
		// var taskUserKey = $('input[name=taskUserKey]').val();
		// if(!taskUserKey) {
		// 	taskUserKey = [];
		// }
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/task/assignTaskUser") }}',
			data : {
				'taskUserKey' : taskUserKey,
			},
			beforeSend: function() {
	            $('.assignBtn').html('Đang load...');
	        },
			success: function(responseText)
			{
				$('.assignBtn').html('Thêm thành viên');
				// var object = document.getElementById("assignBox").childNodes[1];
				// object.innerHTML = responseText;
				$('#assignBox').append(responseText);
				// taskUserKey++;
				// $('input[name=taskUserKey]').val(taskUserKey);
			}
		});
	}

	function removeAssignTaskUser(taskUserKey)
	{
		$('#assignRow_'+taskUserKey).remove();
	}

</script>