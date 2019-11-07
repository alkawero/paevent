<!DOCTYPE html>
<style>
	body {
		font-size: 12px;
	}

	thead tr {
		cursor: pointer;
	}

	.row {
		margin-bottom: 7px;
	}

	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		margin: 0;
	}

	sub {
		color: white;
		vertical-align: sub;
		font-size: 12px;
	}
</style>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body>

	<?php $this->load->view("_partials/navbar.php") ?>
	<!-- END nav -->

	<div class="hero-wrap" style="background-image: url('<?= base_url(); ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
				<div class="col-lg-6 col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Significant of Mathematics<br><span>SIGMA Seminar</span></h1>			
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="icon-calendar mr-2"></span>18 Desember 2019 - Sekolah Terpadu Pahoa</p>
            <!--div id="timer" class="d-flex">
						  <div class="time" id="days"></div>
						  <div class="time pl-3" id="hours"></div>
						  <div class="time pl-3" id="minutes"></div>
						  <div class="time pl-3" id="seconds"></div>
			</div-->
				</div>
				<div class="col-lg-2 col"></div>


			</div>
		</div>
	</div>

	<!-- Bootstrap modal -->
	<?php $this->load->view("_partials/modal_daftar.php") ?>

	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(<?= base_url(); ?>images/about.jpg);">
				</div>
				<div class="col-md-7 wrap-about py-md-5 ftco-animate">
					<div class="heading-section mb-5 pt-5 pl-md-5">
						<div class="pr-md-5 mr-md-5">
							<h3 class="mb-5">How Parents Can Help Children to Know and Learn Mathematics</h3>
							<h4 class="mb-5">Significance of Mathematics (SIGMA)</h4>
						</div>

						<strong>Kenapa matematika penting?</strong>
						<p>Matematika terlanjur mendapat citra sebagai pelajaran menakutkan dan menyulitkan. Padahal, dengan mempelajarinya secara benar, matematika mengajarkan kemampuan berpikir kritis dan logis, dua kemampuan yang sangat besar manfaatnya dalam hidup. Sebagai orangtua dan pendidik, kita memiliki andil besar membawa pengaruh positif bagi putra-putri kita mempelajari matematika dengan cara yang tepat.</p>
						<p>Setidaknya ada tiga kekeliruan metode penyampaian pelajaran matematika yang terlanjur melekat kuat, bahkan telah menjadi sebuah sistem. Pertama, siswa-siswi seringkali diharuskan melakukan kegiatan menghitung dalam cara yang monoton. Kedua, pembelajaran yang terlalu berfokus pada rumus-rumus. Ketiga, pola belajar siswa yang banyak dijumpai adalah menghapal tanpa melalui proses berlogika dan berpikir kritis. Belajar hanya dilakukan siswa-siswi untuk melewati suatu tugas atau ujian, dan bukan untuk menimbulkan pemahaman menyeluruh.</p>

						<p>Sekolah Terpadu Pahoa telah menyadari hal ini, dan telah melakukan perubahan metode pembelajaran. Anak bukan lagi diharuskan untuk menghapal, namun mereka juga diajak untuk berpikir kritis. Semua ini Pahoa lakukan untuk membentuk pribadi yang tidak hanya cerdas dalam akademik, namun juga memiliki kecakapan dalam berpikir kritis dan logis. Ini juga sejalan dengan visi dari Kementerian Pendidikan Republik Indonesia.

							<p><strong>Kenapa seminar ini penting bagi orangtua dan guru? </strong>Sekolah Terpadu Pahoa ingin berbagi kepada Bapak/Ibu orangtua siswa serta para pengajar tentang kegiatan metode belajar matematika berdasarkan critical thinking yang sudah dijalankan di kelas-kelas Pahoa. Metode ini terinspirasi dari CPA (Concrete, Pictorial, Abstract) Approach, sebuah metode yang digunakan dalam pengajaran matematika berbasis critical thinking. Juga, kami mengajak Bapak dan Ibu mendengar langsung dari ahlinya mengenai bagaimana mendampingi putra-putri kita untuk belajar matematika dengan langkah yang tepat.

								<p><strong>Yang Membuat Seminar Ini Menarik... </strong>Seminar ini menghadirkan Dr. Yeap Ban Har, pakar terkemuka dunia asal Singapura dalam bidang pengembangan profesional untuk para guru matematika. Dr. Yeap Ban Har telah menyajikan banyak ceramah utama di konferensi pendidikan internasional dan telah menjadi pemateri seminar di berbagai universitas di seluruh dunia. Beliau menghabiskan 10 tahun di National Institut of Education di Singapura untuk mengajar berbagai pelatihan guru, pascasarjana, dan para peneliti pendidikan matematika. Dr. Yeap Ban Har juga merupakan bagian dari Komite Kementerian Pendidikan Singapura yang ikut meninjau kurikulum matematika sekolah dasar tahun 2013 yang masih digunakan hingga saat ini.
								</p>
								<!--<p><a href="#" class="btn btn-primary">Join now</a></p> -->
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of update by Eko 5/11/19 -->
	<section class="ftco-section ftco-no-pt">
			<div class="container">
				<div class="row justify-content-center mb-3">
				  <div class="col-md-7 heading-section ftco-animate text-center">
					<br>
					<h2 class="mb-3">Biaya pendaftaran<h2>
				  </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 ftco-animate">	           
				</div>
				<div class="col-md-4 ftco-animate">
				  <div class="block-7 active">
					<div class="text-center">
					<span class="price"><sup>Rp.</sup> <span class="number">100.000,00</span> <sub>per orang.</sub> </span> 
					<h3 class="heading-2 my-4"><strong>Enjoy All The Features</strong></h3>
					<ul class="pricing-text"> 					
						<li><h2 class="heading">Ilmu yang bermanfaat</h2></li>
						<li><h2 class="heading">Snack</h2></li>
						<li><h2 class="heading">Sertifikat</h2></li>
					</ul>
					<br>
					<div class="text-center">
						<h2 class="heading">Pembayaran</h2>
						<h2 class="heading">Bank BCA 5405939999 a.n.YPP Pahoa </h2>  
					</div>
					<a onclick="Pendaftaran()" class="btn btn-primary d-block px-2 py-3">Daftar Seminar</a>
					</div>				
				  </div> 
				</div>
				<div class="col-md-4 ftco-animate">	           
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
				
					<div class="col-md-12 tab-wrap">

						<div class="tab-content" id="v-pills-tabContent">

							<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
								<div class="speaker-wrap ftco-animate d-md-flex">
									<!-- div class="img speaker-img" style="background-image: url(<?= base_url(); ?>images/staff-1.jpg);"></div> -->
									<div> </div>
									<div class="text">
									<h2><a href="#">Sesi 1: How parents can help children to know and learn Mathematics</a></h2>
										<!--<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> -->
									<span class="time">09:00 am - 11:00 am</span>

										<p class="location"><span class="icon-map-o mr-2"></span>Orang tua & Umum</p>
										<!--
							<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Ryan Thompson</a> <span class="position">Founder of Wordpress</span></h3>
							-->
									</div>
								</div>
								<div class="speaker-wrap ftco-animate d-md-flex">
									<!-- <div class="img speaker-img" style="background-image: url(<?= base_url(); ?>images/staff-2.jpg);"></div> -->
									<div class="text">
									<h2><a href="#">Sesi 2: How Mathematics improve thinking</a></h2>
										<!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> -->
									<span class="time">13:00 am - 15:00 pm</span>	              			
										<p class="location"><span class="icon-map-o mr-2"></span>Guru & Karyawan Pahoa</p>
										<!--
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Ryan Thompson</a> <span class="position">Founder of Wordpress</span></h3>
							-->
									</div>
								</div>
								
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
						<a href="<?=base_url();?>images/Gallery_1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=base_url();?>images/Gallery_1.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
						<a href="<?=base_url();?>images/Gallery_2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=base_url();?>images/Gallery_2.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
						<a href="<?=base_url();?>images/Gallery_3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=base_url();?>images/Gallery_3.jpg);">
						<div class="icon mb-4 d-flex align-items-center justify-content-center">
							<span class="icon-instagram"></span>
						</div>
					</a>
				</div>
				<div class="col-md-3 ftco-animate">
						<a href="<?=base_url();?>images/Gallery_4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(<?=base_url();?>images/Gallery_4.jpg);">
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
		
			<div class="speaker-wrap ftco-animate d-md-flex">
				<div class="img speaker-img"  class="user-img mb-4" style="background-image: url(images/yeap_ban_har.jpg);"></div>
				<div class="text">
					<h3>Dr. Yeap Ban Har</h3>
	        		<span class="position">Principal at Marshall Cavendish Institute</span>
					<p>Pakar terkemuka dunia asal Singapura dalam bidang pengembangan profesional untuk para guru matematika. Beliau telah menyajikan banyak ceramah utama di konferensi pendidikan internasional dan di berbagai universitas di seluruh dunia.</p>					 
					 <a href="https://twitter.com/ban_har"><span class="icon-twitter"></span></a>
					 <a href="https://www.facebook.com/BanHarMaths"><span class="icon-facebook"></span></a>
					 <a href="https://www.instagram.com/yeapbanhar"><span class="icon-instagram"></span></a>
				</div>
			</div> 	
		</div>
    	</div>
		
	</section>
	<?php $this->load->view("_partials/footer.php") ?>

	<?php $this->load->view("_partials/js.php") ?>

</body>

</html>
