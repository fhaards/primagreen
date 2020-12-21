<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_order extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_order');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function index(){
        $data['orderList'] = $this->model_order->getAllOrderGroupBy();
        $data['title']   = 'Order List - ' . APP_NAME;
        $data['content'] = '_adminpages/order/read_order';
        $this->load->view('_adminpages/master_admin', $data);
    }
}
