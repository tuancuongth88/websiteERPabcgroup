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
	function showNotification($data, $number)
	{
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
		var notify;
		if(Notification.permission === 'default') {
			alert('Bạn vui lòng bật thông báo trình duyệt.');
		}else{
			notify = new Notification('Bạn có '+ $number+ ' thông báo', {
				body: $data ,
				icon: '../image/alert.png',
				tag: '#'
			});
			notify.onclick = function(){
				window.location = '?ntc=' + this.tag;
			}
		}
	}
</script>
<script>

	var time = new Date().getTime();
	$(document.body).bind("mousemove keypress", function(e) {
		 time = new Date().getTime();
	});
	showNotification("Click vào đây để xem nội dung chi tiết!", {{ Session::get('countNotification') }});
	function refresh() {
		//alert(99);
		getNotification();
		if(new Date().getTime() - time >= 6000) 
		{
		}
		else 
			setTimeout(refresh, 5000);
	 }

	setTimeout(refresh, 5000);
	function getNotification()
	{
		$.ajax(
		{
			type : 'post',
			url : '{{ url("admin/dashboard/getNotification") }}',
			success: function(responseText)
			{
				if(responseText % 2 != 0){
					var number = Math.floor(responseText / 2 + 1)
					showNotification("Click vào đây để xem nội dung chi tiết!", number);
				}
			}
		});
	}
</script>
