<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_settings extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_settings');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function profile()
    {
        $data['orderList'] = $this->model_settings->getAllCompanyData();
        $data['title']   = 'Company Profile - ' . APP_NAME;
        $data['content'] = '_adminpages/company/read_company';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function addRandomly()
    {
        $data = array(
            'unique_code' => 'RANDOM-UNIQUECODE',
            'comp_nm' => 'RANDOM-NAMECOMPANY'
        );
        $this->model_settings->addNewCompany($data);
        $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
        redirect('company/profile');
    }

    public function updateProfile($id)
    {
        $this->form_validation->set_rules('comp_nm', 'Company Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errorMsg', 'Data Gagal');
            redirect('company/profile');
        } else {
            $baseLogo = $this->input->post('baseLogo');
            $baseFavIco = $this->input->post('baseFavIco');
           
            $uploadPath = './uploads/company';
            $configIcon = array('upload_path' => $uploadPath, 'allowed_types' =>
            'jpg|jpeg|gif|png|ico', 'max_size' => '5000', 'encrypt_name' => true);

            if (!is_dir('uploads/company')) {
                mkdir($uploadPath, 0777, true);
            } else {
            }

            $this->load->library('upload', $configIcon);

            if ($this->upload->do_upload("logoProfile")) {
                unlink($uploadPath . '/' . $baseLogo);
                $logoProfile  = array('upload_data' => $this->upload->data());
                $getlogoProfile = $logoProfile['upload_data']['file_name'];
            } else {
                $getlogoProfile = $baseLogo;
            }

            if ($this->upload->do_upload("favIcoProfile")) {
                unlink($uploadPath . '/' . $baseFavIco);
                $favIcoProfile  = array('upload_data' => $this->upload->data());
                $getFavIcoProfile = $favIcoProfile['upload_data']['file_name'];
            } else {
                $getFavIcoProfile = $baseFavIco;
            }

            $data = array(
                'comp_nm' => $this->input->post('comp_nm'),
                'unique_code' => $this->input->post('unique_code'),
                'telp' => $this->input->post('telp'),
                'instagram' => $this->input->post('instagram'),
                'address' => $this->input->post('address'),
                'about' => $this->input->post('about'),
                'logo' => $getlogoProfile,
                'icon' => $getFavIcoProfile
            );
            $this->model_settings->updateProfileCompany($data, $id);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('company/profile');
        }
    }
}
