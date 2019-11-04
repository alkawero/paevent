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
</style>
<html lang="en">

<head>
	<?php $this->load->view("_partials/head.php") ?>
</head>

<body>

	<?php $this->load->view("_partials/navbar.php") ?>
	<!-- END nav -->

	<div class="hero-wrap" style="background-image: url('<?= base_url(); ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
		<div class="container">
			<div style="padding-top:100px;">
				<form method="post" action="<?= base_url('Registration/payment_upload'); ?>">
					<div class="form-group">
						<label for="event_id">Event Name</label>
						<select id="event_id" name="event_id" class="custom-select">
							<option>Select Seminar</option>
							<option selected value="1">Sigma</option>
						</select>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="image_evidence">Password</label>
						<input type="file" class="form-control" id="image_evidence" name="image_evidence">
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>









	<?php $this->load->view("_partials/footer.php") ?>

	<?php $this->load->view("_partials/js.php") ?>

</body>

</html>
