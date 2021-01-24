<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_search extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // redirectIfNotAdmin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->library('form_validation');
        $this->load->helper('array');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("string");
    }

    public function index()
    {
        // $key = "monstesdra";
        $key = $this->input->post('key');
        $product = $this->model_product->findBy($key);
        // if($product) {
        //     $successmsg = true;
        // } else {
        //     $successmsg = false;
        // }
        // $products = array($product, 'msgs' => $successmsg);
        echo json_encode($product);
    }
}