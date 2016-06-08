<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$.getJSON('/salary/ajax/getUser', function(data) {
	tempJson = data;
	$("#tags").autocomplete({
	    minLength: 2,
	    dataType: 'json',
	    source: tempJson,
	    select: function (event,ui){
			$('input[name="user-id"]').val(ui.item.label);
			// $('input[name="your-hidden-field"]').val(ui.item.value);
			return false;
		}
	});
});

</script>
<!--  
<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="tags">
</div> -->
