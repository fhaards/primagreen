<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_settings extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function checkDataCompany()
    {
    }
    public function getAllCompanyData()
    {
        return $this->db->get('company')->row_array();
    }
    public function addNewCompany($data)
    {
        return $this->db->insert('company', $data);
    }
    public function updateProfileCompany($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('company', $data);
    }
}
