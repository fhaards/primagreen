<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_f_store extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_user_login');
        $this->load->model('model_product_related');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }
    public function index()
    {
        $data['getItems'] = $this->model_product->getAllProducts();
        $data['typeList'] = $this->model_product_related->getAllTypesEnabled();
        $data['title']   = 'Show All Items - ' . APP_NAME;
        $data['content'] = 'frontend/store/read_store';
        $this->load->view('frontend/master_frontend', $data);
    }

    public function showByType($nmType)
    {
        $data['getItems'] = $this->model_product->getAllProductsByType($nmType);
        $data['typeList'] = $this->model_product_related->getAllTypesEnabled();
        $data['title']   = APP_NAME;
        $data['content'] = 'frontend/store/read_store';
        $this->load->view('frontend/master_frontend', $data);
    }

    public function detailProduct($id)
    {
        $data['getDetail'] = $this->model_product->detailProducts($id);
        $data['title']   = 'Product Detail - ' . APP_NAME;
        $data['content'] = 'frontend/store/product_detail';
        $this->load->view('frontend/master_frontend', $data);
    }

    // TRYING WITH JSON
    // public function showAll()
    // {
    //     $data = $this->model_product->getAllProducts();
    //     echo json_encode($data);
    // }
}
