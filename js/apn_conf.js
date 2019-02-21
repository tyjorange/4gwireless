var btn = $(".btn-primary");
var text1 = $("#apnconf");
var text2 = $("#apnuser");
var text3 = $("#apnpass");
$(document).ready(function() {
	$.ajax({
		type : 'POST',
		dataType : 'json',
		url : 'ph/apn_conf_sh.php',
		success : function(data) {
//			alert(data);
			text1.val(data[0]);
			text2.val(data[1]);
			text3.val(data[2]);
		}
	})
	btn.on('click', function() {
		$.ajax({
			type : 'POST',
			data : {
				apn : text1.val(),
				user : text2.val(),
				pass : text3.val()
			},
			dataType : 'json',
			url : 'ph/apn_conf_sh.php',
			success : function(data) {
				if (data == "1") {
					alert("修改成功");
				} else {
					alert("修改失败");
				}
			}
		})
		$(this).blur();
	})
})