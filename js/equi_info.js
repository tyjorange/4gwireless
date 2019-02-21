$(document).ready(function() {
	var btn = $(".btn-primary");
	$.ajax({
		type : 'POST',
		url : 'ph/clientmodeget.php',
		dataType : 'json',
		success : function(data) {
			$("#desc").val(data[0].DESC)
			$("#comment").val(data[0].COMMENT)
		}
	})
	btn.on('click', function() {
		$.ajax({
			type : 'POST',
			url : 'ph/clientmodealter.php',
			dataType : 'json',
			data : {
				desc : $("#desc").val(),
				comment : $("#comment").val()
			},
			success : function(data) {
				alert(data.info)
				btn.blur()
			}
		})
	})
})