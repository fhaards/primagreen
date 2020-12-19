<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_f_user_login extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        // redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_user_login');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function index(){
        // $data['homepage'] = $this->model_f_homepage->getHomepage();
        $data['title']   = 'Login - ' . APP_NAME;
        $data['content'] = 'frontend/form-login';
		if($this->session->userdata('status') == "login"){
			redirect(base_url("primagreen"));
		}	
		else{
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if($this->form_validation->run() === FALSE){
				$this->load->view('frontend/master_frontend', $data);
			}
			else{
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$cek=$this->model_f_user_login->cekLogin($email,$password);
				if($cek){
					$userData=$this->model_f_user_login->findBy('email',$email);
					$data_session=array('email' => $email,'status' =>"login",'level'=>$userData['level']);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('loginMsg', 'Success');
                    if(getUserData()['level']=='admin'){
                        redirect(base_url("dashboard"));
                    }
                    if(getUserData()['level']=='user'){
                        redirect(base_url("primagreen"));
                    }
				}
				else{
					$this->session->set_flashdata('errloginMsg', 'Error');
					redirect(base_url("login"));
				}
			}
			
		}
    }

    public function logout(){
		$this->session->sess_destroy();
		redirect(base_url("login"));
	}

}
