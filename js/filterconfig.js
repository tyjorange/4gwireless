document.write("<script src='js/ipportcheckutil.js' type='text/javascript'></script>");
window.onload=function(){hidewin();};
function hidewin(){
	$("#addwindow").hide();
	$(".okbtn").hide();
};
$(document).ready(
		function() {$.ajax({
			type : 'POST',
			url : 'ph/filterdata.php',
			dataType : 'json',
			data : {chnid:getArgs()['id']},
			success : function(data) {
				var tbody = $('#tbody');
				var str = "";		
				if(data.length > 0){
					$.each(data,function(idx, obj) {
						str += "<tr class= "+"'"+obj.FLTID+"'"+"><td class='indata'>"
						+ obj.PROTOCOL
						+ "</td><td class='indata'>"
						+ obj.SRCIP
						+ "</td><td class='indata'>"
						+obj.SRCPORT
						+ "</td><td class='indata'>"
						+obj.DESIP
						+ "</td><td class='indata'>"
						+obj.DESPORT
						+ "</td><td><input type='button' value='删除' onclick="+'"'+"fltdelete("+"'"
						+obj.FLTID+"'"+")"+'"'+"  class='btn btn-danger'>"
						+" "+"<input type='button' id='alterbtn' onclick="+'"'+"alterbtn("+"'"
						+obj.FLTID+"'"+")"+'"'+"  value='修改' class='btn btn-info'>"
						+" "+"<input type='button' id= "+"'"+obj.FLTID+"'"+" onclick='okbtn(this.id)' value='提交' class='okbtn' style='background-color: #51a351;color: #FFF;font-size: 14px;padding: 4px 12px;border: 0px none;border-radius: 2px;'></td></tr>";
					});
				}else{
					str += "<tr><td style='text-align: center;' colspan='6'>没有过滤规则，请新增规则</td></tr>";
				}
				$('#tbody').append(str);	
				$(".okbtn").hide();
				$("td").css("vertical-align","middle")
			}		
		});
	});
/**
 * 通道删除
 * @param id_string
 * 	通道ID
 */
function fltdelete(id_string) {
	if(confirm("确认删除？")){
		deletemethod(id_string);	
	}};
function deletemethod(id_string){
	var url = 'ph/fltdelete.php';
	var cont = {id:id_string};
	$.post(url,cont,function(data){
		var res = eval("(" + data + ")");
		alert(res.info);
		location.reload();
		});	
	};
	/**
	 * 通道修改
	 */
	//修改按钮事件
function alterbtn(id_string){
	alert("点击内容修改，然后点击提交～");
	$("."+id_string+"").children("td.indata").bind("click",function (){
		ShowElement(this);
	});
	$("#"+id_string+"").show();
};
function getArgs() {
    var args = {};
    var query = location.search.substring(1); 
    var pairs = query.split("&");
     for(var i = 0; i < pairs.length; i++) {
            var pos = pairs[i].indexOf('=');
            if (pos == -1) continue;  
	           var argname = pairs[i].substring(0,pos); 
	           var value = pairs[i].substring(pos+1); 
	           value = decodeURIComponent(value);
	           args[argname] = value;
        }
    return args;         
}
	//提交按钮事件
function okbtn(id_string){
	var tddata = $("."+id_string+"").children("td")
    for (var i=0;i<tddata.length;i++) {
    	var cp = tddata.eq(0).text();
    	var srcip = tddata.eq(1).text();
    	var srcport = tddata.eq(2).text();
    	var desip = tddata.eq(3).text();
    	var desport = tddata.eq(4).text();
    	
    }

	if(cp!="TCP"&&cp!="UDP"&&cp!="*"){alert("请输入有效的协议名称！（TCP,UDP,*）");return false;}
	else if(!checkipinput(srcip)){alert("源IP地址输入有误，请重新输入！如：192.168.0.0");return false;}
	else if(!checkportinput(srcport)){alert("源端口号输入有误！请输入合法端口号（0-65535）");return false;}
	else if(!checkipinput(desip)){alert("目标IP地址输入有误，请重新输入！如：192.168.0.0");return false;}
	else if(!checkportinput(desport)){alert("目标端口号输入有误！请输入合法端口号（0-65535）");return false;}
	else if(srcip==desip){alert("请输入与源IP不一致的目标IP！");return false;}
	else if(srcport==desport){alert("请输入与源端口不一致的目标端口！");return false;}
	else{	
	var url = 'ph/fltalter.php';
	var cont = {id:id_string,cp:cp,srcip:srcip,srcport:srcport,desip:desip,desport:desport};
	$.post(url,cont,function(data){
		var res = eval("(" + data + ")");
		alert(res.info);
		location.reload();
	});
	};	
};
function ShowElement(element){
	var oldhtml = element.innerHTML;
	var newobj = document.createElement('input');
	newobj.type = 'text';
//	newobj.style = 'color:red';
	newobj.style = 'margin-bottom:0px;width:90px;color:red';
	newobj.onblur = function(){
	element.innerHTML = this.value ? this.value : oldhtml;
	}
	element.innerHTML = '';
	element.appendChild(newobj);
	element.style.color = 'red';
	newobj.focus();
	}
	/**
	 * 新增
	 */
function hidediv(){checkinput();};
function cancel(){$("#addwindow").hide();}
function showdiv(){$("#addwindow").show();};
function checkinput(){
		if($("#cpselect").val()=="请选择"){alert("请选择协议！");return false;}
		else if($("#srcip").val()==""){alert("请输入源IP地址！");return false;}
		else if(!checkipinput($("#srcip").val())){alert("源IP地址输入有误，请重新输入！如：192.168.0.0");return false;}
		else if($("#srcport").val()==""){alert("请输入源端口号！");return false;}
		else if(!checkportinput($("#srcport").val())){alert("源端口号输入有误！请输入合法端口号（0-65535）");return false;}
		else if($("#desip").val()==""){alert("请输入目标IP！");return false;}
		else if(!checkipinput($("#desip").val())){alert("目标IP地址输入有误，请重新输入！如：192.168.0.0");return false;}
		else if($("#desport").val()==""){alert("请输入目标端口号！");return false;}
		else if(!checkportinput($("#desport").val())){alert("目标端口号输入有误！请输入合法端口号（0-65535）");return false;}
		else if($("#srcip").val()==$("#desip").val()){alert("请输入与源IP不一致的目标IP！");return false;}
		else if($("#srcport").val()==$("#desport").val()){alert("请输入与源端口不一致的目标端口！");return false;}
		else{
			addrole();
			$("#addwindow").hide();
			return true;};	
		};

function addrole(){
		var cont = {cp:$("#cpselect").val(),srcip:$("#srcip").val(),srcport:$("#srcport").val(),desip:$("#desip").val(),desport:$("#desport").val(),chnid:getArgs()['id']};
   		var url = 'ph/addrole.php';
   		$.post(url,cont,function(data){	
    	var res = eval("(" + data + ")");
		alert(res.info);
		location.reload();
  		});
	};
function toggle(){
	$("#addwindow").toggle();
};
