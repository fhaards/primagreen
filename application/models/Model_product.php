<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_product extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
	}

	public function read_tb_product()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllProducts()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('products_type', 'products_type.id_type=barang.id_type', 'inner');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllProductsByType($nmType)
	{

		$newNmType = strtolower(str_replace('-', ' ', $nmType));
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('products_type', 'products_type.id_type=barang.id_type', 'inner');
		$this->db->where('nm_type', $newNmType);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function detailProducts($id)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('products_type', 'products_type.id_type=barang.id_type', 'inner');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function insert_product($data, $getSkuCode, $features)
	{
		$this->db->insert('barang', $data);
		$getIdBarang = $this->db->insert_id();
		$getNewSku = $getSkuCode;
		if ($this->db->affected_rows() > 0) {
			$dataSku = array(
				'sku' => $getNewSku
			);

			$this->db->where('id_barang', $getIdBarang);
			$this->db->update('barang', $dataSku);

			$data2 = array();
			foreach ($features as  $key => $value) {
				$data2[] = array(
					'id_barang' => $getIdBarang,
					'id_features' => $value
				);
			}
			$this->db->insert_batch('products_features_related', $data2);
			return true;
		} else {
			return false;
		}
	}

	public function edt_product($id)
	{
		$query = $this->db->get_where('barang', array('id_barang' => $id));
		return $query->row_array();
	}

	public function get_product_features($id)
	{
		$this->db->select('*');
		$this->db->from('products_features_related');
		$this->db->where('id_barang', $id);
		$query = $this->db->get()->result_array();

		return array_map(function ($item) {
			return $item['id_features'];
		}, $query);
	}

	public function edt_product_todb($id, $getData, $features)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $getData);

		$this->db->delete('products_features_related', array('id_barang' => $id));
		if ($this->db->affected_rows() > 0) {
			$data2 = array();
			foreach ($features as  $key => $value) {
				$data2[] = array(
					'id_barang' => $id,
					'id_features' => $value
				);
			}
			$this->db->insert_batch('products_features_related', $data2);
		}
		return true;
	}

	public function edt_productImage_todb($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}

	// DELETING SPECIFIC IMAGE

	public function edtProductImageSpecific1($id, $data)
	{

		$this->db->select('sku,gambar');
		$this->db->from('barang');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$getSku  = $row->sku;
			$getImage  = $row->gambar;
			$uploadPath = './uploads/product/' . $getSku;
			unlink($uploadPath . '/' . $getImage);
		}
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
		return true;
	}
	public function edtProductImageSpecific2($id, $data)
	{
		$this->db->select('sku,gambar2');
		$this->db->from('barang');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$getSku  = $row->sku;
			$getImage  = $row->gambar2;
			$uploadPath = './uploads/product/' . $getSku;
			unlink($uploadPath . '/' . $getImage);
		}
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
		return true;
	}
	public function edtProductImageSpecific3($id, $data)
	{
		$this->db->select('sku,gambar3');
		$this->db->from('barang');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$getSku  = $row->sku;
			$getImage  = $row->gambar3;
			$uploadPath = './uploads/product/' . $getSku;
			unlink($uploadPath . '/' . $getImage);
		}
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
		return true;
	}

	// EDIT STOCK

	public function editProductStock($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('barang', $data);
	}
}

	// public function insert_product($data){	
		
	// 	//GETPOST
	// 	$nm_product   	= $this->input->post('nm_product');
	// 	$stock   	  	= $this->input->post('stock');
	// 	$detail_info   	= $this->input->post('detail_info');
	// 	$category       = $this->input->post('category');
	// 	$price       	= $this->input->post('price');

	// 	$data = array(
	// 		'nm_barang'=>$nm_product,
	// 		'kat'=>$category,
	// 		'harga'=>$price,
	// 		'stok'=>$stock,
	// 		'detail'=>$detail_info
	// 	);

	//     $this->db->insert('barang',$data);
	//     return true;
	// }