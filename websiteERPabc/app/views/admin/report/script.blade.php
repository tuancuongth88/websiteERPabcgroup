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

	function assignReportUser()
	{
		var reportUserKey = $('input[name^="reportUserKey"]').map(function () {
			return this.value;
		}).get();
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/report/assignReportUser") }}',
			data : {
				'reportUserKey' : reportUserKey,
			},
			beforeSend: function() {
	            $('.assignBtn').html('Đang load...');
	        },
			success: function(responseText)
			{
				console.log(responseText);
				$('.assignBtn').html('Thêm thành viên');
				// var object = document.getElementById("assignBox").childNodes[1];
				// object.innerHTML = responseText;
				$('#assignBox').append(responseText);
				// reportUserKey++;
				// $('input[name=reportUserKey]').val(reportUserKey);
			}
		});
	}

	function removeassignReportUser(reportUserKey)
	{
		$('#assignRow_'+reportUserKey).remove();
	}

</script>