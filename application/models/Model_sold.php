<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_sold extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
	}

	public function getAllSold()
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$query = $this->db->get();
		return $query->result_array();
    }
}