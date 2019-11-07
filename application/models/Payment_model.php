<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model
{
    private $_table = "payment";

    public $id;
    public $event_id;
    public $price=0;
    public $status = 1;
	public $bukti_bayar;

    
    public function getAll()
    {
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('payment', 'payment.id = participant.payment_id');
		$query = $this->db->get();

		return $query->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
	}
	
	public function getByEmailAndEventId($email, $event_id)
    {
        return $this->db->get_where($this->_table, ["email" => $email, "event_id"=>$event_id])->row();
	}
	
	public function countLunas()
    {
		$this->db->where('status', 3);
		$this->db->from($this->_table);
        return $this->db->count_all_results();
	}

	public function countWaiting()
    {
        $this->db->where('status', 2);
		$this->db->from($this->_table);
        return $this->db->count_all_results();
	}


	
    public function save()
    {
		$post = $this->input->post();
		$participant_type = (int)$post["txtJenis"];
		
		$this->load->model("event_model");
		$event = $this->event_model->getActiveEvent();
		$this->event_id = $event->id;

		if($participant_type!=3){
			
			$this->db->select_max('id','max_id');
			$this->db->from($this->_table);
			$query = $this->db->get();
			$max =(int) $query->row('max_id');

			$array_sesi = $post['cSesi'];
			$totalSesi = count($array_sesi);
			

			$jumlah = (int)$post["jumlah"];
			$total = $event->price * $jumlah * $totalSesi;
			$total = $total + ($max+1);
			
        	$this->price = $total;
		}else{
			$this->status = 3;
		}	

		$this->db->insert($this->_table, $this);
		return $this->db->insert_id();
	}
	
	

    public function payment_approval($status)
    {
		$post = $this->input->post();
		$this->db->set('status', $status);
		$this->db->where('id', (int)$post['payment_id']);
		$this->db->update('payment');
	}
	
	public function payment_upload($id_payment,$uploadedImage)
    {
		$this->db->set('status', 2);
		$this->db->set('bukti_bayar', $uploadedImage);
		$this->db->where('id', $id_payment);
		$this->db->update('payment');
    }

    public function delete($id)
    {
        
    }
}
