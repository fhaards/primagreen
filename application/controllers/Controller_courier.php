<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_courier extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_courier');
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
        $this->crumbs->add('Courier List', base_url().'product/courier-list');  
        $data['breadcrumb']=$this->crumbs->output();
        $data['pageTitle']   = 'Courier';
        $data['pageSubTitle']   = 'List of Courier / Shipments Agents';
        $data['courierList'] = $this->model_courier->getAllCourier();
        $data['title']   = 'Courier List - ' . APP_NAME;
        $data['content'] = '_adminpages/related/courier/read_courier';
        $this->load->view('_adminpages/master_admin', $data);
    }

    // Courier

    public function newCourier()
    {
        $data['title']   = 'Courier List - ' . APP_NAME;
        $data['content'] = '_adminpages/related/courier/read_courier';
        $this->form_validation->set_rules('nm_kurir', 'Courier Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['content'] = '_adminpages/related/courier/read_courier';
            $this->session->set_flashdata('errorMsg', 'Data gagal diubah');
            $this->load->view('_adminpages/master_admin', $data);
        } else {
            $data = array(
                'nm_kurir' => $this->input->post('nm_kurir'),
                'harga_kurir' => $this->input->post('harga_kurir'),
                'estimasi' => $this->input->post('estimasi'),
                'status_courier' => $this->input->post('status_courier')
            );
            $this->model_courier->inputCourier($data);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('product/courier-list');
        }
    }

    public function editCourier($idCourier)
    {
        $data = array(
            'nm_kurir' => $this->input->post('nameCourier'),
            'harga_kurir' => $this->input->post('harga_kurir'),
            'estimasi' => $this->input->post('estimasi')
        );
        $this->model_courier->editCourier($idCourier, $data);
        $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
        redirect('product/courier-list');
    }

    public function changeCourierStatus($idCourier)
    {
        $this->model_courier->changeCourierStatus($idCourier);
        $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
        redirect('product/courier-list');
    }

    // CATEGORY

 
}
