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
  <?php $this->load->view("_partials/head.php") ?> 
  </head>
  <body>
    
  <?php $this->load->view("_partials/navbar.php") ?>  
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('<?=base_url();?>images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
            <h1 style="color:white;" class="mb-3 bread">Speakers</h1>
            <p class="breadcrumbs"><span class="mr-2"><a style="color:white;"href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span style="color:white;">Speakers <i style="color:white;" class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
   	
		<section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-1">Conference Speakers</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-6 d-flex align-items-stretch">
        		<div class="speaker speaker-2 ftco-animate d-flex align-items-stretch">
	        		<div class="img" style="background-image: url(<?=base_url();?>images/staff-3.jpg);">
	        			<div class="text text-absolute">
		        			<h3>Robert Bonner</h3>
		        			<span class="position">Businessmen</span>
		        			<ul class="ftco-social mt-3">
		                <li><a href="#"><span class="icon-twitter"></span></a></li>
		                <li><a href="#"><span class="icon-facebook"></span></a></li>
		                <li><a href="#"><span class="icon-instagram"></span></a></li>
		              </ul>
		        		</div>
	        		</div>
	        	</div>
        	</div>
        	<div class="col-md-6">
        		<div class="speaker ftco-animate speaker-1 d-flex align-items-center mb-5">
	        		<div class="img" style="background-image: url(<?=base_url();?>images/staff-1.jpg);"></div>
	        		<div class="text pl-4">
	        			<h3>Kyle Bochs</h3>
	        			<span class="position">Businessman</span>
	        			<p>A small river named Duden flows by their place and supplies</p>
	        			<ul class="ftco-social">
	                <li><a href="#"><span class="icon-twitter"></span></a></li>
	                <li><a href="#"><span class="icon-facebook"></span></a></li>
	                <li><a href="#"><span class="icon-instagram"></span></a></li>
	              </ul>
	        		</div>
	        	</div>
	        	<div class="speaker ftco-animate speaker-1 d-flex align-items-center mb-5">
	        		<div class="img" style="background-image: url(<?=base_url();?>images/staff-2.jpg);"></div>
	        		<div class="text pl-4">
	        			<h3>Arnold Thompson</h3>
	        			<span class="position">Businessman</span>
	        			<p>A small river named Duden flows by their place and supplies</p>
	        			<ul class="ftco-social">
	                <li><a href="#"><span class="icon-twitter"></span></a></li>
	                <li><a href="#"><span class="icon-facebook"></span></a></li>
	                <li><a href="#"><span class="icon-instagram"></span></a></li>
	              </ul>
	        		</div>
	        	</div>
	        	<div class="speaker ftco-animate speaker-1 d-flex align-items-center mb-5">
	        		<div class="img" style="background-image: url(<?=base_url();?>images/staff-3.jpg);"></div>
	        		<div class="text pl-4">
	        			<h3>Ryan Sy</h3>
	        			<span class="position">Businessman</span>
	        			<p>A small river named Duden flows by their place and supplies</p>
	        			<ul class="ftco-social">
	                <li><a href="#"><span class="icon-twitter"></span></a></li>
	                <li><a href="#"><span class="icon-facebook"></span></a></li>
	                <li><a href="#"><span class="icon-instagram"></span></a></li>
	              </ul>
	        		</div>
	        	</div>
	        	<div class="speaker ftco-animate speaker-1 d-flex align-items-center mb-5">
	        		<div class="img" style="background-image: url(<?=base_url();?>images/staff-4.jpg);"></div>
	        		<div class="text pl-4">
	        			<h3>Alysa Derick</h3>
	        			<span class="position">Businesswoman</span>
	        			<p>A small river named Duden flows by their place and supplies</p>
	        			<ul class="ftco-social">
	                <li><a href="#"><span class="icon-twitter"></span></a></li>
	                <li><a href="#"><span class="icon-facebook"></span></a></li>
	                <li><a href="#"><span class="icon-instagram"></span></a></li>
	              </ul>
	        		</div>
	        	</div>
        	</div>
        </div>
    	</div>
    </section>
		
		<section class="ftco-section-parallax ftco-section ftco-no-pt">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-7 text-center heading-section ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	</section>
	<?php $this->load->view("_partials/modal_daftar.php") ?>
	<?php $this->load->view("_partials/footer.php") ?>

  <?php $this->load->view("_partials/js.php") ?>
    
  </body>
</html>

