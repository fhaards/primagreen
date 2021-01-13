<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_messages extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        redirectIfNotAdmin();
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
        $data['title']   = 'Messages - ' . APP_NAME;
        $data['content'] = '_messages/read_messages';
        $this->load->view('_messages/master_messages', $data);
    }
}