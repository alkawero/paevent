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
				<form method="post" enctype="multipart/form-data" action="<?= base_url('Registration/payment_upload'); ?>">
					<?php
					if (isset($registration_code)) {
						?>
						<div class="form-group">
							<h5>Silahkan unggah bukti bayar, kami akan segera melakukan pengecekan dan mengirim tiketnya melalui email anda.</h5>
							<h5>mohon simpan <strong>Kode Registrasi</strong> berikut, kami juga sudah mengirimkannya ke email anda.</h5>							
							<h4>Kode Registrasi harus sama persis, termasuk tanda " - " (strip) </h4>
						</div>
					<?php
					} else {
						?>
						<h5>Gunakan <strong>Kode Registrasi</strong> yang telah kami kirimkan melalui email saat anda melakukan pendaftaran.</h5>
					<?php
					}
					?>

					<div class="form-group">
						<label for="email">Kode Registrasi</label>
						<?php
						if (isset($registration_code)) {
							?>
							<input type="text" value="<?= $registration_code; ?>" class="form-control" id="registration_code" name="registration_code">
						<?php
						} else {
							?>
							<input type="text" class="form-control" id="registration_code" name="registration_code">
						<?php
						}
						?>

					</div>
					<div class="form-group">
						<label for="image_evidence">Bukti Pembayaran</label>
						<input type="file" class="form-control" name="image">
					</div>
					<button type="submit" class="btn btn-primary">Unggah Bukti Bayar</button>
				</form>

				<?php
				if (isset($error)) {
					?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $error ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>


				<?php
				}
				?>

				<?php
				if (isset($success)) {
					?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $success ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

				<?php
				}
				?>

			</div>
		</div>
	</div>









	<?php $this->load->view("_partials/footer.php") ?>

	<?php $this->load->view("_partials/js.php") ?>

</body>

</html>
