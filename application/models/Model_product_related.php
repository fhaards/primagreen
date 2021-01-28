<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_product_related extends CI_Model
{
    private $tags = 'products_features';
    
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function getAllFeatures()
    {
        $this->db->select('*');
        $this->db->from('products_features');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFeaturesEnabled()
    {
        $this->db->select('*');
        $this->db->from('products_features');
        $this->db->where('status_features','Enabled');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getFeaturesIdByName($getName)
    {
        $this->db->select('*');
        $this->db->from('products_features');
        $this->db->where('nm_features',$getName);
        $query = $this->db->get();
        return $query->row_array()['id_features'];
    }
    
    public function getAllTypes()
    {
        $this->db->select('*');
        $this->db->from('products_type');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAllTypesEnabled()
    {
        $data = array('status_type'=>'Enabled');
        $this->db->select('*');
        $this->db->from('products_type');
        $this->db->where($data);
        $query = $this->db->get();
        return $query->result_array();
    }

    // TYPE

    public function inputType($data)
    {
        return $this->db->insert('products_type', $data);
    }

    public function editType($idType, $data)
    {
        $this->db->where('id_type', $idType);
        $this->db->update('products_type', $data);
    }

    public function changeTypeStatus($idType)
    {
        $this->db->select('status_type');
        $this->db->from('products_type');
        $this->db->where('id_type', $idType);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $st  = $row->status_type;
            if ($st == 'Enabled') {
                $sts = "Disabled";
            } else {
                $sts = 'Enabled';
            }
        }
        $this->db->set('status_type', $sts);
        $this->db->where('id_type', $idType);
        $this->db->update('products_type');
    }

    // Features

    public function inputFeatures($data)
    {
        return $this->db->insert('products_features', $data);
    }

    public function editFeatures($idFeatures, $data)
    {
        $this->db->where('id_features', $idFeatures);
        $this->db->update('products_features', $data);
    }

    public function changeFeaturesStatus($idFeatures)
    {
        $this->db->select('status_features');
        $this->db->from('products_features');
        $this->db->where('id_features', $idFeatures);
        $query = $this->db->get();

        foreach ($query->result() as $row) {
            $st  = $row->status_features;
            if ($st == 'Enabled') {
                $sts = "Disabled";
            } else {
                $sts = 'Enabled';
            }
        }
        $this->db->set('status_features', $sts);
        $this->db->where('id_features', $idFeatures);
        $this->db->update('products_features');
    }

  

    // function add_tags($tags) {
    //     if (!empty($tags)) {
    //         foreach ($tags as $tag) {
    //             $tag_array = array('nm_features' => $tag);
    //             $this->db->insert($this->tag, $tag_array);
    //         }
    //         return TRUE;
    //     }
    //     return NULL;
    // }
}
