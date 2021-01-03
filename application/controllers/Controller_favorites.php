<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_favorites extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_homepage');
        $this->load->model('model_favorites');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function addFavorites(){
        $data = array(
            'id_barang' => $this->input->post("itemsid"),
            'id_user' => $this->input->post("userid")
        );
        $data = $this->model_favorites->insert($data);
    }
    
}
