<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'user');
        return $this->db->get();
    }

    public function findBy($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('level', 'user');
        $this->db->where('id_user',$id);
        return $this->db->get();
    }

    public function changeAccount($id_user,$change_account){
		$this->db->where('id_user', $id_user);
		return $this->db->update('user', $change_account);
    }
}
