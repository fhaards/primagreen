<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_f_user extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_user_login');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    function index(){
        $data['title']   = 'Profile - ' . APP_NAME;
        $data['content'] = 'frontend/profile/read_profile';
        $this->load->view('frontend/master_frontend', $data);
    }

}