<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_user extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
        $this->load->database();
        $this->load->model('model_user');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("styling");
    }

    public function index(){
        $this->crumbs->add('User List', base_url().'user/user-list');   
        $data['breadcrumb']=$this->crumbs->output();
        $data['pageTitle']   = 'User';
        $data['pageSubTitle']   = 'List of Table User';
        $data['userList'] = $this->model_user->getAll()->result_array();
        $data['title']   = 'User List - ' . APP_NAME;
        $data['content'] = '_adminpages/user/read_user';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function detailUser($id){
        $this->crumbs->add('User List', base_url().'user/user-list');   
        $this->crumbs->add('User Detail', base_url().'user/user-detail');   
        $data['breadcrumb']=$this->crumbs->output();
        $data['pageTitle']   = 'User';
        $data['pageSubTitle']   = 'Detail User';
        $data['userList'] = $this->model_user->findBy($id)->row_array();
        $data['title']   = 'User Detauk - ' . APP_NAME;
        $data['content'] = '_adminpages/user/detail_user';
        $this->load->view('_adminpages/master_admin', $data);
    }
}