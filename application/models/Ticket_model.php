<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket_model extends CI_Model
{
    private $_table = "tickets";

    public $id;
	public $participant_id;
	public $ticket_url;
    
       
    public function getByParticipantId($id)
    {
        return $this->db->get_where($this->_table, ["participant_id" => $id])->result();
	}	
	
	
    public function save($ticket_url,$participant_id)
    {
		$this->ticket_url = $ticket_url;
        $this->participant_id = $participant_id;		
		$this->db->insert($this->_table, $this);	
		
    }

    
    public function deleteByParticipantId($participant_id)
    {
        $this->db->where('participant_id', $participant_id);
		$this->db->delete($this->_table);
    }
}
