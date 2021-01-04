<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_error_page extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_user');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("styling");
    }

    public function index(){
        $data['title']   = 'Ops! - ' . APP_NAME;
        $this->load->view('error-404', $data);
    }

}