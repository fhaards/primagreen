<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_favorites extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function getFavorites()
    {
        $this->db->select('*');
        $this->db->from('favorite_products');
        // $this->db->group_by('favorite_products.id_barang');
        return $this->db->get()->result_array();
    }

    public function getFavoriteste()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by("date_a", "desc");
		$this->db->limit(4);
        $query= $this->db->get();
        foreach ($query->result() as $row) {
            $getId  = $row->id_barang;
            $this->db->select('*');
            $this->db->from('favorite_products');
            $this->db->where('id_barang',$getId);
            return $this->db->get()->row_array();
		}
    }

    public function insert($data)
    {
        return $this->db->insert('favorite_products', $data);
    }
}
