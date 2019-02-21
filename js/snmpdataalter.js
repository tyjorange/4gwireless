var btn = $(".btn-primary");
var select1 = $("#snmpselect");
var text1 = $("#snmpip");
var text2 = $("#snmpport");
var text3 = $("#trapip");
var text4 = $("#inform");
$(document).ready(function() {
	$.ajax({
		type : 'POST',
		dataType : 'json',
		url : 'ph/snmpdataget.php',
		success : function(data) {
			select1.val(data[0]);
			text1.val(data[1]);
			text2.val(data[2]);
			text3.val(data[3]);
			text4.val(data[4]);
		}
	})
	btn.on('click', function() {
		var url = 'ph/snmpdataget.php';
		var snmpselect = select1.val();
		var snmpip = text1.val();
		var snmpport = text2.val();
		var trapip = text3.val();
		var inform = text4.val();
		if (snmpip.length = 0 || !checkipinput(snmpip)) {
			alert("SNMPD地址输入有误，请重新输入！如：192.168.0.0");
			return false;
		} else if (trapip.length = 0 || !checkipinput(trapip)) {
			alert("TRAP地址输入有误，请重新输入！如：192.168.0.0");
			return false;
		} else if (snmpport.length = 0 || !checkportinput(snmpport)) {
			alert("SNMPD端口号输入有误！请输入合法端口号（1-65535）");
			return false;
		} else if (inform.length = 0 || !checkipinput(inform)) {
			alert("INFORM地址输入有误，请重新输入！如：192.168.0.0");
			return false;
		} else {
			$.ajax({
				type : 'POST',
				data : {
					snmpselect : snmpselect,
					snmpip : snmpip,
					snmpport : snmpport,
					trapip : trapip,
					inform : inform
				},
				dataType : 'json',
				url : url,
				success : function(data) {
					if (data == "1") {
						alert("修改成功");
					} else {
						alert("修改失败");
					}
				}
			})
			$(this).blur();
		}
	})
});

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
//    if(szarray[0] == 127) {return false;}
	if(szarray[0] == 255) {return false;}
	if(szarray[1] == 255) {return false;}
	if(szarray[2] == 255) {return false;}
	if(szarray[3] == 255) {return false;}
    if(szarray[0] >= 224 && szarray[0] <= 239){return false;}return true;
};

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
