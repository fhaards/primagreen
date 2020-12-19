<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        redirectIfNotLogin();
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    public function index()
	{
        $data['title']   = 'Dashboard - ' . APP_NAME;
		$data['content'] = '_adminpages/dashboard';
		$this->load->view('_adminpages/master_admin',$data);
	}
}
