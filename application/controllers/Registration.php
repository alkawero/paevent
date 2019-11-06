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
				$code = '0'.$participant->type.'0'.$sesi->sesi.$participant->id;

				while(strlen($code.$i)<10){
					$code.="0";					
				}
				$code.=$i;
				
				$pdf = new PDF_Code128('l', 'mm', 'A5');
				// membuat halaman baru
				$pdf->AddPage('P');
				// setting jenis font yang akan digunakan
				$pdf->SetFont('Arial','',10);
				$pdf->Cell(0,10, 'No. Tiket : '.$code, 0, 1);
				$pdf->Cell(0,10, 'Nama      : '.$participant->name, 0, 1);
				$pdf->Cell(0,10, 'Email      : '.$participant->email, 0, 1);
				$pdf->Cell(0,10, 'Berikut kami lampirkan undangan elektronik untuk menghadiri SIGMA SEMINAR', 0, 1);
				$pdf->Cell(0,10, 'SEKOLAH TERPADU PAHOA 2019, yang dilaksanakan pada:', 0, 1);
				$pdf->Cell(0,10, 'Hari / Tanggal	: Rabu, 18 Desember 2019', 0, 1);
				if($sesi->sesi==1){
					$pdf->Cell(0,10, 'Waktu		: Pk 09.00 - 11.00 WIB (Sesi 1)', 0, 1);
				}else{
					$pdf->Cell(0,10, 'Waktu		: Pk 13.00 - 15.00 WIB (Sesi 2)', 0, 1);
				}				

				$pdf->Cell(0,10, 'Tempat		: SekolahTerpadu Pahoa Gedung F Lantai 9', 0, 1);
				

				$pdf->Code128(35, 95, $code, 80, 20);		
				$pdf->Cell(0,30, '', 0, 1);	
				$pdf->SetFont('Arial','',8);	
				$pdf->Cell(0,5, '- Undangan ini wajib dicetak di kertas berukuran A4 dan wajib dibawa pada hari seminar ', 0, 1);
				$pdf->Cell(0,5, 'untuk ditukarkan dengan Tanda Pengenal Peserta', 0, 1);	
				$pdf->Cell(0,5, '- Satu undangan hanya berlaku untuk satu peserta', 0, 1);
				$pdf->Cell(0,5, '- Anak dibawah umur 17 tahun dilarang untuk masuk kedalam ruang seminar.', 0, 1);
				$pdf->Cell(0,5, '- Registrasi akan dibuka mulai pk 08.00', 0, 1);
				$pdf->SetFont('Arial','B',8);
				$pdf->Cell(0,5, '- Dress code : Batik resmi', 0, 1);
				$pdf->SetFont('Arial','',8);
				$pdf->Cell(0,5, '- Dilarang merokok di dalam area seminar maupun area Sekolah Terpadu Pahoa', 0, 1);
				$pdf->Cell(0,5, '- Panitia berhak untuk tidak memberikan ijin masuk kedalam tempat seminar', 0, 1);
				$pdf->Cell(0,5, '  apabila syarat diatas tidak dipenuhi', 0, 1);
				$pdf->Cell(0,10, '', 0, 1);	
				$pdf->Cell(0,5, 'SekolahTerpadu Pahoa, Jl. Ki HajarDewantara No1, SummareconSerpong, Tangerang 15810', 0, 1);				
				$pdf->SetTextColor(0,0,255);
				$pdf->SetFont('Arial','U',8);	
				$pdf->Cell(0,5, 'http://sispahoa.sch.id/seminar/', 0, 1,'C',false,'http://sispahoa.sch.id/seminar/');					
				
				$file_name = "tickets" . $code . ".pdf";
	
				$pdf->Output('F', $directory . $file_name);
				$file_url = base_url('files/tickets/').$file_name;
	
				$this->ticket_model->save($file_url,$post['participant_id'],$code);
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
