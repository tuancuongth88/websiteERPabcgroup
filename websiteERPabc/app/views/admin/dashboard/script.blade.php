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
	function showNotification()
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
			notify = new Notification('Bạn có '+ {{ Session::get('countNotification') }}+ ' thông báo', {
				body: 'Click vào đây để xem chi tiết các thông báo!' ,
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

     function refresh() {
         	 showNotification();
         if(new Date().getTime() - time >= 60000) 
         {
             window.location.reload(true);
         }
         else 
             setTimeout(refresh, 10000);
     }

     setTimeout(refresh, 10000);
</script>
