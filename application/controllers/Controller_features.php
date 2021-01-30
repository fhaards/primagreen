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
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }
    public function index()
    {
        $this->crumbs->add('Features List', base_url() . 'product/features-list');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['pageTitle']   = 'Features';
        $data['pageSubTitle']   = 'List of Products Features';
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

            $uploadPath = './uploads/features';
            $config = array('upload_path' => $uploadPath, 'allowed_types' =>
            'jpg|jpeg|gif|png|webp', 'max_size' => '5000', 'encrypt_name' => true);
            $this->load->library('upload', $config);

            if (!is_dir('uploads/features/')) {
                mkdir($uploadPath, 0777, true);
            } else {
            }

            if ($this->upload->do_upload("img_features")) {
                $imgFeatures  = array('upload_data' => $this->upload->data());
                $getImgFeatures = $imgFeatures['upload_data']['file_name'];
            } else {
                $getImgFeatures = 'default_image.jpg';
            }

            $data = array(
                'nm_features' => $this->input->post('nm_features'),
                'img_features' => $getImgFeatures,
                'status_features' => $this->input->post('status_features')
            );

            $this->model_product_related->inputFeatures($data);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('product/features-list');
        }
    }

    public function editFeatures()
    {
        $idFeatures = $this->input->post('idFeaturesEdit');
        $baseImgFeatures = $this->input->post('base_img_features');
        $uploadPaths = './uploads/features';
        $configs = array('upload_path' => $uploadPaths, 'allowed_types' =>
        'jpg|jpeg|gif|png|webp', 'max_size' => '5000', 'encrypt_name' => true);
        $this->load->library('upload', $configs);

        if ($this->upload->do_upload("img_features_edit")) {
            unlink($uploadPaths . '/' . $baseImgFeatures);
            $imgFeaturesEdit  = array('upload_data' => $this->upload->data());
            $getImgFeaturesEdit = $imgFeaturesEdit['upload_data']['file_name'];
        } else {
            $getImgFeaturesEdit = $baseImgFeatures;
        }

        $data = array(
            'nm_features' => $this->input->post('nameFeatures'),
            'img_features' => $getImgFeaturesEdit
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
