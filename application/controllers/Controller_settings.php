<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_settings extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_settings');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
    }

    public function profile()
    {
        $this->crumbs->add('Company Profile', base_url().'settings/company-profile');   
        $data['breadcrumb']=$this->crumbs->output();
        $data['pageTitle']   = 'Company Profile';
        $data['pageSubTitle']   = 'Detail of '.APP_NAME.' Profile';
        $data['orderList'] = $this->model_settings->getAllCompanyData();
        $data['title']   = 'Company Profile - ' . APP_NAME;
        $data['content'] = '_adminpages/company/read_company';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function addRandomly()
    {
        $data = array(
            'unique_code' => 'RANDOM-UNIQUECODE',
            'comp_nm' => 'RANDOM-NAMECOMPANY'
        );
        $this->model_settings->addNewCompany($data);
        $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
        redirect('settings/company-profile');
    }

    public function updateProfile($id)
    {
        $this->form_validation->set_rules('comp_nm', 'Company Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errorMsg', 'Data Gagal');
            redirect('settings/company-profile');
        } else {
            $baseLogo = $this->input->post('baseLogo');
            $baseFavIco = $this->input->post('baseFavIco');
           
            $uploadPath = './uploads/company';
            $configIcon = array('upload_path' => $uploadPath, 'allowed_types' =>
            'jpg|jpeg|gif|png|ico', 'max_size' => '5000', 'encrypt_name' => true);

            if (!is_dir('uploads/company')) {
                mkdir($uploadPath, 0777, true);
            } else {
            }

            $this->load->library('upload', $configIcon);

            if ($this->upload->do_upload("logoProfile")) {
                unlink($uploadPath . '/' . $baseLogo);
                $logoProfile  = array('upload_data' => $this->upload->data());
                $getlogoProfile = $logoProfile['upload_data']['file_name'];
            } else {
                $getlogoProfile = $baseLogo;
            }

            if ($this->upload->do_upload("favIcoProfile")) {
                unlink($uploadPath . '/' . $baseFavIco);
                $favIcoProfile  = array('upload_data' => $this->upload->data());
                $getFavIcoProfile = $favIcoProfile['upload_data']['file_name'];
            } else {
                $getFavIcoProfile = $baseFavIco;
            }

            $data = array(
                'comp_nm' => $this->input->post('comp_nm'),
                'unique_code' => $this->input->post('unique_code'),
                'telp' => $this->input->post('telp'),
                'instagram' => $this->input->post('instagram'),
                'address' => $this->input->post('address'),
                'about' => $this->input->post('about'),
                'logo' => $getlogoProfile,
                'icon' => $getFavIcoProfile
            );
            $this->model_settings->updateProfileCompany($data, $id);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('settings/company-profile');
        }
    }

    /// ------------------------------------ BANNER

    public function banner()
    {
        $this->crumbs->add('Setting Banner', base_url().'settings/banner');   
        $data['breadcrumb']=$this->crumbs->output();
        $data['title']   = 'Banner - ' . APP_NAME;
        $data['pageTitle']   = 'Setting Banner';
        $data['pageSubTitle']   = 'Detail of '.APP_NAME.' Websites Banner';
        $data['content'] = '_adminpages/banner/read_banner';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function addBannerRandomly()
    {
        $defaultImg = 'default_img.jpg';
        $data = array(
            'main_banner' => $defaultImg,
            'login_banner' => $defaultImg,
            'regist_banner' => $defaultImg
        );
        $this->model_settings->addNewBanner($data);
        $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
        redirect('settings/banner');
    }

    public function updateBanner($id)
    {

        $baseMainImage      = $this->input->post('baseMainImg');
        $baseLoginImage     = $this->input->post('baseLoginImg');
        $baseRegistImage    = $this->input->post('baseRegistImg');
        $basetContactusImage    = $this->input->post('baseContactusImg');
        
        $uploadPath = './uploads/banner';
        $configImage = array('upload_path' => $uploadPath, 'allowed_types' =>
        'jpg|jpeg|png', 'max_size' => '5000', 'encrypt_name' => true);

        if (!is_dir('uploads/banner')) {
            mkdir($uploadPath, 0777, true);
        } else {
        }

        $this->load->library('upload', $configImage);

        if ($this->upload->do_upload("mainImage")) {
            unlink($uploadPath . '/' . $baseMainImage);
            $mainImage  = array('upload_data' => $this->upload->data());
            $getmainImage = $mainImage['upload_data']['file_name'];
        } else {
            $getmainImage = $baseMainImage;
        }

        if ($this->upload->do_upload("loginImage")) {
            unlink($uploadPath . '/' . $baseLoginImage);
            $loginImage  = array('upload_data' => $this->upload->data());
            $getloginImage = $loginImage['upload_data']['file_name'];
        } else {
            $getloginImage = $baseLoginImage;
        }

        if ($this->upload->do_upload("registImage")) {
            unlink($uploadPath . '/' . $baseRegistImage);
            $registImage  = array('upload_data' => $this->upload->data());
            $getregistImage = $registImage['upload_data']['file_name'];
        } else {
            $getregistImage = $baseRegistImage;
        }

        if ($this->upload->do_upload("contactusImage")) {
            unlink($uploadPath . '/' . $basetContactusImage);
            $contactusImage  = array('upload_data' => $this->upload->data());
            $getcontactusImage = $contactusImage['upload_data']['file_name'];
        } else {
            $getcontactusImage = $basetContactusImage;
        }
        
        $data = array(
            'main_banner' => $getmainImage,
            'login_banner' => $getloginImage,
            'regist_banner' => $getregistImage,
            'contactus_banner' => $getcontactusImage
        );

        $this->model_settings->updateBannerData($data, $id);
        $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
        redirect('settings/banner');
    }
}
