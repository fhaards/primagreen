<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_f_user_login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// redirectIfAdminAccessUserPage();
		$this->load->database();
		$this->load->model('model_product');
		$this->load->model('model_f_user_login');
		$this->load->helper('array');
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('directory');
		$this->load->helper("file");
		$this->data['users'] = $this->model_f_user_login->getAllUsers();
	}

	public function index()
	{
		// $data['homepage'] = $this->model_f_homepage->getHomepage();
		$data['show_captcha'] = $this->recaptcha->render();
		$data['title']   = 'Login - ' . APP_NAME;
		$data['content'] = 'frontend/form-login';
		if ($this->session->userdata('status') == "login") {
			redirect(base_url("primagreen"));
		} else {
			$this->form_validation->set_error_delimiters('<div class="bg-red-600 w-100 p-2 my-2 text-xs shadow-lg rounded-sm text-white">', '</div>');
			$this->form_validation->set_rules('email', '<strong>Email</strong>', 'valid_email|required');
			$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|min_length[7]|max_length[30]');
			$this->form_validation->set_rules('g-recaptcha-response', '<strong>Captcha</strong> ', 'callback_getResponseCaptcha');
			//set message form validation
			$this->form_validation->set_message('required', '{field} is required.');
			$this->form_validation->set_message('callback_getResponseCaptcha', '{field} {g-recaptcha-response} harus diisi. ');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('frontend/master_frontend', $data);
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$cek = $this->model_f_user_login->cekLogin($email, $password);
				if ($cek) {
					$userData = $this->model_f_user_login->findBy('email', $email);
					$data_session = array('email' => $email, 'status' => "login", 'level' => $userData['level']);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('loginMsg', 'Success');
					if (getUserData()['level'] == 'admin') {
						redirect(base_url("dashboard"));
					}
					if (getUserData()['level'] == 'user') {
						redirect(base_url("primagreen"));
					}
				} else {
					$this->session->set_flashdata('errloginMsg', 'Error');
					redirect(base_url("login"));
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url("login"));
	}


	public function registration()
	{
		$data['show_captcha'] = $this->recaptcha->render();
		$data['title']   = 'Registration - ' . APP_NAME;
		$data['content'] = 'frontend/form-registration';
		$this->form_validation->set_error_delimiters('<div class="bg-red-600 w-100 p-2 my-2 text-xs shadow-lg rounded-sm text-white">', '</div>');
		$this->form_validation->set_rules('email', '<strong>Email</strong>', 'valid_email|required');
		$this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|min_length[7]|max_length[30]');
		$this->form_validation->set_rules('password_confirm', '<strong>Confirm Password</strong>', 'required|matches[password]');
		$this->form_validation->set_rules('g-recaptcha-response', '<strong>Captcha</strong> ', 'callback_getResponseCaptcha');
		//set message form validation
		$this->form_validation->set_message('required', '{field} is required.');
		$this->form_validation->set_message('callback_getResponseCaptcha', '{field} {g-recaptcha-response} harus diisi. ');
		if ($this->form_validation->run() == FALSE) {
			// $this->session->set_flashdata('errloginMsg', 'Error');
			// redirect(base_url("login"));
			$this->load->view('frontend/master_frontend', $data);
		} else {
			//get user inputs
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			//generate simple random code
			$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$code = substr(str_shuffle($set), 0, 12);

			//insert user to users table and get id
			$user['email'] = $email;
			$user['password'] = password_hash($password, PASSWORD_DEFAULT);;
			$user['code'] = $code;
			$user['level'] = 'user';
			$user['status_a'] = '2';
			$user['active'] = false;
			$user['nama'] = $this->input->post('nama');
			$user['tlp'] = $this->input->post('tlp');
			$user['alamat'] = $this->input->post('alamat');
			$id = $this->model_f_user_login->insert($user);

			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.gmail.com', //Ubah sesuai dengan host anda
				'smtp_port' => 465,
				'smtp_user' => 'mfahmi37@gmail.com', // Ubah sesuai dengan email yang dipakai untuk mengirim konfirmasi
				'smtp_pass' => 'google37', // ubah dengan password host anda
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'wordwrap' => TRUE
			);

			$message =  "<html>
							<head>
							<title>Verification Code</title>
							</head>
							<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Email: " . $email . "</p>
							<p>Password: " . $password . "</p>
							<p>Please click the link below to activate your account.</p>
							<h4><a href='" . base_url() . "user/activate/" . $id . "/" . $code . "'>Activate My Account</a></h4>
							</body>
						</html>";

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($config['smtp_user']);
			$this->email->to($email);
			$this->email->subject('Signup Verification Email');
			$this->email->message($message);

			//sending email
			if ($this->email->send()) {
				$this->session->set_flashdata('message', 'Activation code sent to email');
			} else {
				$this->session->set_flashdata('message', $this->email->print_debugger());
			}
			$this->session->set_flashdata('registMsg', 'Success');
			redirect('login');
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
