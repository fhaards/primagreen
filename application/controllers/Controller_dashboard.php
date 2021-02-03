<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
        redirectIfNotAdmin();
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->model('model_user');
        $this->load->model('model_order');
        $this->load->model('model_product');
    }

    public function index()
    {
        $this->crumbs->add('Dashboard', base_url() . 'dashboard');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']   = 'Dashboard - ' . APP_NAME;
        $data['pageTitle']   = 'Welcome';
        $data['pageSubTitle']   = 'Dashboard';
        $data['countProducts'] = $this->model_product->countProducts();
        $data['countOrderNotComplete'] = $this->model_order->countOrderNotComplete();
        $data['content'] = '_adminpages/dashboard';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function countPurchased()
    {
        $data['countOrderComplete'] = $this->model_order->countOrderComplete();
        echo json_encode($data);
    }
    public function countUser()
    {
        $data['countAllUser'] = $this->model_user->countUser();
        echo json_encode($data);
    }
}
