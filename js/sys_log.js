$(document).ready(
		function() {
			var select = $("#datas");
			var td = $("#download_btn");
			logdayget();
			$.ajax({
				type : 'POST',
				url : 'ph/sys_log.php',
				dataType : 'json',
				success : function(data) {
					$.each(data, function(idx, obj) {
						// obj = obj.replace(/\s+/g, "()");
						select.append("<option value=" + obj.split(".")[0]
								+ ">" + obj.split(".")[0] + "</option>");
					});
					showlog($("#datas").val());
					td.append("<a class='btn btn-primary' href='ph/sys_log_download.php?day=" + select.val() + "'>下载日志</a>");
					select.on('change', function() {
						showlog(select.val());
						td.empty();
						td.append("<a class='btn btn-primary' href='ph/sys_log_download.php?day=" + select.val() + "'>下载日志</a>");
					})
				}
			});
			$("#submit").bind("click", function() {
				$.ajax({
					type : 'POST',
					url : 'ph/sys_log.php',
					dataType : 'json',
					data : {
						logday : $("#logday").val()
					},
					success : function(data) {
						if (data == 1) {
							alert("修改成功");
						} else {
							alert("修改失败");
						}
					}
				});
				$(this).blur();
			});
		});
function showlog(logname) {
	$.ajax({
		type : 'POST',
		url : 'ph/sys_log.php',
		dataType : 'json',
		data : {
			data : logname
		},
		success : function(data) {
			var area = $("#logarea");
			var str = '';
			area.css("overflow", "visible");
			area.css("overflown-y", "scroll");
			area.attr("readonly", "readonly");
			$.each(data, function(idx, obj) {
				str += obj + "\n";
			});
			area.val(str);
		}
	});
}

function logdayget() {
	$.ajax({
		type : 'POST',
		url : 'ph/sys_log.php',
		dataType : 'json',
		data : {
			logdayget : "logdayget"
		},
		success : function(data) {
			$.each(data, function(idx, obj) {
				$("#logday").val(obj.LOGDAYS)
			});
		}
	});
}