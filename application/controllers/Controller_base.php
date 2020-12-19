<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_base extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // redirectIfAdminAccessUserPage();
        $this->load->database();
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
        $data['title']   = 'Base part - ' . APP_NAME;
        $data['content'] = 'frontend/base';
        $this->load->view('frontend/master_frontend', $data);
    }
}