<script type="text/javascript">
	
	function toggle(source) {
		checkboxes = document.getElementsByName('salary_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}

	function ApproveSelected()
	{
		var check = $('input:checkbox:checked.salary_id').val();
		if(check) {
			callApproveSelected();
		} else {
			alert('Chọn người cần phê duyệt!');
		}
	}

	function callApproveSelected()
	{
		confirm = confirm('Bạn có chắc chắn muốn phê duyệt lương cho những người này?')
		if(confirm) {
			var values1 = $('input:checkbox:checked.salary_id').map(function () {
			  	return this.value;
			}).get();
			var tmp = false;
			if($("#checkall").is(':checked'))
			{
				tmp = true;
			}
			$.ajax(
			{
				type:'post',
				url: '{{ url("/admin/salary/approve_salary_manager/approveSalarySelect") }}',
				data:{
					'salary_id': values1,
					'checkAll' : tmp
				},               
				success: function(data)
				{
					console.log(data);
					if(data) {
						window.location.reload();
					}
				}
			});
		} else {
			window.location.reload();
		}
	}

	function RejectSelected()
	{
		var check = $('input:checkbox:checked.salary_id').val();
		if(check) {
			callRejectSelected();
		} else {
			alert('Chọn người cần bỏ duyệt!');
		}
	}

	function callRejectSelected()
	{
		confirm = confirm('Bạn có chắc chắn muốn bỏ duyệt những người này?')
		if(confirm) {
			var values1 = $('input:checkbox:checked.salary_id').map(function () {
			  	return this.value;
			}).get();
			var tmp = false;
			if($("#checkall").is(':checked'))
			{
				tmp = true;
			}
			$.ajax(
			{
				type:'post',
				url: '{{ url("/admin/salary/approve_salary_manager/rejectSalarySelect") }}',
				data:{
					'salary_id': values1,
					'checkAll' : tmp
				},
				success: function(data)
				{
					console.log(data);
					if(data) {
						window.location.reload();
					}
				}
			});
		} else {
			window.location.reload();
		}
	}
</script>