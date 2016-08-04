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

	function assignProjectUser()
	{
		var projectUserKey = $('input[name^="projectUserKey"]').map(function () {
			return this.value;
		}).get();
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/project/assignProjectUser") }}',
			data : {
				'projectUserKey' : projectUserKey,
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
				// projectUserKey++;
				// $('input[name=projectUserKey]').val(projectUserKey);
			}
		});
	}

	function removeAssignProjectUser(projectUserKey)
	{
		$('#assignRow_'+projectUserKey).remove();
	}

</script>

<script type="text/javascript">
	if(!window.Notification){
		alert('Trình duyệt không hỗ trợ thông báo! Để sử dụng đầy đủ tính năng của website bạn vui lòng chuyển sang trình duyệt khác để sử dụng.');
	}else
	{
		Notification.requestPermission(function(p){
			console.log(p);
			if(p === 'denied'){
				alert('Bạn vui lòng bật thông báo trình duyệt.');
			}
		});
		
	}

	//show message
	var notify;
	if(Notification.permission === 'default') {
		alert('Bạn vui lòng bật thông báo trình duyệt.');
	}else{
		notify = new Notification('Thông báo mới cho TuanCuong', {
			body: 'Hôm nay bạn nhặt được rất nhiều tiền!',
			icon: 'image/logo.png',
			tag: 'Success!'
		});
		notify.onclick = function(){
			window.location = '?ntc=' + this.tag;
		}
	}
</script>