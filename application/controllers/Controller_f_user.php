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
        $this->load->model('model_user');
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
        $data['getUser'] = $this->model_order->getAllOrderByUserRecent($iduser)->result_array();
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

    function editAccount()
    {
        $getOldEmail = getUserData()['email'];
        $iduser = getUserData()['id_user'];
        $getOldPassword = getUserData()['password'];
        $dateNow  = date('Y-m-d H:i:s');

        $this->crumbs->add('My Account', base_url() . 'profile/user-dashboard');
        $this->crumbs->add('Account Information', base_url() . 'profile/user-account');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']   = 'Profile - ' . APP_NAME;
        $data['content'] = 'frontend/profile/index';
        $data['profile_title'] = 'Edit Account Information';
        $data['profile_content'] = 'frontend/profile/edit_account';
        $data['getUser'] = $this->model_order->getAllOrderByUser($iduser)->result_array();

        $cbk_change_password = $this->input->post('check_change_password');

        if (!empty($cbk_change_password)) :
            $newpassword = $this->input->post('newpassword');
            $setNewPassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $this->form_validation->set_rules('old_password', '<strong>Old Password</strong>', 'required|callback_oldpassword_check');
            $this->form_validation->set_rules('newpassword', '<strong>New Password</strong>', 'required|min_length[7]|max_length[30]');
            $this->form_validation->set_rules('newpassword_confirm', '<strong>Confirm New Password</strong>', 'required|matches[newpassword]');
        else :
            $setNewPassword = $getOldPassword;
        endif;

        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/master_frontend', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $tlp = $this->input->post('tlp');

            if ($getOldEmail == $email) :
                $newemail = $email;
            else :
                $newemail = $email;
                $data_session = array('email' => $newemail);
                $this->session->set_userdata($data_session);
            endif;

            $change_account = array(
                'nama' => $name,
                'email' => $newemail,
                'tlp' => $tlp,
                'password' => $setNewPassword
            );

            $get_change_account = $this->model_user->changeAccount($id_user, $change_account);
            if ($get_change_account) {
                $this->load->library('mailer');
				$subject = 'Modify Account Information';
				$this_mail_content = $this->load->view('frontend/mail/mail_content_change_account',  array('name' => $name,'date'=>$dateNow), true);
				$sendmail = array(
					'email_receipt' => $email,
					'subject' => $subject,
					'this_mail_content' => $this_mail_content
				);
                $this->mailer->send_mail($sendmail);
                $this->session->set_flashdata('successEditAccount', 'Data Was Changes');
                redirect('profile/user-account');
            }
        }
    }

    public function oldpassword_check($old_password)
    {
        $email = getUserData()['email'];
        // $old_password_hash = password_hash($old_password, PASSWORD_DEFAULT);
        $userData = $this->model_f_user_login->findBy('email', $email);
        $get_old_password_db = $userData['password'];
        if (password_verify($old_password, $get_old_password_db)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('oldpassword_check', 'The <strong>Old Password</strong> field was wrong');
            return FALSE;
        }
    }

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
