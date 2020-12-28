<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_order extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_order');
        $this->load->model('model_payment');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("styling");
    }

    public function index(){
        $data['orderList'] = $this->model_order->getAllOrderGroupBy();
        $data['title']   = 'Order List - ' . APP_NAME;
        $data['content'] = '_adminpages/order/read_order';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function orderDetails($noOrder){
        $data['getOrderList'] = $this->model_order->getAllOrderByNoOrder($noOrder)->result_array();
        $data['getOrderDetail'] = $this->model_order->getAllOrderByNoOrder_GroupBy($noOrder)->row_array();
        $data['getPaymentDetail'] = $this->model_payment->getBy_NoPemesanan($noOrder)->row_array();
        $data['title']   = 'Order Detail - ' . APP_NAME;
        $data['content'] = '_adminpages/order/detail_order';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function changeStatusOrder(){
        $no_pemesanan = $this->input->post('no_pemesanan');
        $status_order = $this->input->post('status_baru');
        $get_resi = $this->input->post('resi');
        if(!empty($get_resi)){
            $set_resi = $get_resi;
        } else {
            $set_resi = '';
        }

        $this->form_validation->set_rules('status_baru', 'status', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('ErrorMsg', 'Error');
            redirect('order/order-list/');
        } else {
            if($status_order == 'COMPLETE'){
                $this->model_order->changeStatusComplete($no_pemesanan,$status_order,$get_resi);
            } else {
                $this->model_order->changeStatusOrder($no_pemesanan,$status_order);
            }
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('order/order-list/');
        }
    }
}
