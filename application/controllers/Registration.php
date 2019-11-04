<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration  extends CI_Controller {	
	

	public function register()
	{
		$this->load->view('welcome');
	}

	public function payment_confirmation()
	{
		$this->load->view('payment_confirmation');
	}

	public function payment_upload()
	{
		$this->load->view('landing');
	}

	public function participant_list()
	{
		$this->load->view('admin/participant_list');
	}

	public function registration_list()
	{
		$this->load->view('admin/registration_list');
	}

	public function payment_approve()
	{
		$this->load->view('participant_list');
	}
}
