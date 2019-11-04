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
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
	}
	
	public function getByEmailAndEventId($email, $event_id)
    {
        return $this->db->get_where($this->_table, ["email" => $email, "event_id"=>$event_id])->row();
    }


	
    public function save()
    {
		$post = $this->input->post();
		$payment_id = 1;
        $this->name = $post["txtNama"];
        $this->email = $post["txtEmail"];
		$this->type = (int)$post["txtJenis"];
		$this->phone = $post["txtWA"];
		$this->agency = $post["txtInstansi"];
		$this->nis = $post["txtNIS"];
		$this->quota = $post["jumlah"];
		$this->payment_id = $payment_id;        
		$this->event_id = (int)$post["event_id"];

        $this->db->insert($this->_table, $this);
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
