<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $_table = "seminar_user";

    public $id;
    public $name;
    public $email;
    public $type = "default.jpg";
	public $phone;
	public $registration_code;
	public $payment_id;
	public $event_id;
	public $quota;
	public $nis;
	public $agency;

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
	
	public function getByIdPassword($id, $password)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id, "password"=>$password])->row();
	}

	public function getByRegistrationCode($code)
    {
        return $this->db->get_where($this->_table, ["registration_code" => $code])->row();
	}

	
    public function save($payment_id)
    {
		$post = $this->input->post();
		$this->name = $post["txtNama"];
        $this->email = $post["txtEmail"];
		$this->type = (int)$post["txtJenis"];
		$this->phone = $post["txtWA"];
		$this->agency = $post["txtInstansi"];
		$this->nis = $post["txtNIS"];
		$this->quota = $post["jumlah"];
		$this->registration_code = $post["txtEmail"]."".$payment_id;  
		$this->payment_id = $payment_id;        
		$this->event_id = (int)$post["event_id"];

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
