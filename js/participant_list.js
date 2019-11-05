const base_url = "http://localhost"


function approve(id){
	$.ajax({
		type : "POST",
		url  : "payment_approve",
		data : {payment_id:id},
		success: function(data){
			location.reload()
		}
	});
}

function reject(id){
	$.ajax({
		type : "POST",
		url  : "payment_reject",
		data : {payment_id:id},
		success: function(data){
			location.reload()
		}
	});
}

function resend(id){
	$.ajax({
		type : "POST",
		url  : "payment_reject",
		data : {payment_id:id},
		success: function(data){
			location.reload()
		}
	});
}




