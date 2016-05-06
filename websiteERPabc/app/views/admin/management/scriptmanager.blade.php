<script type="text/javascript">
	
	//function add row on form create

	var count = 0;
	function myFunction() {
		count ++;
		var table = document.getElementById("myTable");
		var row = table.insertRow(1+count);
		var cell1 = row.insertCell(0);
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		cell1.innerHTML = getOptionDepartment();
		cell2.innerHTML = "NEW CELL2";
		cell3.innerHTML = "NEW CELL2";
		cell4.innerHTML = "NEW CELL3";
	}
	function getOptionDepartment(){
		var options = document.getElementById('department_selectbox').options;
		var htmltd = "<td class=\"col-sm-2\">";
		htmltd += "<select class=\"form-control\" name=\"dep_id["+count+"]\">";
		var values = [];
		var i = 0, len = options.length;
		while (i < len)
		{
		  values.push(options[i++].text);
		  var name = options[i++].text;
		  var valueDetartment = options[i++].value;
		}
		for (var i = 0; i <= values.length; i++) {
		  htmltd += "<option value="+values[i]+">"+values[i]+"</option>"
		}
		htmltd += "</td>";


		// var i;
		// var listDepartment = document.getElementsByName('dep_id[]').options;;
		
		// 	htmltd += "<select class=\"form-control\" name=\"dep_id["+count+"]\">";
		// 	for ( i=0; i <= listDepartment.length; i++) 
		// 	{
		// 		alert(listDepartment.options[i].text);
		// 		// htmltd += "<option value="+sel.options[i].value+">"+listDepartment.options[i].text+"</option>"
		// 	}
		// 	htmltd += "</select>";
			
		return htmltd;
	}

</script>