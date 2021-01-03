<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_f_homepage extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
	}

	public function getHomepage()
	{
	}

	public function getNewItems()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by("date_a", "desc");
		$this->db->limit(4);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getSomeItems()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->order_by("harga", "asc");
		$this->db->limit(8);
		$query = $this->db->get();
		return $query->result_array();
	}
}
