<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_f_store extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
	}

	function fetch_filter_type($type)
	{

		$this->db->distinct();
		$this->db->select($type);
		$this->db->from('barang');
		$this->db->join('products_type', 'products_type.id_type=barang.id_type', 'inner');
		$this->db->where('product_status', '1');
		return $this->db->get();
	}

	// function fetch_filter_productType($type){
	// 	$this->db->select($type);
	// 	$this->db->from('products_type');
	// 	return $this->db->get();
	// }

	function make_query($type, $size, $minimum_price, $maximum_price)
	{

		$query = "SELECT * FROM barang INNER JOIN products_type on products_type.id_type=barang.id_type WHERE product_status = '1' ";

		if (isset($type)) {
			$type_filter = implode("','", $type);
			$query .= " AND barang.id_type IN('" . $type_filter . "')";
		}
		if (isset($size)) {
			$size_filter = implode("','", $size);
			$query .= " AND barang.size IN('" . $size_filter . "')";
		}

		if (isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price)) {
			$query .= "AND harga BETWEEN '" . $minimum_price . "' AND '" . $maximum_price . "'";
		}
		return $query;
	}

	function count_all($type, $size, $minimum_price, $maximum_price)
	{
		$query = $this->make_query($type, $size, $minimum_price, $maximum_price);
		$data = $this->db->query($query);
		return $data->num_rows();
	}

	function fetch_data($limit, $start, $type, $size, $minimum_price, $maximum_price, $sorted_name)
	{
		$query = $this->make_query($type, $size, $minimum_price, $maximum_price);
		if (isset($sorted_name) || !empty($sorted_name)) {
			if ($sorted_name == 'NMASC') {
				$query .= 'ORDER BY nm_barang ASC';
			} else if ($sorted_name == 'NMDESC') {
				$query .= 'ORDER BY nm_barang DESC';
			} else if ($sorted_name == 'HRGASC') {
				$query .= 'ORDER BY harga ASC';
			} else if ($sorted_name == 'HRGDESC') {
				$query .= 'ORDER BY harga DESC';
			} else {
				$query .= 'ORDER BY nm_barang ASC';
			}
		}
		$query .= ' LIMIT ' . $start . ', ' . $limit;
		$data = $this->db->query($query);
		$output = '';
		if ($data->num_rows() > 0) {
			foreach ($data->result_array() as $row) {
				$newNmProduct = strtolower(str_replace(' ', '-', $row['nm_barang']));
				$output .= '
				<div class="flex flex-col">
					<a href="' . site_url('store/product-list/detail/' . $row['id_barang'] . '/' . $newNmProduct) . '" class="flex flex-col">
						<div class="relative w-full h-20 md:h-48 lg:h-48 rounded-sm md:block">
							<img class="object-cover w-full h-full opacity-75 hover:opacity-100 hover:shadow-lg" src="' . base_url() . 'uploads/product/' .  $row['sku'] . '/' . $row['gambar'] . '">
						</div>
						<div class="flex h-16 lg:h-12 pt-2 space-x-2">
							<div class="w-2/3">
								<p class="text-gray-900 font-bold text-xs lg:text-sm">' . $row['nm_barang'] . '</p>
							</div>
							<div class="w-1/3 text-right">
								<p class="text-gray-600 font-bold text-xs lg:text-sm">' . number_format($row['harga']) . '</p>
							</div>
						</div>
						<div class="flex">
							<p class="text-gray-600 font-semibold text-xs lg:text-xs"> Size : ' . $row['size'] . '</p>
						</div>
					</a>
					<div class="flex lg:flex-row lg:flex-wrap space-x-2 mt-4">
							<div class="flex-0">
								<input name="quantity" type="number" id="' . $row['id_barang'] . '" value="1" class="quantity block w-16 py-1 lg:py-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
							</div>
							<div class="flex-1">
								<button data-produkid="' . $row['id_barang'] . '" data-produknama="' . $row['nm_barang'] . '" data-produkharga="' . $row['harga'] . '" class="add_cart flex space-x-2 shadow-lg w-full lg:w-full px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
									<div class="mx-auto flex space-x-2">
										<svg class="w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
										</svg>
										<span class="lg:text-sm text-xs lg:block hidden">Add to Cart</span>
									</div>
								</button>
							</div>
						<?php endif; ?>
					</div>
				</div>';
			}
		} else {
			$output = '<div class="flex flex-col w-full bg-gray-200 p-6 col-span-4 mx-auto rounded-lg">
							<h3 class="text-gray-600 font-semibold mx-auto"> Ooops , Data Not Found </h3>
							<p class="text-gray-600 mx-auto text-sm"> Please select any filter to found new one </p>
						</div>';
		}
		return $output;
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


	// function getProduct($number,$offset){
	// 	return $this->db->get('barang',$number,$offset)->result_array();		
	// }

	// function getCount(){
	// 	return $this->db->get('barang')->num_rows();
	// }

	// public function getProductByType($nmType,$number,$offset){	
	//     $newNmType = strtolower(str_replace('-', ' ', $nmType));
	//     return $this->db->join('products_type', 'products_type.id_type=barang.id_type', 'inner')->get_where('barang',array('nm_type'=>$newNmType),$number,$offset)->result_array();
	// }

	// function getCountByType($nmType){
	//     $newNmType = strtolower(str_replace('-', ' ', $nmType));
	// 	return $this->db->join('products_type', 'products_type.id_type=barang.id_type', 'inner')->get_where('barang',array('nm_type'=>$newNmType))->num_rows();
	// }

	// public function detailProducts($id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('barang');
	// 	$this->db->join('products_type', 'products_type.id_type=barang.id_type', 'inner');
	// 	$this->db->where('id_barang', $id);
	// 	$query = $this->db->get();
	// 	return $query->row_array();
	// }


}