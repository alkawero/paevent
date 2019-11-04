<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login  extends CI_Controller {

	
	public function index()
	{
		$this->load->view('login');
	}

	public function auth()
	{
		$post = $this->input->post();
		
		$loggedUser = array(
			'username'  => $post['username'],
			'password'     => $post['password'],
			'logged_in' => true
	);
	
	$this->session->set_userdata($loggedUser);

		$this->load->view('admin/overview');
	}

	public function logout()
	{
		redirect('', 'refresh');
	}
}
