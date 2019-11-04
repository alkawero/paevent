<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("event_model");
	}
	
	public function index()
	{
		$data['event'] = $this->event_model->getActiveEvent();
		$this->load->view('landing',$data);
	}

	public function speaker()
	{
		$data['event'] = $this->event_model->getActiveEvent();
		$this->load->view('speaker',$data);
	}

	public function contact()
	{
		$data['event'] = $this->event_model->getActiveEvent();
		$this->load->view('contact',$data);
	}

	public function agenda()
	{
		$data['event'] = $this->event_model->getActiveEvent();
		$this->load->view('agenda',$data);
	}
}
