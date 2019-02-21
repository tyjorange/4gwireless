function alterpsw() {
	var oldpsw = document.getElementById("oldpsw").value;
	var newpsw = document.getElementById("newpsw").value;
	var newpswtoo = document.getElementById("newpswtoo").value;
	if (oldpsw.length == 0) {
		alert("原密码为空！");
		return false;
	} else if (newpsw.length == 0) {
		alert("新密码为空！");
		return false;
	} else if (newpsw != newpswtoo) {
		alert("两次密码输入不一致！");
		return false;
	} else {
		var cont = {
			oldpsw : $("input")[0].value,
			newpsw : $("input")[1].value,
			newpswtoo : $("input")[2].value
		};
		var url = 'ph/pswupdate.php';
		$.post(url, cont, function(data) {
			var res = eval("(" + data + ")");
			if (res.info == 1) {
				alert("修改成功，请重新登陆！");
				self.location = 'login.php';
			} else if (res.info == 0) {
				alert("修改失败，请重新登陆！");
				self.location = 'login.php';
			} else {
				alert(res.info);
				return false;
			}
		});
	}
};

