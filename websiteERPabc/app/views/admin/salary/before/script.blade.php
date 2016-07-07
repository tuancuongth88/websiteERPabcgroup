<script type="text/javascript">
	
	function toggle(source) {
		checkboxes = document.getElementsByName('history_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}


    function sendSalarypropose()
    {
        confirm = confirm('Bạn có chắc chắn muốn gửi đề xuất cho những người này?')
        if(confirm){
            	var values1 = $('input:checkbox:checked.history_id').map(function () {
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
				url: '{{ url("admin/salary/before/proposeSalary") }}',
				data:{
					'history_id': values1,
					'checkAll' : tmp
				},               
				success: function(data)
				{		
					console.log(data);			
					if(data) {
					   
					}
				}
			});
        }else {
			window.location.reload();
		}
    }
</script>