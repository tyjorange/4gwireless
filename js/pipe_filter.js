$(document).ready(function(){
	tableflush();
	$.ajax({
		type : 'POST',
		url : 'ph/pipe_mode_get.php',
		dataType : 'json',
		success : function(data) {
			$("#PORT").val(data[0].PORT);
			var mode = data[0].MODE;
			if (mode == "1") {
				$("#select").val("服务端");
			} else {
				$("#select").val("客户端");
			}
		}
	});
});
$('#submit').each(function() {
	$(this).bind("click", function() {
		var idx;
		var portVar = $("#PORT").val();
		if ($("#select").val() == "服务端") {
			idx = 1;
		} else {
			idx = 0;
		}
		if(checkportinput(portVar)){
			$.ajax({
				type : 'POST',
				url : 'ph/pipe_mode_set.php',
				dataType : 'json',
				data : {
					MODE : idx,
					PORT : portVar
				},
				success : function(data) {
					if (data == 1) {
						alert("修改成功");
					} else {
						alert("修改失败");
					}
					tableflush();
				}
			});
		}else{
			alert("端口号输入有误！请输入合法端口号（1-65535）");
		}
		$(this).blur();
		return false;
	});
});
function tableflush() {
	$.ajax({
		type : 'POST',
		url : 'ph/pipe_filter_set.php',
		data : {CH:"ch"},
		success : function(data) {
			$("#span1").text(data);
		}
	});
	$.ajax({
		type : 'POST',
		url : 'ph/pipe_filter_get.php',
		dataType : 'json',
		success : function(data) {
			var tr = "";
			var ip;
			if(data.length > 0){
				$.each(data,function(idx, obj) {
					tr += "<tr><td>"
						+ "<a class='btn btn-danger' name="+obj.CHNID+" href='#'><i class='icon-trash'></i></a>"
						+ "</td><td>"
						+ obj.PEERIP 
						+ "</td><td>";
					//------------------------------------------------
					if (obj.FLTMODE == 1) {
						tr += "<button name="+obj.CHNID+" class='btn btn1 btn-small btn-warning' value='1'>允许方式</button>"
					} else {
						tr += "<button name="+obj.CHNID+" class='btn btn1 btn-small' value='0'>禁止方式</button>"
					}
					//------------------------------------------------
					if (obj.FLTFLAG == 1) {
						tr += "</td><td>"
							+ "<button name="+obj.CHNID+" class='btn btn2 btn-small btn-warning' value='1'>已启用</button>"
//							+ "<button name="+obj.CHNID+" class='mwui-switch-btn mwui-switch-btn-off' value='1'>"
//							+ "<span class=''>&nbsp</span></button>"
							+ "</td><td>"
					} else {
						tr += "</td><td>"
							+ "<button name="+obj.CHNID+" class='btn btn2 btn-small' value='0'>未启用</button>"
//							+ "<button name="+obj.CHNID+" class='mwui-switch-btn' value='0'>"
//							+ "<span class='off'>&nbsp</span></button>"
							+ "</td><td>"
					}
					tr += "<a class='btn btn-success' href='filterconfig.php?id="+obj.CHNID+"'><i class='icon-edit'></i></a>" + "</td></tr>";
				});
			} else {
				tr += "<tr><td style='text-align: center;' colspan='5'>没有通道，请新增通道</td></tr>";
			}
			$('tbody#na1').empty();
			$('tbody#na1').append(tr);
//			$('.mwui-switch-btn').each(function() {
//				$(this).bind("click", function() {
//					var span = $(this).find("span");
//					$(this).toggleClass('mwui-switch-btn-off');
//					span.toggleClass('off');
//					if (span.attr("class") == 'off') {
//						$(this).val("0");
//					} else {
//						$(this).val("1");
//					}
//					$.ajax({
//						type : 'POST',
//						url : 'ph/pipe_filter_set.php',
//						data: {CHNID:$(this).attr("name") , FLTFLAG:$(this).val()},
//						success:function(data){
//							//alert(data);
//						}
//					});
//					return false;
//				});
//			});
			$(".btn-info").each(function(){
				$(this).bind("click",function(){
				$("#modify").modal("show");
				});
			});
			$(".btn-danger").each(function(){
				$(this).bind("click",function(){
					if (confirm("通道的过滤规则将会被删除，确定删除此通道？")) {
						$.ajax({
							type : 'POST',
							url : 'ph/pipe_filter_set.php',
							data: {CHNID:$(this).attr("name") , DEL:"del"},
							success:function(data){
								//alert(data);
								tableflush();
							}
						});
					}  
					$(this).blur();
				});
			});
			$("a#add").each(function(){
				$(this).unbind().bind("click",function(){
					if(!checkipinput($("input#input1").val())){
						alert("IP地址输入有误，请重新输入！如：[192.168.0.0] 不建议用户在过滤规则中使用广播型IP地址");
						$(this).blur();
						return false;
					}else{
						$.ajax({
							type : 'POST',
							url : 'ph/pipe_filter_set.php',
							data: {PEERIP:$("input#input1").val()},
							success:function(data){
								if(data == "err0"){
									alert("通道已存在,不能重复添加");
									$("#add").blur();
								}else if(data == "err1"){
									alert("通道数已满,无法继续添加");
									$("#add").blur();
								} else if(data == "err2"){
									alert("客户端模式只能添加一条通道");
									$("#add").blur();
								} else{
									$("#myModal").modal("hide")
									tableflush();
								}
							}
						});
					}
				});
			});
			$("a.btn-setting1").bind("click",function(){
				$("#myModal").modal("show");
//				alert();
				$("#input1").focus();
			});
			$("td").css("vertical-align","middle")
			$(".btn1").each(function(){
				$(this).on("click",function(){
					$(this).toggleClass("btn-warning");
					if($(this).attr("class") == "btn btn1 btn-small"){
						$(this).text("禁止方式");
						$(this).val("0");
					}else{
						$(this).text("允许方式");
						$(this).val("1");
					}
					$.ajax({
						type : 'POST',
						url : 'ph/pipe_filter_set.php',
						data: {CHNID:$(this).attr("name") , FLTMODE:$(this).val()},
						success:function(data){
							//alert(data);
						}
					});
					$(this).blur();
					return false;
				});
			});
			$(".btn2").each(function(){
				$(this).bind("click",function(){
					$(this).toggleClass("btn-warning");
					if($(this).attr("class") == "btn btn2 btn-small"){
						$(this).text("未启用");
						$(this).val("0");
					}else{
						$(this).text("已启用");
						$(this).val("1");
					}
					$.ajax({
						type : 'POST',
						url : 'ph/pipe_filter_set.php',
						data: {CHNID:$(this).attr("name") , FLTFLAG:$(this).val()},
						success:function(data){
							//alert(data);
						}
					});
					$(this).blur();
					return false;
				});
			});
		}
	});
}
function checkportinput(port_string){
	var c;
	var ch = "0123456789";
	if(port_string.length == 0)
		return false;
	for (var i = 0; i < port_string.length; i++){
		c = port_string.charAt(i);
		if (ch.indexOf(c) == -1)
			return false;
	}
	if (parseInt(port_string,10) <= -1 || parseInt(port_string,10) >=65536)
		return false;
	return true;
}
function checkipinput(ip_string){
	var c;
	var n = 0;
	var ch = ".0123456789";
	if (ip_string.length < 7 || ip_string.length > 15)
		return false;     
	for (var i = 0; i < ip_string.length; i++){
	c = ip_string.charAt(i);
	if (ch.indexOf(c) == -1)
	    return false;
	else{
	    if (c == '.'){
	        if(ip_string.charAt(i+1) != '.')
	        n++;
	        else
	        return false;
	    }
	}
    }
	if (n != 3) 
		return false;
	if (ip_string.indexOf('.') == 0 || ip_string.lastIndexOf('.') == (ip_string.length - 1))
		return false;
	szarray = [0,0,0,0];
	var remain;
	var i;
    for(i = 0; i < 3; i++){
	var n = ip_string.indexOf('.');
	szarray[i] = ip_string.substring(0,n);
	remain = ip_string.substring(n+1);
	ip_string = remain;
    }
	szarray[3] = remain;
	for(i = 0; i < 4; i++){if (szarray[i] < 0 || szarray[i] > 255){return false;}
	}
    if(szarray[0] == 127) {return false;}
	if(szarray[0] == 255) {return false;}
	if(szarray[1] == 255) {return false;}
	if(szarray[2] == 255) {return false;}
	if(szarray[3] == 255) {return false;}
    if(szarray[0] >= 224 && szarray[0] <= 239){return false;}return true;
};
