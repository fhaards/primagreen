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
        $this->load->library('pagination');
        $this->load->library('crumbs');
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
        $this->crumbs->add('My Account', base_url() . 'profile/user-dashboard');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']   = 'Profile - ' . APP_NAME;
        $data['content'] = 'frontend/profile/index';
        $data['profile_title'] = 'Account Dashboard';
        $data['profile_content'] = 'frontend/profile/read_dashboard';
        $data['getUser'] = $this->model_order->getAllOrderByUser($iduser)->result_array();
        $this->load->view('frontend/master_frontend', $data);
    }

    function userAccount()
    {
        redirectIfNotLogin();
        $iduser = getUserData()['id_user'];
        $this->crumbs->add('My Account', base_url() . 'profile/user-dashboard');
        $this->crumbs->add('Account Information', base_url() . 'profile/user-account');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']   = 'Profile - ' . APP_NAME;
        $data['content'] = 'frontend/profile/index';
        $data['profile_title'] = 'Edit Account Information';
        $data['profile_content'] = 'frontend/profile/edit_account';
        $data['getUser'] = $this->model_order->getAllOrderByUser($iduser)->result_array();
        $this->load->view('frontend/master_frontend', $data);
    }

    function editAccount(){ }

    function editAddress()
    {
        redirectIfNotLogin();
        // $iduser = getUserData()['id_user'];
        $this->crumbs->add('My Account', base_url() . 'profile/user-dashboard');
        $this->crumbs->add('Address Book', base_url() . 'profile/edit-address');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']   = 'Profile - ' . APP_NAME;
        $data['content'] = 'frontend/profile/index';
        $data['profile_title'] = 'Edit Address Book';
        $data['profile_content'] = 'frontend/profile/edit_address';
        $this->load->view('frontend/master_frontend', $data);
    }

    function orderHistory()
    {
        redirectIfNotLogin();
        $iduser = getUserData()['id_user'];
        $this->crumbs->add('My Account', base_url() . 'profile/user-dashboard');
        $this->crumbs->add('Order History', base_url() . 'profile/order-history');
        $data['breadcrumb'] = $this->crumbs->output();
        $jumlah_data = $this->model_order->getAllOrderByUser_count($iduser);
        $config = array();
        $config['base_url'] = base_url() . 'profile/order-history';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $config['full_tag_open'] = '<div class="pagination flex flex-row space-x-2 font-bold">';
        $config['full_tag_close'] = '</div>';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['title']   = 'Profile - ' . APP_NAME;
        $data['content'] = 'frontend/profile/index';
        $data['profile_title'] = 'Order History';
        $data['profile_content'] = 'frontend/profile/read_order';
        $data['getUser'] = $this->model_order->getAllOrderByUser_paging($config['per_page'], $from, $iduser)->result_array();
        $this->load->view('frontend/master_frontend', $data);
    }

    function detailOrder($noOrder)
    {
        redirectIfNotLogin();
        $this->crumbs->add('My Account', base_url() . 'profile/user-dashboard');
        $this->crumbs->add('Order History', base_url() . 'profile/order-history');
        $this->crumbs->add('Detail Order', base_url() . 'profile/detail-order');
        $data['breadcrumb'] = $this->crumbs->output();
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
