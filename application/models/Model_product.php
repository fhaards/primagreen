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

	public function findBy($key)
	{
		// $this->db->select('*');
		// $this->db->join('products_type', 'products_type.id_type=products.id_type', 'inner');
		$this->db->select('id_barang,nm_barang,nm_barang_bot,size,harga,gambar');
		$this->db->from('products');
		$this->db->like('nm_barang', $key);
		$this->db->or_like('size', $key);
		$query = $this->db->get();
		$count = $query->num_rows();
		if (!empty($count)) {
			return $query->result_array(true);
		} else {
			return false;
		}
	}

	public function read_tb_product()
	{
		$this->db->select('*');
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllProducts()
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_type', 'products_type.id_type=products.id_type', 'inner');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getAllProductsByIdType($type)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_type', 'products_type.id_type=products.id_type', 'inner');
		$this->db->where('products.id_type', $type);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function getAllProductsByType($nmType)
	{
		$newNmType = strtolower(str_replace('-', ' ', $nmType));
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_type', 'products_type.id_type=products.id_type', 'inner');
		$this->db->where('nm_type', $newNmType);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function detailProducts($id)
	{
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_type', 'products_type.id_type=products.id_type', 'inner');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	// public function insert_product($data, $getSkuCode, $features)
	// {
	// 	$this->db->insert('products', $data);
	// 	$getIdBarang = $this->db->insert_id();
	// 	$getNewSku = $getSkuCode;
	// 	if ($this->db->affected_rows() > 0) {
	// 		$dataSku = array(
	// 			'sku' => $getNewSku
	// 		);

	// 		$this->db->where('id_barang', $getIdBarang);
	// 		$this->db->update('products', $dataSku);

	// 		$data2 = array();
	// 		foreach ($features as  $key => $value) {
	// 			$data2[] = array(
	// 				'id_barang' => $getIdBarang,
	// 				'id_features' => $value
	// 			);
	// 		}
	// 		$this->db->insert_batch('products_features_related', $data2);
	// 		return true;
	// 	} else {
	// 		return false;
	// 	}
	// }

	public function insert_product($data, $features)
	{
		$query = $this->db->insert('products', $data);
		if (!empty($features)) {
			$getIdBarang = $this->db->insert_id();
			if ($this->db->affected_rows() > 0) {
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
		} else {
			return $query;
		}
	}

	public function edt_product($id)
	{
		$query = $this->db->get_where('products', array('id_barang' => $id));
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
		$updateBarang = $this->db->update('products', $getData);
		if ($updateBarang) {
			$query = $this->db->get_where('products_features_related', array('id_barang' => $id));
			$countBarangInFeaturesRelated = $query->num_rows();

			//COUNTING FROM FEATURES
			$data2 = array();
			foreach ($features as  $key => $value) {
				$data2[] = array(
					'id_barang' => $id,
					'id_features' => $value
				);
			}

			if ($countBarangInFeaturesRelated > 0) {  //JIKA BARANG ADA DIDALAM FEATURES RELATED
				if (!empty($data2)) {
					$this->db->delete('products_features_related', array('id_barang' => $id));
					if ($this->db->affected_rows() > 0) {
						return $this->db->insert_batch('products_features_related', $data2);
					}
				} else {
					return $this->db->delete('products_features_related', array('id_barang' => $id));
				}
			} else {   //JIKA BARANG TIDAK ADA DIDALAM FEATURES RELATED
				if (!empty($data2)) {
					return $this->db->insert_batch('products_features_related', $data2);
				} else {
					return $updateBarang;
				}
			}
		}
	}

	public function edt_productImage_todb($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('products', $data);
	}

	// DELETING SPECIFIC IMAGE

	public function edtProductImageSpecific1($id, $data)
	{

		$this->db->select('sku,gambar');
		$this->db->from('products');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$getSku  = $row->sku;
			$getImage  = $row->gambar;
			$uploadPath = './uploads/product/' . $getSku;
			unlink($uploadPath . '/' . $getImage);
		}
		$this->db->where('id_barang', $id);
		$this->db->update('products', $data);
		return true;
	}
	public function edtProductImageSpecific2($id, $data)
	{
		$this->db->select('sku,gambar2');
		$this->db->from('products');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$getSku  = $row->sku;
			$getImage  = $row->gambar2;
			$uploadPath = './uploads/product/' . $getSku;
			unlink($uploadPath . '/' . $getImage);
		}
		$this->db->where('id_barang', $id);
		$this->db->update('products', $data);
		return true;
	}
	public function edtProductImageSpecific3($id, $data)
	{
		$this->db->select('sku,gambar3');
		$this->db->from('products');
		$this->db->where('id_barang', $id);
		$query = $this->db->get();

		foreach ($query->result() as $row) {
			$getSku  = $row->sku;
			$getImage  = $row->gambar3;
			$uploadPath = './uploads/product/' . $getSku;
			unlink($uploadPath . '/' . $getImage);
		}
		$this->db->where('id_barang', $id);
		$this->db->update('products', $data);
		return true;
	}

	// EDIT STOCK

	public function editProductStock($id, $data)
	{
		$this->db->where('id_barang', $id);
		$this->db->update('products', $data);
	}


	// DELETE PRODUCTS 

	public function deleteProductById($id)
	{
		$this->db->delete('products', array('id_barang' => $id));
		if ($this->db->affected_rows() > 0) {
			return $this->db->delete('products_features_related', array('id_barang' => $id));
		}
	}


	//COUNT PRODUCTS
	public function countProducts(){
		$this->db->select('*');
		$this->db->from('products');
		return $this->db->count_all_results();
	}
}
