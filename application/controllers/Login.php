<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login  extends CI_Controller
{



	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("registration_model");
		$this->load->model("payment_model");
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function auth()
	{
		$post = $this->input->post();
		$id = $post['username'];
		$password = sha1($post['password']);
		$user = $this->user_model->getByIdPassword($id, $password);
		//return var_dump($password);

		if ($user) {
			$loggedUser = array(
				'username'  => $post['username'],
				'password'     => $post['password'],
				'groupx'     => $user->user_group,
				'logged_in' => true
			);

			$this->session->set_userdata($loggedUser);
			$jumlahPendaftar = $this->registration_model->countPendaftar();
			$jumlahPeserta = $this->registration_model->countPeserta();
			$jumlahLunas = $this->payment_model->countLunas();
			$jumlahWaiting = $this->payment_model->countWaiting();
			$data['jumlahPendaftar'] = $jumlahPendaftar;
			$data['jumlahPeserta'] = $jumlahPeserta;
			$data['jumlahLunas'] = $jumlahLunas;
			$data['jumlahWaiting'] = $jumlahWaiting;			

			$this->load->view('admin/overview',$data);
		} else {
			$this->load->view('landing');
		}
	}

	public function logout()
	{
		redirect('', 'refresh');
	}
}
