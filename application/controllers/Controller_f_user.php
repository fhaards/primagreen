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
        $this->load->model('model_payment');
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
        // $data['getOrder_Onhold'] = $this->model_order->getAllOrder_Onhold($iduser)->result_array();
        $this->load->view('frontend/master_frontend', $data);
    }

    function detailOrder($noOrder)
    {
        redirectIfNotLogin();
        $data['title']   = 'Detail Order - ' . APP_NAME;
        $data['content'] = 'frontend/profile/detail_order';
        $data['getOrderList'] = $this->model_order->getAllOrderByNoOrder($noOrder)->result_array();
        $data['getOrderDetail'] = $this->model_order->getAllOrderByNoOrder_GroupBy($noOrder)->row_array();
        $data['getPaymentDetail'] = $this->model_payment->getBy_NoPemesanan($noOrder)->row_array();
        $this->load->view('frontend/master_frontend', $data);
    }


    // UPLOAD TRANSFER PAYMENT PROOF

    function uploadTransfer()
    {
        // $data = $this->model_order->muploadTransfer();
        // echo json_encode($data);
        redirectIfNotLogin();
        $no_pemesanan = $this->input->post('no_pemesanan');
        $ket = $this->input->post('ket');

        $this->form_validation->set_rules('ket', 'Keterangan', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('profile/detail-order/' . $no_pemesanan);
        } else {
            $uploadPath = './uploads/transfer_proof/' . $no_pemesanan;
            $config = array('upload_path' => $uploadPath, 'allowed_types' =>
            'jpg|jpeg|gif|png|webp', 'max_size' => '5000', 'encrypt_name' => true);

            $this->load->library('upload', $config);

            if (!is_dir('uploads/transfer_proof/' . $no_pemesanan)) {
                mkdir($uploadPath, 0777, true);
            } else {
            }
            if ($this->upload->do_upload("transfer_prof")) {
                $transferImage  = array('upload_data' => $this->upload->data());
                $getTransferImage = $transferImage['upload_data']['file_name'];
            } else {
                $getTransferImage = $this->input->post('default_img');
            }

            $data = array(
                'no_pemesanan' => $no_pemesanan,
                'ket' => $ket,
                'gambar' => $getTransferImage
            );
            $this->model_order->uploadTransfer($data);
            $this->model_order->changeStatusOrderToProcess($no_pemesanan);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('profile/detail-order/' . $no_pemesanan);
        }
    }
}
