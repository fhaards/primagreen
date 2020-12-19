<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_features extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_product_related');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }
    public function index(){
        $data['featuresList'] = $this->model_product_related->getAllFeatures();
        $data['title']   = 'Features List - ' . APP_NAME;
        $data['content'] = '_adminpages/related/features/read_features';
        $this->load->view('_adminpages/master_admin', $data);
    }
    public function newFeatures()
    {
        $data['title']   = ' Features List - ' . APP_NAME;
        $data['content'] = '_adminpages/related/features/read_features';
        $this->form_validation->set_rules('nm_features', 'Features Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = '_adminpages/related/features/read_features';
            $this->session->set_flashdata('errorMsg', 'Data gagal diubah');
            $this->load->view('_adminpages/master_admin', $data);
        } else {
            $data = array(
                'nm_features' => $this->input->post('nm_features'),
                'status_features' => $this->input->post('status_features')
            );
            $this->model_product_related->inputFeatures($data);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('product/features-list');
        }
    }

    public function editFeatures($idFeatures)
    {
        $data = array(
            'nm_features' => $this->input->post('nameFeatures')
        );
        $this->model_product_related->editFeatures($idFeatures, $data);
        $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
        redirect('product/features-list');
    }
    public function changeFeaturesStatus($idFeatures)
    {
        $this->model_product_related->changeFeaturesStatus($idFeatures);
        $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
        redirect('product/features-list');
    }
}
