<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_msg_contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_messages');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('recaptcha');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("styling");
        $this->load->helper("string");
    }

    public function index()
    {
        $this->crumbs->add('Contact Us', base_url() . 'contact-us');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['show_captcha'] = $this->recaptcha->render();
        $data['title']   = 'Contact Us - ' . APP_NAME;
        $data['content'] = 'frontend/messages/index';
        $this->load->view('frontend/master_frontend', $data);
    }

    public function guestMsg()
    {
        if(isLoggedIn()){
            redirect('contact-us/send-messages');
        }
        $this->crumbs->add('Contact Us', base_url() . 'contact-us');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['show_captcha'] = $this->recaptcha->render();
        $data['title']   = 'Contact Us - ' . APP_NAME;
        $data['content'] = 'frontend/messages/index';

        $this->form_validation->set_error_delimiters('<div class="bg-red-600 w-100 p-2 my-2 text-xs shadow-lg rounded-sm text-white">', '</div>');
        $this->form_validation->set_rules('name', '<strong>Name</strong>', 'required');
        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'required');
        $this->form_validation->set_rules('subject', '<strong>Subject</strong>', 'required');
        $this->form_validation->set_rules('msg', '<strong>Messages</strong>', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', '<strong>Captcha</strong> ', 'callback_getResponseCaptcha');
		$this->form_validation->set_message('required', '{field} is required.');
		$this->form_validation->set_message('callback_getResponseCaptcha', '{field} {g-recaptcha-response} harus diisi. ');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/master_frontend', $data);
        } else {
            $insert = array(
                'name' => $this->input->post("name"),
                'email' => $this->input->post("email"),
                'subject' => $this->input->post("subject"),
                'msg' => $this->input->post("msg"),
                'status_msg' => 'UNREAD'
            );
            $this->model_messages->insertMsgGuest($insert);
            $this->session->set_flashdata('successInputMsgs', 'Data berhasil ditambahkan');
            redirect('contact-us/guest');
        }

    }

    public function userMsg()
    {
        $this->crumbs->add('Contact Us', base_url() . 'contact-us');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['show_captcha'] = $this->recaptcha->render();
        $data['title']   = 'Contact Us - ' . APP_NAME;
        $data['content'] = 'frontend/messages/index';

        $this->form_validation->set_error_delimiters('<div class="bg-red-600 w-100 p-2 my-2 text-xs shadow-lg rounded-sm text-white">', '</div>');
        $this->form_validation->set_rules('subject', '<strong>Subject</strong>', 'required');
        $this->form_validation->set_rules('msg', '<strong>Messages</strong>', 'required');
        $this->form_validation->set_rules('g-recaptcha-response', '<strong>Captcha</strong> ', 'callback_getResponseCaptcha');
		$this->form_validation->set_message('required', '{field} is required.');
		$this->form_validation->set_message('callback_getResponseCaptcha', '{field} {g-recaptcha-response} harus diisi. ');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('frontend/master_frontend', $data);
        } else {
            $insert = array(
                'id_user' => $this->input->post("id_user"),
                'subject' => $this->input->post("subject"),
                'msg' => $this->input->post("msg"),
                'status_msg' => 'UNREAD'
            );
            $this->model_messages->insertMsgUser($insert);
            $this->session->set_flashdata('successInputMsgs', 'Data berhasil ditambahkan');
            redirect('contact-us/send-messages');
        }

    }

    public function getResponseCaptcha($str)
    {
        $this->load->library('recaptcha');
        $response = $this->recaptcha->verifyResponse($str);
        if ($response['success']) {
            return true;
        } else {
            $this->form_validation->set_message('getResponseCaptcha', '%s is required.');
            return false;
        }
    }
}
