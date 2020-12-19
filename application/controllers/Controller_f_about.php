<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_f_about extends CI_Controller {

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
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function index(){
        // $data['someItems'] = $this->model_f_homepage->getSomeItems();
        $data['title']   = 'About Us - ' . APP_NAME;
        $data['content'] = 'frontend/about_us';
        $this->load->view('frontend/master_frontend', $data);
    }
}
