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

	public function getAllCourier()
	{
		$this->db->select('*');
		$this->db->from('kurir');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllCourierEnabled()
	{
		$data = array('status_courier'=>'Enabled');
		$this->db->select('*');
		$this->db->from('kurir');
		$this->db->where($data);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getCourierById($id)
	{
		$this->db->select('*');
		$this->db->from('kurir');
		$this->db->where('id_kurir', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
	public function inputcourier($data)
	{
		return $this->db->insert('kurir', $data);
	}

	public function editcourier($idcourier, $data)
	{
		$this->db->where('id_kurir', $idcourier);
		$this->db->update('kurir', $data);
	}

	public function changecourierStatus($idcourier)
	{
		$this->db->select('status_courier');
		$this->db->from('kurir');
		$this->db->where('id_kurir', $idcourier);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$st  = $row->status_courier;
			if ($st == 'Enabled') {
				$sts = "Disabled";
			} else {
				$sts = 'Enabled';
			}
		}
		$this->db->set('status_courier', $sts);
		$this->db->where('id_kurir', $idcourier);
		$this->db->update('kurir');
	}
}
