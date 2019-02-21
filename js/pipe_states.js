$(document).ready(
		function() {
			var mode;
			var port;
			$.ajax({
				type : 'POST',
				url : 'ph/pipe_mode_get.php',
				dataType : 'json',
				success :function(data) {
					mode = data[0].MODE
					port = data[0].PORT
				}
			})
			$.ajax({
				type : 'POST',
				url : 'ph/pipe_sta.php',
				dataType : 'json',
				success : function(data) {
					var tbody = $('tbody');
					var str = "";
					if(data.length > 0){
						$.each(data, function(idx, obj) {
							str += "<tr class='line' name=" + obj.PEERIP + "><td>" 
							+ "<span class='s1'></span>" 
							+ "</td><td>"
							+ "<span class='s2'></span>"
							+ "</td><td>" 
							+ "<span class='s3'>" + obj.PEERIP + "</span>"
							+ "</td></tr>";
						});
					} else {
						str += "<tr><td style='text-align: center;' colspan='4'>没有通道，请新增通道</td></tr>";
					}
					$('tbody').append(str);
					$('tr.line').each(function() {
						var tr = $(this);
						var span1 = tr.children("td").children("span.s1");
						var span2 = tr.children("td").children("span.s2");
						var span3 = tr.children("td").children("span.s3");
						setInterval(function() {
							$.ajax({
								type : 'POST',
								url : 'ph/pipe_sta_sh.php',
								dataType : 'json',
								data : {
									ip : tr.attr("name"),
									mode : mode,
									port : port
								},
								success : function(data) {
//									alert(mode+" "+port)
									var as = data.toString().replace(/\s+/g,"\t+-");
									if(data.length == 0){
										span1.text("未连接");
										span2.text("未连接");
									}else{
										var arr = as.split("\t+-");
										span1.text("连接");
										span2.text(arr[3]);
										span3.text(arr[4]);
									}
								}
							});
						}, 2000);
					});
				}
			});
		});