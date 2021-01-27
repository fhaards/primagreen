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
        return $this->db->get()->result_array();
    }

    public function getFavoritesId()
    {
        return array_map(function ($item) {
            return $item['id_barang'];
        }, $this->getFavorites());
    }


    public function getFavoriteste()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by("date_a", "desc");
        $this->db->limit(4);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $getId  = $row->id_barang;
            $this->db->select('*');
            $this->db->from('favorite_products');
            $this->db->where('id_barang', $getId);
            return $this->db->get()->row_array();
        }
    }


    public function insert()
    {
        $id_barang = $this->input->post("itemsid");
        $id_user = $this->input->post("userid");
        $this->db->select('*');
        $this->db->from('favorite_products');
        $this->db->where('id_barang', $id_barang);
        $this->db->where('id_user', $id_user);
        $query = $this->db->get();
        $getIdFavorite = $query->row_array()['id_favorite'];
        $row = $query->num_rows();
        if (empty($row)) {
            $dateNow  = date('Y-m-d H:i:s');
            $data = array(
                'id_barang' => $id_barang,
                'id_user' => $id_user,
                'date_favorite ' => $dateNow
            );
            return $this->db->insert('favorite_products', $data);
        } else {
            return $this->db->delete('favorite_products', array('id_favorite' => $getIdFavorite));
        }
    }
}
