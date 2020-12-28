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
		$this->db->where("pemesanan.id_user", $iduser);
		$this->db->order_by("tgl_pesan", "ASC");
		return $this->db->get();
	}

	public function getAllOrderByNoOrder($noOrder)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->join('user', 'user.id_user=pemesanan.id_user', 'inner');
		$this->db->join('barang', 'barang.id_barang=pemesanan.id_barang', 'inner');
		$this->db->where("pemesanan.no_pemesanan", $noOrder);
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
		$this->db->where("pemesanan.no_pemesanan", $noOrder);
		return $this->db->get();
	}

	public function insertOrder($data)
	{
		$this->db->insert('pemesanan', $data);
	}

	public function uploadTransfer($data)
	{
		return $this->db->insert('pay_con', $data);
	}

	public function changeStatusOrder($no_pemesanan, $status_order)
	{
		$this->db->set('status', $status_order);
		$this->db->where('no_pemesanan', $no_pemesanan);
		return $this->db->update('pemesanan');
	}

	public function changeStatusOrderToProcess($no_pemesanan)
	{
		$this->db->set('status', 'PROCESS');
		$this->db->where('no_pemesanan', $no_pemesanan);
		return $this->db->update('pemesanan');
	}
	public function changeStatusComplete($no_pemesanan, $status_order,$get_resi)
	{
		$this->db->select('*');
		$this->db->from('pemesanan');
		$this->db->where("pemesanan.no_pemesanan", $no_pemesanan);
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
				'tgl_pnjl' => $key->tgl_pesan,
				'id_kurir' => $key->id_kurir,
				'hrg_kurir' => $key->hrg_kurir,
				'nama_t' => $key->nama_t,
				'alamat_t' => $key->alamat_t,
				'no_resi' => $get_resi
			);
			$inserting = $this->db->insert('penjualan', $data);
			if($inserting){
				$this->db->select('*');
				$this->db->from('barang');
				$this->db->where("barang.id_barang", $getBarang);
				$query2 = $this->db->get();
				foreach ($query2->result() as $key2) {
					$getStok = $key2->stok;
					$setNewStok = $getStok - $getQty;
					$this->db->set('stok', $setNewStok);
					$this->db->where('id_barang', $getBarang);
					$finish = $this->db->update('barang');
				}
			}
		
		}
		if ($finish) {
			$this->db->set('status', $status_order);
			$this->db->where('no_pemesanan', $no_pemesanan);
			return $this->db->update('pemesanan');
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