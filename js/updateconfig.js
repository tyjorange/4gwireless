$(document).ready(
		function() {$.ajax({
			type : 'POST',
			url : 'ph/deviceinfo.php',
			dataType : 'json',
			success : function(data) {
				var tbody = $('tbody');
				var str = "";
				str =   
					"<tr><td>产品标识：</td><td>" + data.ID + "</td></tr><tr><td>设备型号：</td><td>"
					 + data.DESC + "</td></tr><tr><td>版本号：</td><td>"
					 + data.VERSION + "</td></tr><tr><td>公司：</td><td>"
					 + data.COMPANY + "</td></tr>";
				$('tbody').append(str);
			}
		});
	});
