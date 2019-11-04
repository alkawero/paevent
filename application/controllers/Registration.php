<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration  extends CI_Controller {	
	
	public function __construct()
    {
        parent::__construct();
        $this->load->model("registration_model");
    }
	

	public function save()
	{
		$this->registration_model->save();
		$this->load->view('payment_confirmation');
	}

	public function payment_confirmation()
	{
		$this->load->view('payment_confirmation');
	}

	public function payment_upload()
	{
		$post = $this->input->post();
		$email = $post['email'];
		$event_id = (int)$post['event_id'];

		$payment = $this->registration_model->getByEmailAndEventId($email,$event_id);
		$uploadedImage = "itu.jpg";		
		$this->registration_model->payment_upload($payment->payment_id,$uploadedImage);
		
		$config['upload_path'] = base_url('images/');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1500;
        $config['max_height'] = 1500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image_evidence')) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('landing');
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $this->load->view('landing');
        }
		
	}

	public function participant_list()
	{
		$data['participants'] = $this->registration_model->getAll();
		$this->load->view('admin/participant_list',$data);
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
