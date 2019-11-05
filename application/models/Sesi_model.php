<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sesi_model extends CI_Model
{
    private $_table = "sesi";

    public $sesi;
    public $participant_id;
    
       
    public function getByParticipantId($id)
    {
        return $this->db->get_where($this->_table, ["participant_id" => $id])->result();
	}	
	
	
    public function save($sesi,$participant_id)
    {
		$this->sesi = $sesi;
        $this->participant_id = $participant_id;
		
		$this->db->insert($this->_table, $this);		
    }

    
    public function delete($id)
    {
        
    }
}
