<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_courier extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
	}
	
	public function getAllCourier(){
		$this->db->select('*');
		$this->db->from('kurir');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getCourierById($id){
		$this->db->select('*');
		$this->db->from('kurir');
		$this->db->where('id_kurir', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
}