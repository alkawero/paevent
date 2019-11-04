<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event  extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("event_model");
    }
	
	public function index()
	{
		$this->load->view('event_list');
	}

	public function detail()
	{
		$get = $this->input->get();		
		$id =$get['event_id'];

		$result =  $this->event_model->getById($id);			
	}

	public function logout()
	{
		redirect('', 'refresh');
	}
}
