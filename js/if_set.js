$(document).ready(function() {
	flush();
	$(".btn-primary").bind("click", function() {
		$.ajax({
			type : 'POST',
			url : 'ph/if_states.php',
			data : {
				LOCAL : $("#select1").val(),
				PPP : $("#select2").val()
			},
			success : function(data) {
				if (data == 1) {
					alert("修改成功");
				} else {
					alert("修改失败");
				}
				flush();
			}
		});
		$(this).blur();
		return false;
	});
});

function flush() {
	$.ajax({
		type : 'POST',
		dataType : 'json',
		url : 'ph/if_states_sh.php',
		success : function(data) {
			$("select").each(function() {
				$(this).empty();
				var sel = $(this);
				$.each(data, function(idx, obj) {
					sel.append("<option value="+ obj.split(" ")[0] +">" + obj.split(" ")[0] + "</option>");
				});
				$(this).append("<option>ppp0</option>");
				$.ajax({
					type : 'POST',	
					dataType : 'json',
					url : 'ph/if_states.php',
					success : function(data) {
						$.each(data, function(idx, obj) {
							$("#select1").val(obj.LOCAL);
							$("#select2").val(obj.PPP);
							$("span#s1").text("(当前设置:" + obj.LOCAL + ")");
							$("span#s2").text("(当前设置:" + obj.PPP + ")");
						});
					}
				});
			});
		}
	});
}
