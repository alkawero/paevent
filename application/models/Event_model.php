<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model
{
    private $_table = "event";

    public $id;
    public $name;
    public $speaker;
	public $date_start;
	public $date_end;
	public $time_start;
	public $time_end;
	public $status;

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
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        
    }

    public function update()
    {
        
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
