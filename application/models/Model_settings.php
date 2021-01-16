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


    public function getAllCompanyData()
    {
        return $this->db->get('company')->row_array();
    }

    public function getAllBannerData()
    {
        return $this->db->get('banner')->row_array();
    }

    public function getAllFaqData()
    {
        return $this->db->get('faq')->result_array();
    }

    // INSERT/INPUT

    public function addNewCompany($data)
    {
        return $this->db->insert('company', $data);
    }

    public function addNewBanner($data)
    {
        return $this->db->insert('banner', $data);
    }

    public function addNewFaq($data)
    {
        return $this->db->insert('faq', $data);
    }

    // UPDATE

    public function updateProfileCompany($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('company', $data);
    }

    public function updateBannerData($data, $id)
    {
        $this->db->where('id_banner', $id);
        return $this->db->update('banner', $data);
    }

    public function updateFaq($data, $id)
    {
        $this->db->where('id_faq', $id);
        return $this->db->update('faq', $data);
    }


    // DELETE

    public function deleteFaq($id)
    {
        $this->db->where('id_faq', $id);
        return $this->db->delete('faq');
    }
}
