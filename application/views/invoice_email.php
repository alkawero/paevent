<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	<title>Pendaftaran Sigma</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
	<div>
		<center>
			<div class="login-logo">
				<img src='http://sispahoa.sch.id/seminar/images/kop_pahoa551.jpg' class=''>
			</div>
		</center>
		<hr>
		<div class="form-group">
			<h1>Selamat !!! Anda telah terdaftar sebagai peserta.</h1>
			<h4>Mohon lakukan pembayaran sebagai berikut : </h4>
			<div class="invoice">
				<p>Nominal : Rp. <?= number_format($price, 0); ?></p>
				<p>Bank : BCA</p>
				<p>Atas nama : YPP Pahoa</p>
				<p>No Rekening : 5405939999</p>
			</div>
			<h1>Kode Registrasi : <?= $registration_code; ?></h1>
			<h3>mohon simpan <strong>Kode Registrasi</strong> berikut untuk konfirmasi pembayaran, kami juga sudah mengirimkannya ke email anda.</h5>
				<h4>Kode Registrasi harus sama persis, termasuk tanda " - " (strip) </h4>
		</div>
		<br><br><br>

		Hormat Kami,<br><br>
		Sekolah Terpadu Pahoa<br>
		</p>

	</div>
	<br>
	<hr>
</body>

<footer>
	<p style="text-align:center; Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 10px;line-height: 25px;Margin-bottom: 25px">
		Sekolah Terpadu Pahoa, Jl. Ki HajarDewantara No/1, Summarecon Serpong, Tangerang 15810<br>
		<a href="http://sispahoa.sch.id/seminar/">http://sispahoa.sch.id/seminar/</a> <br>
	</p>
</footer>

</html>
