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
          <div class="col-md-9 ftco-animate pb-9">
            <!-- h1 class="mb-3 bread">Contact</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
			-->
			<div class="row block-5">
			  <div class="col-md-9 order-md-last d-flex">
				<form action="#" class="bg-light p-5 contact-form">
					<h2 class="h3">Contact Information</h2>					
					<p><span>Address:</span><br> Jl. Ki Hajar Dewantara No. 1, Summarecon Serpong <br>Tangerang 15810, Banten</p>
					<p><span>Q & A:</span>
						<br> (021) 54203355 (hunting) ext 5
						<br>(021) 54210707 (hunting) ext 5
						<br>Fax: 021-54210700
					<p><a href="www.pahoa.sch.id">www.pahoa.sch.id</a></p>
					</p>              
				</form>          
			  </div>
			</div>
			
			
          </div>
        </div>
      </div>
    </section>
   	
	<section class="ftco-section contact-section">
      <div class="container">        
        <div class="row block-9">
          <div class="col-md-6 order-md-last d-flex">
            <form action="#" class="bg-light p-5 contact-form">
				<h2 class="h3">Contact Information</h2>
				<p><span>Address:</span><br> Jl. Ki Hajar Dewantara No. 1, Summarecon Serpong <br>Tangerang 15810, Banten</p>
				<p><span>Customer Service:</span>
					<br> (021) 54203355 (hunting) ext 5
					<br>(021) 54210707 (hunting) ext 5
					<br>Fax: 021-54210700
				<p><a href="www.pahoa.sch.id">www.pahoa.sch.id</a></p>
				</p>              
            </form>          
          </div>
        </div>
      </div>
		</section>
		<?php $this->load->view("_partials/modal_daftar.php") ?>
	<?php $this->load->view("_partials/footer.php") ?>

  <?php $this->load->view("_partials/js.php") ?>
    
  </body>
</html>

