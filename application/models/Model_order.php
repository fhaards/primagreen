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
		$this->db->from('order');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllOrderByStatus($status)
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id_user=order.id_user', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("order.status", $status);
		$this->db->order_by("tgl_pesan", "ASC");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllOrderGroupBy()
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id_user=order.id_user', 'inner');
		$this->db->group_by("no_pemesanan");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllOrderByUser($iduser)
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id_user=order.id_user', 'inner');
		$this->db->join('kurir', 'kurir.id_kurir=order.id_kurir', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("order.id_user", $iduser);
		$this->db->order_by("tgl_pesan", "ASC");
		return $this->db->get();
	}

	public function getAllOrderByUser_count($iduser)
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id_user=order.id_user', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("order.id_user", $iduser);
		return $this->db->get()->num_rows();
	}

	public function getAllOrderByUser_paging($number, $offset, $iduser)
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id_user=order.id_user', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("order.id_user", $iduser);
		$this->db->limit($number, $offset);
		$this->db->order_by("tgl_pesan", "DESC");
		return $this->db->get();
	}

	public function getAllOrderByNoOrder($noOrder)
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id_user=order.id_user', 'inner');
		$this->db->join('products', 'products.id_barang=order.id_barang', 'inner');
		$this->db->where("order.no_pemesanan", $noOrder);
		return $this->db->get();
	}

	public function getAllOrderByNoOrder_GroupBy($noOrder)
	{
		$this->db->select('*');
		$this->db->from('order');
		$this->db->join('user', 'user.id_user=order.id_user', 'inner');
		$this->db->join('products', 'products.id_barang=order.id_barang', 'inner');
		$this->db->join('kurir', 'kurir.id_kurir=order.id_kurir', 'inner');
		$this->db->group_by("no_pemesanan");
		$this->db->where("order.no_pemesanan", $noOrder);
		return $this->db->get();
	}

	public function getAllOrderByMonthYear($month, $year)
	{
		$this->db->select('no_pemesanan,tgl_pesan,order.total_harga,status,order.hrg_kurir,kurir.nm_kurir,products.harga,qty_pesan');
		$this->db->select('SUM(qty_pesan) as tqty');
		$this->db->select('SUM(products.harga) as tharga');
		$this->db->select('SUM(order.total_harga) as totAll');
		$this->db->from('order');
		$this->db->join('products', 'products.id_barang=order.id_barang', 'inner');
		$this->db->join('kurir', 'kurir.id_kurir=order.id_kurir', 'inner');
		$this->db->where("DATE_FORMAT(tgl_pesan,'%m')", $month);
		$this->db->where("DATE_FORMAT(tgl_pesan,'%Y')", $year);
		$this->db->where('status', 'COMPLETE');
		$this->db->group_by("no_pemesanan");
		$query = $this->db->get();
		$count = $query->num_rows();
		if (!empty($count)) {
			return $query;
		} else {
			$this->session->set_flashdata('dataNotFound', 'Data Not Found');
			redirect('sold/sold-list');
			return false;
		}
	}

	public function insertOrder($data)
	{
		$this->db->insert('order', $data);
	}

	public function uploadTransfer($data)
	{
		return $this->db->insert('pay_con', $data);
	}

	public function changeStatusOrder($no_pemesanan, $status_order)
	{
		$this->db->set('status', $status_order);
		$this->db->where('no_pemesanan', $no_pemesanan);
		return $this->db->update('order');
	}

	public function changeStatusOrderToProcess($no_pemesanan)
	{
		$this->db->set('status', 'PROCESS');
		$this->db->where('no_pemesanan', $no_pemesanan);
		return $this->db->update('order');
	}
	public function changeStatusComplete($no_pemesanan, $status_order, $get_resi)
	{
		$dateNow  = date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->from('order');
		$this->db->where("order.no_pemesanan", $no_pemesanan);
		$query = $this->db->get();
		foreach ($query->result() as $key) {
			$getBarang = $key->id_barang;
			$getQty = $key->qty_pesan;
			$data  = array(
				'id_barang' => $getBarang,
				'qty_pesan' => $getQty,
				'id_user' => $key->id_user,
				'no_pemesanan' => $key->no_pemesanan,
				'total_harga' => $key->total_harga,
				'tgl_pesan' => $key->tgl_pesan,
				'tgl_pnjl' => $dateNow,
				'id_kurir' => $key->id_kurir,
				'hrg_kurir' => $key->hrg_kurir,
				'nama_t' => $key->nama_t,
				'alamat_t' => $key->alamat_t,
				'no_resi' => $get_resi
			);
			$inserting = $this->db->insert('order_sold', $data);
			if ($inserting) {
				$this->db->select('*');
				$this->db->from('products');
				$this->db->where("products.id_barang", $getBarang);
				$query2 = $this->db->get();
				foreach ($query2->result() as $key2) {
					$getStok = $key2->stok;
					$setNewStok = $getStok - $getQty;
					$this->db->set('stok', $setNewStok);
					$this->db->where('id_barang', $getBarang);
					$finish = $this->db->update('products');
				}
			}
		}
		if ($finish) {
			$this->db->set('status', $status_order);
			$this->db->where('no_pemesanan', $no_pemesanan);
			return $this->db->update('order');
		}
	}
}


// $data = array();
// foreach ($query as $key) {
// 	$data[]  = array(
// 		'id_barang' => $key['id_barang'],
// 		'qty_pesan' => $key['qty_pesan'],
// 		'id_user' => $key['id_user'],
// 		'no_pemesanan' => $key['no_pemesanan'],
// 		'total_harga' => $key['total_harga'],
// 		'tgl_pnjl' => $key['tgl_pesan'],
// 		'id_kurir' => $key['id_kurir'],
// 		'hrg_kurir' => $key['hrg_kurir'],
// 		'nama_t' => $key['nama_t'],
// 		'alamat_t' => $key['alamat_t']
// 	);
// }
// $inserting = $this->db->insert_batch('penjualan', $data);
// if ($inserting) {
// 	$this->db->set('status', $status_order);
// 	$this->db->where('no_pemesanan', $no_pemesanan);
// 	return $this->db->update('pemesanan');
// }