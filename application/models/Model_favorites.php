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
        $this->db->join('barang', 'barang.id_barang=favorite_products.id_barang', 'inner');
        // $this->db->group_by('favorite_products.id_barang');
        return $this->db->get()->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert('favorite_products', $data);
    }
}
