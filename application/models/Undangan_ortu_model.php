<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan_ortu_model extends CI_Model
{
    private $_table = "ms_undanganortu";

    public $id;
    public $kelas;
    public $niy;
	public $nama_siswa;
	public $nama_ortu;
	public $email;
	public $terkirimYN;
	public $status_register;
    
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getByNiy($niy)
    {
        return $this->db->get_where($this->_table, ["niy" => $niy])->row();
	}
	
	
}
