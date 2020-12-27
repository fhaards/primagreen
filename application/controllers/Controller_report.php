<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_report extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // redirectIfAdminAccessUserPage();
        redirectIfNotLogin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_order');
        $this->load->model('model_payment');
        $this->load->model('model_f_user_login');
        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->helper('url');
        $this->load->helper('array');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper('styling');
    }

    public function reportOrder($noOrder)
    {
        $data['title']   = 'Print Order - ' . APP_NAME;
        $data['getOrderList'] = $this->model_order->getAllOrderByNoOrder($noOrder)->result_array();
        $data['getOrderDetail'] = $this->model_order->getAllOrderByNoOrder_GroupBy($noOrder)->row_array();
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('frontend/report/report_order', $data);
    }
}
