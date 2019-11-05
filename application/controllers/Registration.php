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
		
		if (!$this->upload->do_upload($image)) {
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('payment_confirmation',$error);
		} else {
			$data = array('file_name' => $this->upload->data('file_name'));
			$uploadedImage = $data['file_name'];
			
			$registration_code = $post['registration_code'];

			$payment = $this->registration_model->getByRegistrationCode($registration_code);
			
			$this->registration_model->payment_upload($payment->payment_id, $uploadedImage);

			$success = array("success"=>"unggah bukti pembayaran berhasil dilakukan");

			$this->load->view('payment_confirmation',$success);
		}
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
}
