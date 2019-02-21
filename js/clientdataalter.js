$(document).ready(function() {
	var select = $("#modeselect");
	var divc = $("#centerinfo");
	var btn = $(".btn-primary");
	$.ajax({
		type : 'POST',
		url : 'ph/clientmodeget.php',
		dataType : 'json',
		success : function(data) {
			select.val(data[0].MODE)
			$("#serip").val(data[0].SYSSRVIP)
			$("#serport").val(data[0].SYSSRVPORT)
			$("#encrypt").val(data[0].ENCRYPT)
			if (select.val() == 0) {
				divc.hide();
			}
		}
	});
	select.on('change', function() {
		var val = select.val();
		if (val == 1) {
			divc.show();
		} else {
			divc.hide();
		}
	})
	btn.on('click', function() {
		validate()
	})
});
function validate() {
	var url = 'ph/clientmodealter.php';
	var mode = $("#modeselect").val();
	var serip = $("#serip").val();
	var serport = $("#serport").val();
	var encrypt = $("#encrypt").val();
	if (serip.length = 0 || !checkipinput(serip)) {
		alert("中心服务器IP输入有误，请重新输入！如：192.168.0.0");
		return false;
	} else if (serport.length = 0 || !checkportinput(serport)) {
		alert("中心服务器端口号输入有误！请输入合法端口号（1-65535）");
		return false;
	} else {
		var cont = {
			encrypt : encrypt,
			mode : mode,
			serip : serip,
			serport : serport
		};
		$.post(url, cont, function(data) {
			var res = eval("(" + data + ")");
			alert(res.info);
			location.reload();
		});
		return true;
	}
};