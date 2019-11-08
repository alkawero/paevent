<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration  extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("registration_model");
		$this->load->model("event_model");
		$this->load->model("payment_model");
		$this->load->model("ticket_model");
		$this->load->model("sesi_model");
		$this->load->model("undangan_ortu_model");
		$this->load->model("sibling_model");
		$this->load->library('email');
	}


	public function save()
	{
		$post = $this->input->post();

		if ($post['txtJenis'] === '3') {
			$niy = $post['txtNIS'];
			$undangan = $this->undangan_ortu_model->getByNiy($niy);
			if ($undangan) {
				$siblingsObj = $this->sibling_model->getSiblings($niy);
				
				$ortuExisting =  $this->registration_model->getByNiy($niy);

				if($ortuExisting){
					$data['error_niy'] = "Pendaftaran sebelumnya sudah dilakukan dengan menggunakan Nomor Induk Siswa yang sama";		
				}
				
				//lanjut pengecekan sibling
				if ($siblingsObj) {
					$niys = array();
					foreach ($siblingsObj as $sib) {
						$niys[] = $sib->niy;
					}
					$participantWithOtherSibling = $this->registration_model->getByNiys($niys);
					//var_dump($participantWithOtherSibling);die;
					if($participantWithOtherSibling){
						$data['error_sibling'] = "Pendaftaran sebelumnya sudah dilakukan dengan menggunakan Nomor Induk Siswa (sibling)";		
					}
				}
			} else {
				$data['error_niy'] = "Nomor Induk Siswa tidak ditemukan, mohon gunakan nomor induk terdaftar";
			}
			


		}


		if (!isset($data['error_niy']) && !isset($data['error_sibling'])) {
			$payment_id = $this->payment_model->save();
			$payment = $this->payment_model->getById($payment_id);

			$participant_id = $this->registration_model->save($payment_id);
			$participant = $this->registration_model->getById($participant_id);

			$data['registration_code'] = $participant->registration_code;

			$data['harga'] = $payment->price;

			if($post['txtJenis'] === '3'){
				$this->undangan_ortu_model->updateStatus($post['txtNIS'],"registered");
				$this->send_ticket($participant_id);
				$data['parent']=true;
			}else{
				$this->send_email_registration($participant->email, $payment->price, $participant->registration_code);
			}

			
		}


		$this->load->view('invoice', $data);
	}

	public function payment_confirmation()
	{
		$post = $this->input->post();
		$data = array();
		if (isset($post['registration_code'])) {
			$data['registration_code'] = $post['registration_code'];
		}

		$this->load->view('payment_confirmation', $data);
	}

	public function help()
	{		
		$this->load->view('help');
	}

	public function resend_ticket()
	{		
		$parameter = $_POST['email_registration'];
		$participant = $this->registration_model->getByEmailOrRegCode($parameter);		
		if($participant){
			$this->send_ticket($participant->id);
			$data['success']="ticket telah kami kirim ulang";
		}else{
			$data['error']="email atau kode registrasi tidak terdaftar atau pembayaran belum kami terima";
		}
		
		$this->load->view('help',$data);
	}

	public function payment_upload()
	{
		$post = $this->input->post();
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload');
		$this->upload->initialize($config);
		$image = 'image';
		$result = array();
		$registration_code = $post['registration_code'];

		if (!$registration_code) {
			$result['error'] = "Mohon isi kode registrasi dengan benar";
		} else {
			$payment = $this->registration_model->getByRegistrationCode($registration_code);
				if(!$payment){
					$result['error'] = "kode registrasi tidak terdaftar";
				}			
		}

		if(!isset($result['error'])){
			if (!$this->upload->do_upload($image)) {
				$result['error'] = $this->upload->display_errors();
				$this->load->view('payment_confirmation', $result);
			} else {
				$data = array('file_name' => $this->upload->data('file_name'));
				$uploadedImage = $data['file_name'];
				$this->registration_model->payment_upload($payment->payment_id, $uploadedImage);
				$result['success'] = "Berhasil, kami akan cek pembayaran anda dan tiket akan dikirim lewat email mohon cek email anda secara berkala";	
			}
		}

		$this->load->view('payment_confirmation', $result);
	}

	public function participant_list()
	{
		$data['participants'] = $this->registration_model->getAll();
		$this->load->view('admin/participant_list', $data);
	}


	public function payment_approve()
	{
		$this->registration_model->payment_approval(3);
	}

	public function payment_reject()
	{
		$this->registration_model->payment_approval(4);
	}

	public function send_ticket($participant_id=null)
	{		
		$post = $post = $this->input->post();
		if(null===$participant_id){
			$participant_id = $post['participant_id'];
		}
		$this->load->library('PDF128');
		$directory = "files/tickets/";
		$sessis = $this->sesi_model->getByParticipantId($participant_id);
		$participant = $this->registration_model->getById($participant_id);
		$this->ticket_model->deleteByParticipantId($participant_id);

		$attachments = array();

		foreach ($sessis as $sesi) { //cetak setiap sesi 
			for ($i = 1; $i < $participant->quota + 1; $i++) {
				$code = '0' . $participant->type . '0' . $sesi->sesi . $participant->id;

				while (strlen($code . $i) < 10) {
					$code .= "0";
				}
				$code .= $i;

				$pdf = new PDF_Code128('l', 'mm', 'A5');
				// membuat halaman baru
				$pdf->AddPage('P');
				// setting jenis font yang akan digunakan
				$pdf->SetFont('Arial', '', 10);
				$pdf->Cell(0, 10, 'No. Tiket : ' . $code, 0, 1);
				$pdf->Cell(0, 10, 'Nama      : ' . $participant->name, 0, 1);
				$pdf->Cell(0, 10, 'Email      : ' . $participant->email, 0, 1);
				$pdf->Cell(0, 10, 'Berikut kami lampirkan undangan elektronik untuk menghadiri SIGMA SEMINAR', 0, 1);
				$pdf->Cell(0, 10, 'SEKOLAH TERPADU PAHOA 2019, yang dilaksanakan pada:', 0, 1);
				$pdf->Cell(0, 10, 'Hari / Tanggal	: Rabu, 18 Desember 2019', 0, 1);
				if ($sesi->sesi == 1) {
					$pdf->Cell(0, 10, 'Waktu		            : Pk 09.00 - 11.00 WIB (Sesi 1)', 0, 1);
				} else {
					$pdf->Cell(0, 10, 'Waktu		            : Pk 13.00 - 15.00 WIB (Sesi 2)', 0, 1);
				}

				$pdf->Cell(0, 10, 'Tempat		         : SekolahTerpadu Pahoa Gedung F Lantai 9', 0, 1);


				$pdf->Code128(35, 95, $code, 80, 20);
				$pdf->Cell(0, 30, '', 0, 1);
				$pdf->SetFont('Arial', '', 8);
				$pdf->Cell(0, 5, '- Undangan ini wajib dicetak di kertas berukuran A4 dan wajib dibawa pada hari seminar ', 0, 1);
				$pdf->Cell(0, 5, 'untuk ditukarkan dengan Tanda Pengenal Peserta', 0, 1);
				$pdf->Cell(0, 5, '- Satu undangan hanya berlaku untuk satu peserta', 0, 1);
				$pdf->Cell(0, 5, '- Anak dibawah umur 17 tahun dilarang untuk masuk kedalam ruang seminar.', 0, 1);
				$pdf->Cell(0, 5, '- Registrasi akan dibuka mulai pk 08.00', 0, 1);
				$pdf->SetFont('Arial', 'B', 8);
				$pdf->Cell(0, 5, '- Dress code : Batik resmi', 0, 1);
				$pdf->SetFont('Arial', '', 8);
				$pdf->Cell(0, 5, '- Dilarang merokok di dalam area seminar maupun area Sekolah Terpadu Pahoa', 0, 1);
				$pdf->Cell(0, 5, '- Panitia berhak untuk tidak memberikan ijin masuk kedalam tempat seminar', 0, 1);
				$pdf->Cell(0, 5, '  apabila syarat diatas tidak dipenuhi', 0, 1);
				$pdf->Cell(0, 10, '', 0, 1);
				$pdf->Cell(0, 5, 'SekolahTerpadu Pahoa, Jl. Ki HajarDewantara No1, SummareconSerpong, Tangerang 15810', 0, 1);
				$pdf->SetTextColor(0, 0, 255);
				$pdf->SetFont('Arial', 'U', 8);
				$pdf->Cell(0, 5, 'http://sispahoa.sch.id/seminar/', 0, 1, 'C', false, 'http://sispahoa.sch.id/seminar/');
				//$pdf->Line(15, 190, 130, 190);
				$file_name = "tickets" . $code . ".pdf";
				$pdf_path = $directory . $file_name;
				$pdf->Output('F', $pdf_path);

				array_push($attachments, $pdf_path);

				$file_url = base_url('files/tickets/') . $file_name;

				$this->ticket_model->save($file_url, $participant_id, $code);
			}
		}

		$this->send_email_ticket($participant->email, $attachments);
	}

	public function get_tickets()
	{
		$get = $this->input->get();
		$result = $this->ticket_model->getByParticipantId($get['participant_id']);
		echo json_encode($result);
	}

	public function send_email_registration($to_email, $price, $registration_code)
	{
		$config = array();
		$config['charset'] = 'iso-8859-1';
		$config['useragent'] = 'Registrasi Seminar "Significance of Mathematics" ';
		$config['protocol'] = "smtp";
		$config['mailtype'] = "html";
		$config['smtp_host'] = "smtp.gmail.com"; //pengaturan smtp
		$config['smtp_port'] = "587";
		$config['_smtp_auth'] = TRUE;
		$config['smtp_timeout'] = "400";
		$config['smtp_user'] = "pahoaevent@gmail.com"; // isi dengan email kamu
		$config['smtp_pass'] = "Pahoa12345"; // isi dengan password kamu
		$config['smtp_crypto'] = 'tls';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		$config['bcc_batch_mode'] = TRUE;
		$email = $to_email;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from($config['smtp_user'], 'Pahoa Event');
		$this->email->to($email, 'Registrasi Seminar Pahoa');
		$this->email->bcc($email);
		$this->email->subject('Registrasi Seminar "Significance of Mathematics"');

		$data = array(
			'price' => $price,
			'registration_code' => $registration_code
		);
		$body = $this->load->view('invoice_email.php', $data, TRUE);
		$this->email->message($body);
		$send = $this->email->send();
		if ($send) {
			//echo $send;
		} else {
			$error = $this->email->print_debugger(array('headers'));
			echo $error;
		}
	}


	public function send_email_ticket($to_email, $attachments)
	{
		$config = array();
		$config['charset'] = 'iso-8859-1';
		$config['useragent'] = 'Tiket Seminar Sigma';
		$config['protocol'] = "smtp";
		$config['mailtype'] = "html";
		$config['smtp_host'] = "smtp.gmail.com"; //pengaturan smtp
		$config['smtp_port'] = "587";
		$config['_smtp_auth'] = TRUE;
		$config['smtp_timeout'] = "400";
		$config['smtp_user'] = "pahoaevent@gmail.com"; // isi dengan email kamu
		$config['smtp_pass'] = "Pahoa12345"; // isi dengan password kamu
		$config['smtp_crypto'] = 'tls';
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		$config['bcc_batch_mode'] = TRUE;
		$email = $to_email;
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->email->from($config['smtp_user'], 'Pahoa Event');
		$this->email->to($email, 'Seminar Pahoa');
		$this->email->bcc($email);
		$this->email->subject('Tiket Seminar Sigma');
		$i = 1;
		foreach ($attachments as $attachment) {
			$this->email->attach($attachment, 'attachment', 'ticket' . $i++ . '.pdf');
		}

		$data = array(
			'price' => "1",
			'registration_code' => '1'
		);
		$body = $this->load->view('admin/ticket_email.php', $data, TRUE);
		$this->email->message($body);
		$send = $this->email->send();
		if ($send) {
			//echo $send;
		} else {
			$error = $this->email->print_debugger(array('headers'));
			echo $error;
		}
	}
}
