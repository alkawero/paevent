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


function changeJumlah() {
	var qty = document.getElementById("jumlah").value;		
	var total = Math.round(qty * 100000); 	
	var jenispeserta = document.getElementById("txtJenis").value;	
	
	if(jenispeserta!=="3"){
		var oSesi = document.getElementsByName("cSesi[]"); 
		var sesi1 = 0, sesi2=0;
		if (oSesi[0].checked == true) {
			sesi1=1;
		}
		if (oSesi[1].checked == true) {
			sesi2=1;
		}	
		sesi = sesi1 + sesi2;
		if (sesi == 0) {
			alert('Sesi belum di pilih');
			document.getElementById('cSesi1').focus();
			total = 0;
		} else {		
			total = total * sesi;
		}	
		document.getElementById("total").value  = addCommas(total);
	}else{
		document.getElementById("total").value  = 0;
	}

	
	
}

function Pendaftaran(){
	save_method = 'add'; 
	$('#form')[0].reset(); 
	$('#modal_form').modal('show');
	$('.modal-title').text('Daftar Seminar ');
	$('[name="id"]').val(0);
}


function isNumber(evt) {
	evt = (evt) ? evt : window.event;
	var jenispeserta = document.getElementById("txtJenis").value;	
	var charCode = (evt.which) ? evt.which : evt.keyCode;	
	if (jenispeserta==3) {
		if (charCode > 31 && (charCode < 49 || charCode > 50)) {
			return false;
		}
	} else {
		if (charCode > 31 && (charCode < 49 || charCode > 53)) {
			return false;
		}
	}
	return true;
}
	
function addCommas(nStr) {
	 nStr += '';
	 x = nStr.split('.');
	 x1 = x[0];
	 x2 = x.length > 1 ? '.' + x[1] : '';
	 var rgx = /(\d+)(\d{3})/;
	 while (rgx.test(x1)) {
		 x1 = x1.replace(rgx, '$1' + ',' + '$2');
	 }
	 return x1 + x2;
} 


function save(){
	
	var status;
	
	$.ajax({
		url : 'Registration/save',
		type: "POST",
		data: $('#form').serialize(),
		dataType: "JSON",
		success: function(data)
		{	// alert(data);
			//window.location.href = "Registration/payment_confirmation"			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{	// console.log (jqXHR);
			//window.location.href = "Registration/payment_confirmation"
		}
	});
	
}


$("#txtJenis").change(function() {
var pilihan=$(this).val();
console.log (pilihan);
if (pilihan==3) {
	$("rowNIS").show();
	$("#rowNIS").slideDown(100);
	document.getElementById("total").value  = 0;
	document.getElementById('txtNIS').focus();
	$("#div_instansi").hide();
	$("#cSesi2").hide();
	$('#cSesi2').prop('checked', false);
	$("#label_sesi2").hide();
} else {
	$("#cSesi2").show();
	$("#label_sesi2").show();
	$("#div_instansi").show();
	$("rowNIS").hide();
	$("#rowNIS").slideUp(100); 
	document.getElementById('txtNama').focus();
	changeJumlah();
}	
});

