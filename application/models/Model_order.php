<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_order extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
	}

	public function getAllOrder()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllOrderGroupBy()
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('user', 'user.id_user=pemesanan.id_user', 'inner');
		$this->db->group_by("no_pemesanan");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllOrderByUser($iduser)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('user', 'user.id_user=pemesanan.id_user', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("pemesanan.id_user",$iduser);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insertOrder($data){
		$this->db->insert('pemesanan', $data);
	}

}