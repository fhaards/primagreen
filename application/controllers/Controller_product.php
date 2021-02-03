<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        redirectIfNotLogin();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_product_related');
        $this->load->model('model_order');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->library('crumbs');
        $this->load->library('components');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("product");
        $this->load->helper("material");
    }
    public function index()
    {
        $type = $this->input->post("type");
        $data['getType'] =  '';
        if (!empty($type)) {
            $data['getType'] = $type;
            $data['productList'] = $this->model_product->getAllProductsByIdType($type);
            $data['productInOrder'] = $this->model_order->getProductsId();
        } else {
            $data['getType'] = $type;
            $data['productList'] = $this->model_product->getAllProducts();
            $data['productInOrder'] = $this->model_order->getProductsId();
        }

        $this->crumbs->add('Product List', base_url() . 'product/product-list');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['type_data'] = $this->model_product_related->getAllTypesEnabled();
        $data['title']   = 'Product - ' . APP_NAME;
        $data['pageTitle']   = 'Product';

        //BUTTON
        $data['addButton'] = $this->components->isHref('typeStandard', 'colorPrimary', 'iconAdd', 'New Product', 'product/product-add');
        $data['filterButton'] = $this->components->isButtonSubmit('typeStandard', 'colorPrimary', 'iconFilter', 'Filter');

        $data['pageSubTitle']   = 'List of Table Products';
        $data['content'] = '_adminpages/product/read_product';
        $this->load->view('_adminpages/master_admin', $data);
    }


    public function newProductForm()
    {
        $this->crumbs->add('Product List', base_url() . 'product/product-list');
        $this->crumbs->add('New Product', base_url() . 'product/product-add');
        $data['breadcrumb'] = $this->crumbs->output();
        $data['title']   = 'Add New Product - ' . APP_NAME;
        $data['pageTitle']   = 'Product';
        $data['pageSubTitle']   = 'New Product Form';
        $data['content'] = '_adminpages/product/form_add_product';
        $data['typeList'] = $this->model_product_related->getAllTypes();
        $data['featuresList'] = $this->model_product_related->getFeaturesEnabled();
        $data['submitButton'] = $this->components->isButtonSubmit('typeStandard', 'colorPrimary', 'iconSubmit', 'Submit');

        $this->form_validation->set_error_delimiters('<div class="bg-red-100 w-100 py-1 px-4 my-1 text-xs border-2 border-red-300 rounded-md text-red-500">', '</div>');
        $this->form_validation->set_rules('nm_product', 'Common Name', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        // $this->form_validation->set_rules('features[]', 'Features', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('_adminpages/master_admin', $data);
        } else {
            $nmProduct = $this->input->post('nm_product');
            $getSku = mb_substr($nmProduct, 0, 3);
            $getSkuCode = '00' . rand(10, 100) . 'PLNT' . strtoupper($getSku) . rand(100, 300);
            $uploadPath = './uploads/product/' . $getSkuCode;
            $config = array('upload_path' => $uploadPath, 'allowed_types' =>
            'jpg|jpeg|gif|png|webp', 'max_size' => '5000', 'encrypt_name' => true);
            $this->load->library('upload', $config);

            if (!is_dir('uploads/product/' . $getSkuCode)) {
                mkdir($uploadPath, 0777, true);
            } else {
            }

            if ($this->upload->do_upload("product_img_1")) {
                $productImage1  = array('upload_data' => $this->upload->data());
                $getProductImage1 = $productImage1['upload_data']['file_name'];
            } else {
                $getProductImage1 = $this->input->post('default_img');
            }

            if ($this->upload->do_upload("product_img_2")) {
                $productImage2  = array('upload_data' => $this->upload->data());
                $getProductImage2 = $productImage2['upload_data']['file_name'];
            } else {
                $getProductImage2 = $this->input->post('default_img');
            }

            if ($this->upload->do_upload("product_img_3")) {
                $productImage3  = array('upload_data' => $this->upload->data());
                $getProductImage3 = $productImage3['upload_data']['file_name'];
            } else {
                $getProductImage3 = $this->input->post('default_img');
            }

            //SEND FEATURES AS ARRAY
            $features = $this->input->post('features');

            $date = date('Y-m-d');
            $data = array(
                'nm_barang' => $nmProduct,
                'nm_barang_bot' => $this->input->post('nm_barang_bot'),
                'id_type' => $this->input->post('type'),
                'size' => $this->input->post('size'),
                'size_desc' => $this->input->post('size_desc'),
                'light' => $this->input->post('light'),
                'harga' => $this->input->post('price'),
                'stok' => $this->input->post('stock'),
                'detail' => $this->input->post('detail_info'),
                'date_a' => $date,
                'sku' => $getSkuCode,
                'gambar' => $getProductImage1,
                'gambar2' => $getProductImage2,
                'gambar3' => $getProductImage3,
                'product_status' => '1'
            );

            $this->model_product->insert_product($data, $features);
            $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
            redirect('product/product-list');
        }
    }

    public function editProductForm($id)
    {
        $this->crumbs->add('Product List', base_url() . 'product/product-list');
        $this->crumbs->add('Edit Product', base_url() . 'product/product-edit');
        $data['breadcrumb'] = $this->crumbs->output();

        $data['title']   = 'Edit Product - ' . APP_NAME;
        $data['pageTitle']   = 'Product';
        $data['pageSubTitle']   = 'Edit Product Form';
        $data['content'] = '_adminpages/product/form_edit_product';
        $data['typeList'] = $this->model_product_related->getAllTypes();
        $data['featuresList'] = $this->model_product_related->getFeaturesEnabled();
        $data['submitButton'] = $this->components->isButtonSubmit('typeStandard', 'colorPrimary', 'iconSubmit', 'Submit');
        $this->form_validation->set_rules('Nama Produk', 'Stok', 'Detail Info', 'features', 'price', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['edt_product'] = $this->model_product->edt_product($id);
            $data['get_features'] = $this->model_product->get_product_features($id);
            $this->load->view('_adminpages/master_admin', $data);
        } else {
            //SEND FEATURES AS ARRAY
            $features = $this->input->post('features');
            $getData = array(
                'nm_barang' => $this->input->post('nm_barang'),
                'nm_barang_bot' => $this->input->post('nm_barang_bot'),
                'id_type' => $this->input->post('type'),
                'size' => $this->input->post('size'),
                'size_desc' => $this->input->post('size_desc'),
                'light' => $this->input->post('light'),
                'harga' => $this->input->post('price'),
                'stok' => $this->input->post('stock'),
                'detail' => $this->input->post('detail_info'),
            );
            $this->model_product->edt_product_todb($id, $getData, $features);
            $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
            redirect('product/product-list');
        }
    }

    public function editProductImg($id)
    {
        $this->crumbs->add('Product List', base_url() . 'product/product-list');
        $this->crumbs->add('Edit Product', base_url() . 'product/product-edit-image');
        $data['breadcrumb'] = $this->crumbs->output();

        $data['title']   = 'Edit Product - ' . APP_NAME;
        $data['pageTitle']   = 'Product';
        $data['pageSubTitle']   = 'Edit Product Image';
        $data['content'] = '_adminpages/product/form_edit_productImg';
        $this->form_validation->set_rules('nm_product', 'Product Name', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['edtProductImg'] = $this->model_product->edt_product($id);
            $this->load->view('_adminpages/master_admin', $data);
        } else {
            $skuCode = $this->input->post('sku');
            $baseImg1 = $this->input->post('baseImg1');
            $baseImg2 = $this->input->post('baseImg2');
            $baseImg3 = $this->input->post('baseImg3');
            $uploadPath = './uploads/product/' . $skuCode;
            $config = array('upload_path' => $uploadPath, 'allowed_types' =>
            'jpg|jpeg|gif|png', 'max_size' => '5000', 'encrypt_name' => true);

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("product_img_1")) {
                unlink($uploadPath . '/' . $baseImg1);
                $productImage1  = array('upload_data' => $this->upload->data());
                $getProductImage1 = $productImage1['upload_data']['file_name'];
            } else {
                $getProductImage1 = $baseImg1;
            }

            if ($this->upload->do_upload("product_img_2")) {
                unlink($uploadPath . '/' . $baseImg2);
                $productImage2  = array('upload_data' => $this->upload->data());
                $getProductImage2 = $productImage2['upload_data']['file_name'];
            } else {
                $getProductImage2 = $baseImg2;
            }

            if ($this->upload->do_upload("product_img_3")) {
                unlink($uploadPath . '/' . $baseImg3);
                $productImage3  = array('upload_data' => $this->upload->data());
                $getProductImage3 = $productImage3['upload_data']['file_name'];
            } else {
                $getProductImage3 = $baseImg3;
            }

            $data = array(
                'gambar' => $getProductImage1,
                'gambar2' => $getProductImage2,
                'gambar3' => $getProductImage3
            );

            $this->model_product->edt_productImage_todb($id, $data);
            $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
            redirect('product/product-edit-image/' . $id);
        }
    }

    //EDIT STOCK
    public function editProductStock($id)
    {
        $data = array(
            'stok' => $this->input->post('stock')
        );
        $this->model_product->editProductStock($id, $data);
        $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
        redirect('product/product-list');
    }

    //DELETING SPECIFIC IMAGE 

    public function editProductImgS1($id)
    {
        $data = array(
            'gambar' => 'default_img.jpg'
        );
        $this->model_product->edtProductImageSpecific1($id, $data);
        $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
        redirect('product/product-edit-image/' . $id);
    }

    public function editProductImgS2($id)
    {
        $data = array(
            'gambar2' => 'default_img.jpg'
        );
        $this->model_product->edtProductImageSpecific2($id, $data);
        $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
        redirect('product/product-edit-image/' . $id);
    }

    public function editProductImgS3($id)
    {
        $data = array(
            'gambar3' => 'default_img.jpg'
        );
        $this->model_product->edtProductImageSpecific3($id, $data);
        $this->session->set_flashdata('editMsg', 'Data berhasil diubah');
        redirect('product/product-edit-image/' . $id);
    }

    public function deleteProduct($id)
    {

        $getData    = $this->model_product->detailProducts($id);
        $getSku     = $getData['sku'];
        $uploadPath = './uploads/product/' . $getSku;
        $deleteFolder = rmdir($uploadPath);
        if ($deleteFolder) {
            $data =  $this->model_product->deleteProductById($id);
        }
        echo json_encode($data);
    }
}

    // public function newProductForm()
    // {
    //     // $data['productList'] = $this->model_product->read_tb_product();
    //     $data['title']   = 'Add New Product - ' . APP_NAME;
    //     $data['content'] = '_adminpages/product/form_add_product';

    //     $this->form_validation->set_rules('Nama Produk', 'Stok', 'Detail Info', 'features', 'price', 'required');
    //     if ($this->form_validation->run() === FALSE) {
    //         $this->load->view('_adminpages/master_admin', $data);
    //     } else {
    //         $this->model_product->insert_product();
    //         $this->session->set_flashdata('InputMsg', 'Data berhasil ditambahkan');
    //         redirect('product/product-list');
    //     }
    // }