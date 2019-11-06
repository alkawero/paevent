<?php
if ($_SESSION['logged_in'] !== true) {
	redirect('Login', 'refresh');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>

	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Email</th>
							<th>Code</th>
							<th>Type</th>
							<th>Phone</th>
							<th>Price</th>
							<th>Payment</th>
							<th>Evidence</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($participants as $participant) : ?>
							<tr>
								<td><?= $participant->email; ?></td>
								<td><?= $participant->registration_code; ?></td>
								<td>
									<?php
										if ($participant->type == 1) {
											echo "Umum";
										} else if ($participant->type == 2) {
											echo "Profesional Pendidik";
										} else if ($participant->type == 3) {
											echo "Orang Tua Siswa Pahoa";
										}
										?>

								</td>
								<td><?= $participant->phone; ?></td>
								<td>
									<?= "Rp. " . number_format($participant->price, 0); ?>
								</td>
								<td>
									<?php
										if ($participant->status == 1) {
											echo "Waiting";
										} else if ($participant->status == 2) {
											echo "Uploaded";
										} else if ($participant->status == 3) {
											echo "Paid";
										} else if ($participant->status == 4) {
											echo "Rejected";
										}
										?>
								</td>
								<td>
									<?php
										if ($participant->status == 1 || $participant->type == 3) {
											echo "-";
										} else {
											?>
										<a target='blank' href="<?= base_url('images/') . $participant->bukti_bayar; ?>">link</a>
									<?php
										}
										?>

								</td>
								<td>
									<?php
										if (
											$participant->status == 2
											|| ($participant->type == 3 && $participant->status <= 2)
										) {
											?>
										<button onClick="approve(<?= $participant->payment_id; ?>)" type="button" class="btn btn-sm btn-success">Approve</button>
										<button onClick="reject(<?= $participant->payment_id; ?>)" type="button" class="btn btn-sm btn-danger">Reject</button>
									<?php
										} else if ($participant->status == 3) {
											?>

										<button onClick="resend(<?= $participant->id; ?>)" type="button" class="btn btn-sm btn-primary">Resend</button>
										<button type="button" onClick="showTickets(<?= $participant->id; ?>)"class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalTickets">
											tickets
										</button>

										
									<?php
										}
										?>

								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Email</th>
							<th>Code</th>
							<th>Type</th>
							<th>Phone</th>
							<th>Price</th>
							<th>Payment</th>
							<th>Evidence</th>
							<th>Action</th>
						</tr>
					</tfoot>
				</table>


				<div class="modal fade" id="modalTickets" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">Click to download the tickets</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div id='modal_body_link' class="modal-body">
								tiket
							</div>
							
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->


	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>
	<?php $this->load->view("admin/_partials/js.php") ?>
	<script src="<?php echo base_url('js/participant_list.js') ?>"></script>

</body>

</html>
