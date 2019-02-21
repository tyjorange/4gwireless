$(document).ready(function() {
	$("#submit").unbind().bind("click", function() {
		$.ajax({
			type : 'POST',
			url : 'ph/check_login.php',
			data : {
				username : $("input#username").val(),
				password : $("input#password").val()
			},
			success : function(data) {
				if (data == 1) {
					location.href = "net_state.php";
				} else {
					$("#info").text("用户名或密码错误!");
				}
			}
		});
		return false;
	});
	$("#username").focus();
});
