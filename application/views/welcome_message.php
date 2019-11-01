<!DOCTYPE html>
<style>
body {
	font-size:12px;
}
thead tr {
	cursor:pointer;
}
.row {
	margin-bottom:7px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0; 
}
</style>
<html lang="en">
  <head>
    <title>Pahoa - Learning for Application</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Pahoa</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">Tentang Event</a></li>
	          <li class="nav-item"><a href="speakers.html" class="nav-link">Pembicara</a></li>
	          <li class="nav-item"><a href="schedule.html" class="nav-link">Agenda</a></li>
	          <!--li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li-->
	          <li class="nav-item"><a href="contact.html" class="nav-link">Kontak</a></li>
	          <li class="nav-item cta mr-md-2"><a onclick="Pendaftaran()" class="nav-link">Pendaftaran</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-lg-6 col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <!-- h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Business Leaders <br><span>SIGMA Seminar</span></h1 -->
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Significant of Mathematics<br><span>SIGMA X Seminar</span></h1>			
			<!-- <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">  <br><span>SIGMA Seminar</span></h1> -->
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="icon-calendar mr-2"></span>18 Desember 2019 - Sekolah Pahoa</p>
            <div id="timer" class="d-flex">
						  <div class="time" id="days"></div>
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
						</div>
          </div>
          <div class="col-lg-2 col"></div>
		  <!--
          <div class="col-lg-4 col-md-6 mt-0 mt-md-5">
          	<form action="#" class="request-form ftco-animate">
          		<h2>Daftar Seminar</h2>
	    				<div class="form-group">
	    					<input type="text" class="form-control" placeholder="Nama Lengkap">
	    				</div>
	    				<div class="form-group">
	    					<input type="text" class="form-control" placeholder="Email">
	    				</div>
    					<div class="form-group">
	    					<input type="text" class="form-control" placeholder="WA">
	    				</div>
	    				<div class="form-group">
								<div class="checkbox">
								   <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
								</div>
							</div>
	            <div class="form-group">
	              <input type="submit" value="REGISTER NOW" class="btn btn-primary py-3 px-4">
	            </div>
			</form>
          </div> -->
		  
		  
        </div>
      </div>
    </div>
	
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
	<!-- button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button -->
	<h3 class="modal-title">Daftar Seminar</h3>
  </div>
  <div class="modal-body form">
	<form action="#" id="form" class="form-horizontal">	
	  <input type="hidden" value=""  name="id"/> 
	  <div class="form-body">		
		<div class="row form-group">
		  <label class="control-label col-md-3">Peserta :</label>
		  <div class="col-md-9 has-feedback">
			<select class="form-control input-sm" id="txtJenis" name="txtJenis" required >
				<option value='1'>Umum</option>
				<option value='2'>Profesional Pendidik</option>
				<option value='3'>Orang Tua Siswa Pahoa</option>
			</select>
		  </div>
		</div>

		<div class="row" id='rowNIS' style='display:none;'>
		  <label class="control-label col-md-3">No.Induk Siswa :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtNIS"  id="txtNIS" class="form-control" placeholder="" > 
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		
		<div class="row form-group">
		  <label class="control-label col-md-3">Nama :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtNama"  id="txtNama" class="form-control" placeholder="Nama Lengkap" > 
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		
		<div class="row form-group">
		  <label class="control-label col-md-3">Instansi :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtInstansi" id="txtInstansi" class="form-control" placeholder="Instansi">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>

		<div class="row form-group">
		  <label class="control-label col-md-3 ">Waktu :</label>		  
			<div class='col-md-6 col-sm-6'>
				<input type='checkbox' checked="checked" name='cSesi[]' id='cSesi1'  class='col-md-1' onchange="changeJumlah();"
					 value='1' style='cursor:pointer;' title='Jam 08:00-10:00' > 
				<label class='col-md-5' for='cSesi1' style='cursor:pointer;' title='Jam 08:00-10:00' data-html='true' data-toggle='tooltip' data-placement='top' > Sesi 1</label>
		 
				<input type='checkbox' name='cSesi[]' id='cSesi2'  class='col-md-1' onchange="changeJumlah();"
					 value='2' style='cursor:pointer;' title='Jam 10:00-12:00' > 
				<label for='cSesi2' style='cursor:pointer;' title='Jam 10:00-12:00' data-html='true' data-toggle='tooltip' data-placement='top' > Sesi 2</label>				
			</div>			
		</div>

		<div class="row form-group">
		  <label class="control-label col-md-3">Email :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtNama" id="txtNama" class="form-control" placeholder="Email">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		
		<div class="row form-group">
		  <label class="control-label col-md-3">WA :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtWA" id="txtWA" class="form-control" placeholder="whatsapp">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		 
		
		<div class="row form-group" >
			<label class="control-label col-md-3">Jumlah :</label>
			<div class='col-md-5 col-sm-5'>
				<input type="text"  id="jumlah"  name="jumlah" onkeyup="changeJumlah();" maxlength="1"
					   onkeypress="return isNumber(event)" class="form-control" value=1 required> 
			</div> 
		</div>

		<div class="row form-group" >
			<label class="control-label col-md-3">Total :</label>
			<div class="row form-group" >
				<label class="control-label col-md-1">Rp.</label>
				<div class='col-md-7'>
					<input type="text" id="total" name="total" value=100,000 class="form-control" readonly>
				</div>
			</div>
		</div>
		
	  </div>
	</form>
	<div id="pesan_error"></div> <!--alert pesan jika terjadi eror -->
  </div>
  
  <div class="modal-footer">
	<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">SIMPAN</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
  </div>
  
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

		<section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-7 wrap-about py-md-5 ftco-animate">
	          <div class="heading-section mb-5 pt-5 pl-md-5">
	          	<div class="pr-md-5 mr-md-5">
		            <h2 class="mb-4">What is all about us?</h2>
	            </div>

	            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
	            <!--<p><a href="#" class="btn btn-primary">Join now</a></p> -->
	          </div>
					</div>
				</div>
			</div>
		</section>


		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">Agenda Seminar</h2>
          </div>
        </div>
        <div class="ftco-schedule">
			<div class="row">
            <!--div class="col-md-3 nav-link-wrap text-center text-md-right">
	            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	              <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">First Day <span>21 July 2019</span></a>

	              <a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Second Day <span>22 July 2019</span></a>

	              <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Third Day <span>23 July 2019</span></a>

	            </div>
	          </div> -->
	          <div class="col-md-9 tab-wrap">
	            
	            <div class="tab-content" id="v-pills-tabContent">

	              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
	              	<div class="speaker-wrap ftco-animate d-md-flex">
	              		<!-- div class="img speaker-img" style="background-image: url(images/staff-1.jpg);"></div> -->
						<div> </div>
	              		<div class="text">
	              			<h2><a href="#">Sesi 1</a></h2>
	              			<!--<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> -->
	              			<span class="time">08:00 am - 10:00 am</span>
	              			
							<p class="location"><span class="icon-map-o mr-2"></span>Orang tua & Umum</p>
	              			<!--
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Ryan Thompson</a> <span class="position">Founder of Wordpress</span></h3>
							-->
	              		</div>
	              	</div>
	              	<div class="speaker-wrap ftco-animate d-md-flex">
	              		<!-- <div class="img speaker-img" style="background-image: url(images/staff-2.jpg);"></div> -->
	              		<div class="text">
	              			<h2><a href="#">Sesi 2</a></h2>
	              			<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> -->
	              			<span class="time">10:30 am - 12:30 pm</span>	              			
							<p class="location"><span class="icon-map-o mr-2"></span>Guru & Karyawan Pahoa</p>
							<!--
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Ryan Thompson</a> <span class="position">Founder of Wordpress</span></h3>
							-->
	              		</div>
	              	</div>
					<!--
	              	<div class="speaker-wrap ftco-animate d-md-flex">
	              		<div class="img speaker-img" style="background-image: url(images/staff-3.jpg);"></div>
	              		<div class="text">
	              			<h2><a href="#">Introduction to Business Leaders</a></h2>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	              			<span class="time">09:00 am - 4:30 pm</span>
	              			<p class="location"><span class="icon-map-o mr-2"></span>20 July 2019 - Hall, Building Los Angeles CA</p>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Ryan Thompson</a> <span class="position">Founder of Wordpress</span></h3>
	              		</div>
	              	</div>
					-->
	              </div>
				</div>
	          </div>
	        </div>
        </div>
			</div>
		</section>
		
		<section class="ftco-section ftco-gallery ftco-no-pt">
    	<div class="container-fluid px-4">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-3">Conference Gallery</h2>
          </div>
        </div>
    		<div class="row">
					<div class="col-md-3 ftco-animate">
						<a href="images/image_1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/Gallery_1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/Gallery_2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/Gallery_3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/Gallery_4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>
    
	<section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-1">Pembicara</h2>
          </div>
        </div>
        <div class="row">		
        	<div class="col-md-6">
        		<div class="speaker ftco-animate speaker-1 d-flex align-items-center mb-5">
	        		<div class="img" style="background-image: url(images/wilt-yeap-ban-har.jpg);"></div>
	        		<div class="text pl-4">
	        			<h3>Dr. Yeap Ban Har</h3>
	        			<span class="position">Principal at Marshall Cavendish Institute</span>
						<p>Based in Singapore, Ban Har travels the world to teach mathematics education courses.</p>
	        			<ul class="ftco-social">
	                <li><a href="https://twitter.com/ban_har"><span class="icon-twitter"></span></a></li>
	                <li><a href="https://www.facebook.com/BanHarMaths"><span class="icon-facebook"></span></a></li>
	                <li><a href="https://www.instagram.com/yeapbanhar"><span class="icon-instagram"></span></a></li>
	              </ul>
	        		</div>
	        	</div>
	        </div>	
	  </div>
    	</div>
    </section>
	<footer class="ftco-footer ftco-bg-dark"  >      		         
		<div class="row">
          <div class="col-md-12 text-center" >
            <p style="color:black;"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a style="color:black;" href="https://colorlib.com" target="_blank">Colorlib</a>
			   <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</p>
          </div>
        </div>             
    </footer>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>

