<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Registration_model extends CI_Model
{
    private $_table = "participant";

    public $id;
    public $name;
    public $email;
    public $type = "default.jpg";
	public $phone;
	public $registration_code;
	public $payment_id;
	public $event_id;
	public $quota;
	public $niy;
	public $agency;
	public $ticket;

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'numeric'],
            
            ['field' => 'description',
            'label' => 'Description',
            'rules' => 'required']
        ];
    }

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
	public function getByRegistrationCode($code)
    {
        return $this->db->get_where($this->_table, ["registration_code" => $code])->row();
	}

	public function countPendaftar()
    {
        return $this->db->count_all_results($this->_table);
	}

	public function countPeserta()
    {
        $this->db->select_sum('quota','quota');
		return $this->db->get($this->_table)->row()->quota;
	}

	
    public function save($payment_id)
    {
		$post = $this->input->post();
		$this->load->model("event_model");
		$this->load->model("sesi_model");

		$event = $this->event_model->getActiveEvent();		

		$this->name = $post["txtNama"];
        $this->email = $post["txtEmail"];
		$this->type = (int)$post["txtJenis"];
		$this->phone = $post["txtWA"];
		$this->agency = $post["txtInstansi"];
		$this->niy = $post["txtNIS"];
		$this->quota = $post["jumlah"];
		$this->registration_code = $event->id."-".$post["txtJenis"]."-".$payment_id;  
		$this->payment_id = $payment_id;        
		$this->event_id = $event->id;

		$this->db->insert($this->_table, $this);
		$participant_id =  $this->db->insert_id();
		
		$array_sesi = $post['cSesi'];
		foreach ($array_sesi as $sesi ) {
			$this->sesi_model->save($sesi,$participant_id);
		}

		return $participant_id ;
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
	
	public function set_ticket_file($id,$file_url)
    {
		$this->db->set('ticket', $file_url);
		$this->db->where('id', $id);
		$this->db->update($this->_table);
    }

    public function delete($id)
    {
        
    }
}
