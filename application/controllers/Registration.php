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
	}


	public function save()
	{
		$post = $this->input->post();
		$payment_id = $this->payment_model->save();

		$participant_id = $this->registration_model->save($payment_id);
		$participant = $this->registration_model->getById($participant_id);

		$data['registration_code'] = $participant->registration_code;
		$this->load->view('payment_confirmation', $data);
	}

	public function payment_confirmation()
	{
		$this->load->view('payment_confirmation');
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
			if (!$this->upload->do_upload($image)) {
				$result['error'] = $this->upload->display_errors();
				$this->load->view('payment_confirmation', $result);
			} else {
				$data = array('file_name' => $this->upload->data('file_name'));
				$uploadedImage = $data['file_name'];




				$payment = $this->registration_model->getByRegistrationCode($registration_code);

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

	public function send_ticket()
	{
		$post = $post = $this->input->post();
		$this->load->library('PDF128');
		$directory = "C:/xampp1-8-3/htdocs/seminar/files/tickets/";
		$sessis = $this->sesi_model->getByParticipantId($post['participant_id']);
		$participant = $this->registration_model->getById($post['participant_id']);
		$this->ticket_model->deleteByParticipantId($post['participant_id']);

		foreach ($sessis as $sesi) {//cetak setiap sesi 
			for ($i = 1; $i < $participant->quota + 1; $i++) {
				$pdf = new PDF_Code128('l', 'mm', 'A5');
				// membuat halaman baru
				$pdf->AddPage();
				// setting jenis font yang akan digunakan
				$pdf->SetFont('Arial', 'B', 16);
				// mencetak string 
				$pdf->Cell(190, 7, 'Tiket Seminar '.$i, 0, 1, 'C');
				$pdf->SetFont('Arial', 'B', 12);
				$pdf->Cell(190, 7, 'Pemilik', 0, 1, 'C');
				// Memberikan space kebawah agar tidak terlalu rapat
				$pdf->Cell(10, 7, '', 0, 1);
				$pdf->SetFont('Arial', 'B', 10);
				$pdf->Cell(20, 6, 'Nama', 1, 0);
				$pdf->Cell(85, 6, 'Email', 1, 0);
				$pdf->Cell(27, 6, 'NO HP', 1, 0);
				$pdf->Cell(25, 6, 'Sesi', 1, 1);
				$code = '0'.$participant->type.'0'.$sesi->sesi.$participant->id.$i;
				$pdf->Code128(50, 120, $code, 80, 20);
				$pdf->SetXY(50, 45);
				$file_name = "tickets" . $post['participant_id'] . $i . ".pdf";
	
				$pdf->Output('F', $directory . $file_name);
				$file_url = base_url('files/tickets/').$file_name;
	
				$this->ticket_model->save($file_url,$post['participant_id']);
			}
		}

		

		

		
	}

	public function get_tickets()
	{
		$get = $this->input->get();
		$result = $this->ticket_model->getByParticipantId($get['participant_id']);
		echo json_encode($result);
	}
}
