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

	function assignArchiveUser()
	{
		var archiveUserKey = $('input[name^="archiveUserKey"]').map(function () {
			return this.value;
		}).get();
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/archive/assignArchiveUser") }}',
			data : {
				'archiveUserKey' : archiveUserKey,
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
				// archiveUserKey++;
				// $('input[name=archiveUserKey]').val(archiveUserKey);
			}
		});
	}

	function removeAssignArchiveUser(archiveUserKey)
	{
		$('#assignRow_'+archiveUserKey).remove();
	}

</script>