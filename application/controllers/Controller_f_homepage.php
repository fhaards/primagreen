<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_f_homepage extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_homepage');
        $this->load->model('model_favorites');
        $this->load->model('model_product_related');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('product');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function index(){
        $data['newItems'] = $this->model_f_homepage->getNewItems();
        $data['someItems'] = $this->model_f_homepage->getSomeItems();
        $data['favItems'] = $this->model_favorites->getFavoritesId();
        $data['features'] = $this->model_product_related->getFeaturesEnabled();
        $data['title']   = 'Welcome - ' . APP_NAME;
        $data['content'] = 'frontend/homepage';
        $this->load->view('frontend/master_frontend', $data);
    }
}
