<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("registration_model");
		$this->load->model("payment_model");
	}

	public function index()
	{
		$jumlahPendaftar = $this->registration_model->countPendaftar();
		$jumlahPeserta = $this->registration_model->countPeserta();
		$jumlahLunas = $this->payment_model->countLunas();
		$jumlahWaiting = $this->payment_model->countWaiting();
		$data['jumlahPendaftar'] = $jumlahPendaftar;
		$data['jumlahPeserta'] = $jumlahPeserta;
		$data['jumlahLunas'] = $jumlahLunas;
		$data['jumlahWaiting'] = $jumlahWaiting;
        $this->load->view("admin/overview",$data);
	}
}
