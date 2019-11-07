const base_url = "http://localhost";

function approve(id) {
	$.ajax({
		type: "POST",
		url: "payment_approve",
		data: { payment_id: id },
		success: function(data) {
			send_ticket(id)
		}
	});
}

function reject(id) {
	$.ajax({
		type: "POST",
		url: "payment_reject",
		data: { payment_id: id },
		success: function(data) {
			location.reload();
		}
	});
}

function send_ticket(participant_id) {
	$.ajax({
		type: "POST",
		url: "send_ticket",
		data: { participant_id: participant_id },
		success: function(data) {
			location.reload();
		}
	});
}

function showTickets(participant_id){
	$.ajax({
		type: "GET",
		url: "get_tickets",
		data: { participant_id: participant_id },
		success: function(data) {
			console.log(data)
			var links = "";
			JSON.parse(data).forEach(ticket => {
				links = links + "<a target='blank' href='"+ticket.ticket_url+"'> ticket </a> <br/>";
			});

			$("#modal_body_link").html(links) ;
		}
	});
	$('#modalTickets').modal('show');
}
