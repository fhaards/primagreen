<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use Ramsey\Uuid\Uuid;

class Controller_foo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("string");
    }

    public function index(){
        $this->load->view('foo');
    }

    public function dummy(){
        $rs1 = strtoupper(random_string('alpha', 4));
        $rs2 = random_string('numeric', 4);
        $rs3 = random_string('alpha', 4);
        $getid = '15';
        $getnum = random_string('numeric', 4);
        var_dump($rs1.'-'.$rs2.'-'.$rs3.'-'.$getid.$getnum);
    }
}