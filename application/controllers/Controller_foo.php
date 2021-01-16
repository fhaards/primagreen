<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_foo extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // redirectIfNotAdmin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_homepage');
        $this->load->model('model_favorites');
        $this->load->model('model_product_related');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("string");
    }

    public function index()
    {
        $this->load->view('foo');
    }

    public function dummy()
    {
        $type = $this->input->post("type");
        $data['getType'] =  '';
        if (!empty($type)) {
            $data['getType'] = $type;
            $data['productList'] = $this->model_product->getAllProductsByIdType($type);
        } else {
            $data['getType'] = $type;
            $data['productList'] = $this->model_product->getAllProducts();
        }

        $this->crumbs->add('Product List', base_url() . 'product/product-list');
        $data['breadcrumb'] = $this->crumbs->output();

        $data['type_data'] = $this->model_product_related->getAllTypesEnabled();
        $data['title']   = 'Product - ' . APP_NAME;
        $data['pageTitle']   = 'Product';
        $data['pageSubTitle']   = 'List of Table Products';
        $data['content'] = 'testing_tables';
        $this->load->view('_adminpages/master_admin', $data);
    }

    public function tested()
    {
        $data['newItems'] = $this->model_f_homepage->getNewItems();
        $data['favItems'] = $this->model_favorites->getFavoriteste();
        $this->load->view('foo', $data);
    }

    public function sendmail()
    {
        $this->load->view('tested/sendmail_regist');
    }

    public function sendthismail()
    {
        $this->load->library('mailer');
        $email_penerima = $this->input->post('email_penerima');
        $subjek = $this->input->post('subjek');
        $pesan = $this->input->post('pesan');
        $content = $this->load->view('tested/mail_content', array('pesan' => $pesan), true);
        $sendmail = array(
            'email_penerima' => $email_penerima,
            'subjek' => $subjek,
            'content' => $content
        );
        $send = $this->mailer->send($sendmail);
        if ($send) {
            redirect('foo/sendmail');
        }
    }

    public function sendthismail_regist()
    {
        $this->load->library('mailer');
        $email_receipt = $this->input->post('email');
        $subject = 'Hey, Thanks for signing up !';
        $name = $this->input->post('name');
        $content = $this->load->view('tested/mail_content',  array('name' => $name), true);
        $sendmail = array(
            'email_receipt' => $email_receipt,
            'subject' => $subject,
            'content' => $content
        );
        $send = $this->mailer->send_registration($sendmail);
        if ($send) {
            echo "<b>" . $send['status'] . "</b><br />";
            echo $send['message'];
            echo "<br /><a href='" . base_url("foo/sendthismail") . "'>Kembali ke Form</a>";
        }
    }
}
