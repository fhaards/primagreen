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
		$this->db->join('user', 'user.id_user=penjualan.id_user', 'inner');
		$this->db->group_by("no_pemesanan");
		return $this->db->get();
	}

	public function getAllSoldByNoOrder($noOrder)
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('user', 'user.id_user=penjualan.id_user', 'inner');
		$this->db->join('barang', 'barang.id_barang=penjualan.id_barang', 'inner');
		$this->db->where("penjualan.no_pemesanan", $noOrder);
		return $this->db->get();
	}

	public function getAllSoldByNoOrder_GroupBy($noOrder)
	{
		$this->db->select('*');
		$this->db->from('penjualan');
		$this->db->join('user', 'user.id_user=penjualan.id_user', 'inner');
		$this->db->join('barang', 'barang.id_barang=penjualan.id_barang', 'inner');
		$this->db->join('kurir', 'kurir.id_kurir=penjualan.id_kurir', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("penjualan.no_pemesanan", $noOrder);
		return $this->db->get();
	}
}