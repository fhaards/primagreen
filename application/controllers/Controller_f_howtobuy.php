<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_f_howtobuy extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_homepage');
        $this->load->model('model_settings');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function index(){
        // $data['someItems'] = $this->model_f_homepage->getSomeItems();
        $data['title']   = 'How To Buy - ' . APP_NAME;
        $data['content'] = 'frontend/howtobuy/index';
        $this->load->view('frontend/master_frontend', $data);
    }
}
