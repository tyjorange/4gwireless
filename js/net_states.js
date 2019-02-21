$(document).ready(function(){
			timeflush();
			setInterval("timeflush()", 3000)
});

function timeflush(){
	$.ajax({
		type : 'POST',
		url : 'ph/net_sta.php',
		dataType : 'json',
		success : function(data) {
			var tbody = $('tbody');
			var str = "";
			if(data.length > 0){
				$.each(data,function(idx, obj) {
					str += "<tr><td>"
						+ obj.IFNAME
						+ "</td><td>"
						+ obj.MAC
						+ "</td><td>"
						+ obj.IP
						+ "</td><td>"
						+ obj.NETMASK
						+ "</td><td>"
						+ obj.BYTES_R
						+ "</td><td>"
						+ obj.BYTES_T
						+ "</td></tr>";
				});
			}else{
				str += "<tr><td style='text-align: center;' colspan='6'>无数据</td></tr>";
			}
			$('tbody').empty();
			$('tbody').append(str);
		}
	});
	//alert("flush ok");
}
