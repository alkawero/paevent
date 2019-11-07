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
				<form method="post" action="<?= base_url('Registration/resend_ticket'); ?>">

					<div class="form-group">
						<h4>Jika pembayaran anda sudah kami terima namun belum mendapatkan tiket,</h4>
						<h4>anda dapat melakukan permintaan kirim ulang tiket dengan mengisi email atau kode registrasi yang sudah anda dapatkan.</h4>
					</div>

					<div class="form-group">
						<label for="email">Email atau Kode Registrasi</label>
						<input type="text" class="form-control" id="email_registration" name="email_registration">
					</div>
					<?php
					if (!isset($success)) {
						?>
						<button type="submit" class="btn btn-primary">Kirim Ulang Tiket</button>
					<?php
					}
					?>


				</form>

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

			</div>
		</div>
	</div>








	<?php $this->load->view("_partials/modal_daftar.php") ?>
	<?php $this->load->view("_partials/footer.php") ?>

	<?php $this->load->view("_partials/js.php") ?>

</body>

</html>
