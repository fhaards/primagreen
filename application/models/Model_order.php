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
		$this->db->join('kurir', 'kurir.id_kurir=pemesanan.id_kurir', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("pemesanan.id_user",$iduser);
		return $this->db->get();
	}

	public function getAllOrderByNoOrder($noOrder)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('user', 'user.id_user=pemesanan.id_user', 'inner');
		$this->db->join('barang', 'barang.id_barang=pemesanan.id_barang', 'inner');
		$this->db->where("pemesanan.no_pemesanan",$noOrder);
		return $this->db->get();
	}

	public function getAllOrderByNoOrder_GroupBy($noOrder)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('user', 'user.id_user=pemesanan.id_user', 'inner');
		$this->db->join('barang', 'barang.id_barang=pemesanan.id_barang', 'inner');
		$this->db->join('kurir', 'kurir.id_kurir=pemesanan.id_kurir', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("pemesanan.no_pemesanan",$noOrder);
		return $this->db->get();
	}

	public function insertOrder($data){
		$this->db->insert('pemesanan', $data);
	}

	public function muploadTransfer()
	{
		$data = [
            "no_pemesanan" => $this->input->post('no_pemesanan', true),
            "ket" => $this->input->post('ket', true)
        ];
		return $this->db->insert('pay_con', $data);
	}
}