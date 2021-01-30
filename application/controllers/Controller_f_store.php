<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_f_store extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_f_store');
        $this->load->model('model_product_related');
        $this->load->model('model_f_user_login');
        $this->load->helper('array');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }

    public function index()
    {
        $data['title']   = 'Store - ' . APP_NAME;
        $data['pageTitle'] = 'Store';
        $data['content'] = 'frontend/store/index';
        $this->load->view('frontend/master_frontend', $data);
    }

    public function shopAllItems()
    {
        $data['type_data'] = $this->model_f_store->fetch_filter_type('products.id_type,nm_type');
        $data['size_data'] = $this->model_f_store->fetch_filter_type('products.size');
        $data['features_data'] = $this->model_product_related->getFeaturesEnabled();
        $data['getIdFeatures'] = "All";
        $data['title']   = 'Show All Items - ' . APP_NAME;
        $data['pageTitle'] = 'All Items';
        $data['content'] = 'frontend/store/read_store';
        $this->load->view('frontend/master_frontend', $data);
    }

    public function getFeatures($var)
    {
        $newNmFeatures = str_replace('-', ' ', $var);
        $data['type_data'] = $this->model_f_store->fetch_filter_type('products.id_type,nm_type');
        $data['size_data'] = $this->model_f_store->fetch_filter_type('products.size');
        $data['features_data'] = $this->model_product_related->getFeaturesEnabled();
        $data['getIdFeatures'] = $this->model_product_related->getFeaturesIdByName($newNmFeatures);
        $data['title']   = $newNmFeatures . ' - ' . APP_NAME;
        $data['pageTitle'] = $newNmFeatures;
        $data['content'] = 'frontend/store/read_store';
        $this->load->view('frontend/master_frontend', $data);
    }

    function fetch_data()
    {
        sleep(1);
        $type = $this->input->post('type');
        $size = $this->input->post('size');
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price = $this->input->post('maximum_price');
        $sorted_name =  $this->input->post('sorted_name');
        $features =  $this->input->post('features');

        $config = array();
        $config['base_url'] = "#";
        $config['total_rows'] = $this->model_f_store->count_all($features, $type, $size, $minimum_price, $maximum_price);
        $config['per_page'] = 8;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination flex flex-row space-x-2 font-bold">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'NEXT &gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt; PREV';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='text-gray-900 font-bold bg-gray-200 text-white rounded-full inline-block'><a href='#' class=''>";
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['num_links'] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(3);
        $start = ($page - 1) * $config['per_page'];
        $output = array(
            'pagination_link'  => $this->pagination->create_links(),
            'product_list'   => $this->model_f_store->fetch_data($config["per_page"], $start, $features, $type, $size, $minimum_price, $maximum_price, $sorted_name)
        );
        echo json_encode($output);
    }

    public function detailProduct($id)
    {
        $data['getDetail'] = $this->model_f_store->detailProducts($id);
        $data['title']   = 'Product Detail - ' . APP_NAME;
        $data['content'] = 'frontend/store/product_detail';
        $this->load->view('frontend/master_frontend', $data);
    }

    // public function index()
    // {
    //     $getCount = $this->model_f_store->getCount();
    //     $config['base_url'] = base_url().'store/show-all-items';
    //     $config['total_rows'] = $getCount;
    //     $config['per_page'] = 4;
    //     $from = $this->uri->segment(3);
    //     $this->pagination->initialize($config);		
    //     $data['getItems'] = $this->model_f_store->getProduct($config['per_page'],$from);
    //     $data['typeList'] = $this->model_product_related->getAllTypesEnabled();
    //     $data['title']   = 'Show All Items - ' . APP_NAME;
    //     $data['content'] = 'frontend/store/read_store';
    //     $this->load->view('frontend/master_frontend', $data);
    // }

    // public function showByType($nmType)
    // {
    //     $getCount = $this->model_f_store->getCountByType($nmType);
    //     $config['base_url'] = base_url().'store/'.$nmType.'/';
    //     $config['total_rows'] = $getCount;
    //     $config['per_page'] = 8;
    //     $from =$this->uri->segment(3);
    //     $this->pagination->initialize($config);		
    //     $data['getItems'] = $this->model_f_store->getProductByType($nmType,$config['per_page'],$from);
    //     $data['typeList'] = $this->model_product_related->getAllTypesEnabled();
    //     $data['title']   = APP_NAME;
    //     $data['content'] = 'frontend/store/read_store';
    //     $this->load->view('frontend/master_frontend', $data);
    // }

    // public function detailProduct($id)
    // {
    //     $data['getDetail'] = $this->model_f_store->detailProducts($id);
    //     $data['title']   = 'Product Detail - ' . APP_NAME;
    //     $data['content'] = 'frontend/store/product_detail';
    //     $this->load->view('frontend/master_frontend', $data);
    // }
}
