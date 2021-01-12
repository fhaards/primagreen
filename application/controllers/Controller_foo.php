<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use Ramsey\Uuid\Uuid;

class Controller_foo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        redirectIfNotAdmin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_homepage');
        $this->load->model('model_favorites');
        $this->load->model('model_product_related');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("string");
    }

    public function index()
    {
        $this->load->view('foo');
    }

    public function dummy()
    {
        $type = $this->input->post("type");
        $data['getType'] =  '' ;
        if (!empty($type)) {
            $data['getType'] = $type;
            $data['productList'] = $this->model_product->getAllProductsByIdType($type);
        } else {
            $data['getType'] = $type;
            $data['productList'] = $this->model_product->getAllProducts();
        }

        $this->crumbs->add('Product List', base_url() . 'product/product-list');
        $data['breadcrumb'] = $this->crumbs->output();

        $data['type_data'] = $this->model_product_related->getAllTypesEnabled();
        $data['title']   = 'Product - ' . APP_NAME;
        $data['pageTitle']   = 'Product';
        $data['pageSubTitle']   = 'List of Table Products';
        $data['content'] = 'testing_tables';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function tested()
    {
        $data['newItems'] = $this->model_f_homepage->getNewItems();
        $data['favItems'] = $this->model_favorites->getFavoriteste();
        $this->load->view('foo', $data);
    }
}
