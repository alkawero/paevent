<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sibling_model extends CI_Model
{
    private $_table = "ms_sibling";

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
    
    public function getSiblings($niy)
    {
		$this->db->select('niy');
		$this->db->where("kode_sibling = (select kode_sibling from ".$this->_table." where niy = '".$niy."')",NULL,false);
		$this->db->where("niy <> '".$niy."'");
		return $this->db->get($this->_table)->result();        
	}
	
	
}
