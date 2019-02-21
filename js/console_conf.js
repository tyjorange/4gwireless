var btn = $(".btn-primary");
$(document).ready(function() {
	$.ajax({
		type : 'POST',
		dataType : 'json',
		url : 'ph/console_conf_sh.php',
		success : function(data) {
			$("#ipaddr").val(data[0])
			$("#netmask").val(data[1])
			$("#gateway").val(data[2])
		}
	})
	btn.on('click', function() {
		validate()
	})
})
function validate() {
	var ipaddr = $("#ipaddr").val();
	var netmask = $("#netmask").val();
	var gateway = $("#gateway").val();
	if (ipaddr.length = 0 || !checkipinput(ipaddr)) {
		alert("IP地址输入有误，请重新输入！如：192.168.1.100");
		btn.blur()
		return false;
	} else if (netmask.length = 0 || !checkipinput(netmask)) {
		alert("子网掩码输入有误，请重新输入！如：255.255.255.0");
		btn.blur()
		return false;
	}
	// else if (gateway.length = 0 || !checkipinput(gateway)) {
	// alert("默认网关输入有误，请重新输入！如：192.168.1.1");
	// btn.blur()
	// return false;
	// }
	else {
		if (confirm("修改CONSOLE IP设置后 系统将会自动重启，是否继续修改？")) {
			$.ajax({
				type : 'POST',
				url : 'ph/console_conf_sh.php',
				dataType : 'json',
				data : {
					ipaddr : ipaddr,
					netmask : netmask,
					gateway : gateway
				},
				success : function(data) {
					if (data == "1") {
//						alert("修改成功！即将重启");
						location.href = "reboot.php";
					} else {
						alert("修改失败！");
					}
					btn.blur()
				}
			})
			return true;
		} else {
			btn.blur()
			return false;
		}
	}
};