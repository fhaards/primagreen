<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        redirectIfNotLogin();
        redirectIfNotAdmin();
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
    }

    public function index()
	{
        $this->crumbs->add('Dashboard', base_url().'dashboard');   
        $data['breadcrumb']=$this->crumbs->output();
        $data['title']   = 'Dashboard - ' . APP_NAME;
        $data['pageTitle']   = 'Welcome';
        $data['pageSubTitle']   = 'Dashboard';
		$data['content'] = '_adminpages/dashboard';
		$this->load->view('_adminpages/master_admin',$data);
    }
    
}
