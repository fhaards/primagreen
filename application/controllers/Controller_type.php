<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_type extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_product_related');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function index()
    {
        $this->crumbs->add('Type List', base_url().'product/type-list');  
        $data['breadcrumb']=$this->crumbs->output();
        $data['pageTitle']   = 'Type';
        $data['pageSubTitle']   = 'List of Products Type';
        $data['typeList'] = $this->model_product_related->getAllTypes();
        $data['title']   = 'Type List - ' . APP_NAME;
        $data['content'] = '_adminpages/related/type/read_type';
        $this->load->view('_adminpages/master_admin', $data);
    }

    // TYPE

    public function newType()
    {
        $data['title']   = 'Type List - ' . APP_NAME;
        $data['content'] = '_adminpages/related/type/read_type';
        $this->form_validation->set_rules('nm_type', 'Type Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = '_adminpages/related/type/read_type';
            $this->session->set_flashdata('errorMsg', 'Data gagal diubah');
            $this->load->view('_adminpages/master_admin', $data);
        } else {
            $data = array(
                'nm_type' => $this->input->post('nm_type'),
                'status_type' => $this->input->post('status_type')
            );
            $this->model_product_related->inputType($data);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('product/type-list');
        }
    }

    public function editType($idType)
    {
        $data = array(
            'nm_type' => $this->input->post('nameType')
        );
        $this->model_product_related->editType($idType, $data);
        $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
        redirect('product/type-list');
    }

    public function changeTypeStatus($idType)
    {
        $this->model_product_related->changeTypeStatus($idType);
        $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
        redirect('product/type-list');
    }

    // CATEGORY

 
}