<script>

function changeJumlah() {
	var qty = document.getElementById("jumlah").value;		
	var total = Math.round(qty * 100000); 		
	
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
	// document.getElementById('txtNIS').focus();
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
alert('simpan');
	/*
	var url;
	var status;
	if(save_method == 'add') 
	{	status = " tambahkan.";
		url = "<?php echo site_url('MsPeriode/periode_add')?>";
	}
	else
	{	status = " edit.";
		url = "<?php echo site_url('MsPeriode/periode_update')?>";
	} 
	// alert(url);
	$.ajax({
		url : url,
		type: "POST",
		data: $('#form').serialize(),
		dataType: "JSON",
		success: function(data)
		{	// alert(data);
			if(data==1) {
				$('#pesan_error').html('<div class="alert alert-success" id="kotakpesan" style="text-align:center;">' + "Periode berhasil di " + status + '</div>');				
			} else { 
				$('#pesan_error').html('<div class="alert alert-danger" id="kotakpesan" style="text-align:center;">' + "Periode GAGAL di " + status  + '</div>');
			}
			location.reload();
		},
		error: function (jqXHR, textStatus, errorThrown)
		{	// console.log (jqXHR);
			alert('Error adding / update data');
		}
	});
	*/
}


$("#txtJenis").change(function() {
var pilihan=$(this).val();
console.log (pilihan);
if (pilihan==3) {
	$("rowNIS").show();
	$("#rowNIS").slideDown(100);
	document.getElementById("total").value  = 0;
	document.getElementById('txtNIS').focus();
} else {
	$("rowNIS").hide();
	$("#rowNIS").slideUp(100); 
	document.getElementById('txtNama').focus();
	changeJumlah();
}
	/* if($(this).val()=="") {
		$("#rowDetailProsem").hide();		
		$("rowDetailKiKd").hide();
		$("#rowDetailKiKd").slideUp(100);
		
		$("#rowMapel").slideUp(100);
		$("#txtMapel").empty();
		$("#rowSemester").slideUp(1000);
		$('#txtSemester').prop('selectedIndex',0);
		
		$("#rowSubmit").slideUp(100);		
		$("#rowSubmitKiKd").slideUp(100);
	} else {
		var dataform = "txtKelas="+$(this).val();
		$("#loadingBox").show();
		$("#loadingInfo").text("Search Mapel");		
		load_mapel_guru(dataform,"simpan","","");
	} */
});
 
</script>
