<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_f_faq extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        redirectIfAdminAccessUserPage();
        $this->load->database();
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
        $data['getFaq'] = $this->model_settings->getAllFaqData();
        $this->crumbs->add('Frequently Ask Question', base_url() . 'faq');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']   = 'Frequently & Ask Question - ' . APP_NAME;
        $data['content'] = 'frontend/faq';
        $this->load->view('frontend/master_frontend', $data);
    }
}
