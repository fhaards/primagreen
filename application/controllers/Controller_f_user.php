<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_f_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        // redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_order');
        $this->load->model('model_f_user_login');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper('styling');
    }

    function index()
    {
        redirectIfNotLogin();
        $iduser = getUserData()['id_user'];
        $data['title']   = 'Profile - ' . APP_NAME;
        $data['content'] = 'frontend/profile/read_profile';
        $data['getUser'] = $this->model_order->getAllOrderByUser($iduser)->result_array();
        $this->load->view('frontend/master_frontend', $data);
    }
    function detailOrder($noOrder)
    {
        redirectIfNotLogin();
        $data['title']   = 'Detail Order - ' . APP_NAME;
        $data['content'] = 'frontend/profile/detail_order';
        $data['getOrderList'] = $this->model_order->getAllOrderByNoOrder($noOrder)->result_array();
        $data['getOrderDetail'] = $this->model_order->getAllOrderByNoOrder_GroupBy($noOrder)->row_array();
        $this->load->view('frontend/master_frontend', $data);
    }

    // UPLOAD TRANSFER PAYMENT PROOF

    function uploadTransfer()
    {
        // $data = $this->model_order->muploadTransfer();
        // echo json_encode($data);
        $no_pemesanan = $this->input->post('no_pemesanan');
        $ket = $this->input->post('ket');

        $this->form_validation->set_rules('ket', 'Keterangan', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('profile/detail-order/' . $no_pemesanan);
        } else {
            $data = array(
                'no_pemesanan' => $no_pemesanan,
                'ket' => $ket
            );
            $this->model_order->uploadTransfer($data);
            $this->model_order->changeStatusOrderToProcess($no_pemesanan);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('profile/detail-order/' . $no_pemesanan);
        }
    }
}
