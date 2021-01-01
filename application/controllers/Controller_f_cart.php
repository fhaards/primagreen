<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_f_cart extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        redirectIfAdminAccessUserPage();
        $this->load->database();
        $this->load->model('model_product');
        $this->load->model('model_f_homepage');
        $this->load->model('model_courier');
        $this->load->model('model_order');
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
        $this->load->helper("styling");
        $this->load->helper("string");
    }

    function addToCart()
    {
        $data = array(
            'id' => $this->input->post('produk_id'),
            'name' => $this->input->post('produk_nama'),
            'price' => $this->input->post('produk_harga'),
            'qty' => $this->input->post('quantity')
        );
        $this->cart->insert($data);
        // echo json_encode($data);
        // echo json_encode($this->showCart());
        echo $this->showCart();
    }

    function showCart()
    {
        $output = '';
        $no = 0;
        $countCartRow = count($this->cart->contents());
        if ($countCartRow == 0) {
            $output .= '<div class="bg-gray-300 p-10 w-full rounded-lg items-center flex"><div class="mx-auto text-sm font-bold"> Ops, Cart is empty. </div></div>';
        } else {
            $output .= '<div class="list-cart overflow-y-scroll">';
                foreach ($this->cart->contents() as $items) {
                    $no++;
                    $output .= '
                        <div class="flex flex-row w-4/4 bg-gray-200 my-2 lg:py-2 lg:px-4 items-center">
                            <input hidden type="text" value="' . $items['id'] . '" name="id_barang[]">
                            <input hidden type="text" value="' . $items['qty'] . '" name="qty[]">
                            <div class="w-3/4 pl-4 lg:pl-0"><label class="font-bold text-gray-800">' . $items['name'] . '</label></div>
                            <div class="items-center mx-auto"><label class="flex items-center font-bold mx-auto w-1/4 text-gray-800">' . $items['qty'] . '</label></div>
                            <button type="button" id="' . $items['rowid'] . '" 
                                class="mt-0 hapus_cart text-center px-auto h-8 w-8 lg:w-5 lg:h-5 text-xs text-white transition-colors duration-150 bg-red-600 lg:rounded-full active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                    x
                            </button>
                        </div>
                    ';
                }
            $output .= '</div>';
            $output .= '<div class="flex flex-row space-x-8 border-t border-gray-500">
                            <div class="flex-1 text-gray-600 font-semibold py-4">
                                <input type="number" id="cekrowcart" name="count_row" class="cekrowcart hidden" value="' . $countCartRow . '">
                                Subtotal
                            </div>
                            <div class="text-gray-900 font-bold py-4 float-right text-right">' . 'Rp ' . number_format($this->cart->total()) . '</div>
                        </div>';
           
        }

        // echo json_encode($output);
        return $output;
    }

    function showCartJson()
    {
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'id' => $items['id'],
                'name' => $items['name'],
                'price' => $items['price'],
                'qty' => $items['qty']
            );
            echo json_encode($data);
        }
    }

    function subTotalCartJson()
    {
        $subtotal = $this->cart->total();
        $data = array(
            'subtotal' => $subtotal
        );
        echo json_encode($data);
        return false;
    }

    function loadCart()
    {
        echo $this->showCart();
    }

    function loadCheckoutDetail()
    {
        $countCartRow = count($this->cart->contents());
        if ($countCartRow == 0) {
            $this->session->set_flashdata('emptyCart', 'Empty Cart');
            redirect('primagreen');
        } else {
            $data['getCourier'] = $this->model_courier->getAllCourierEnabled();
            $data['title']   = 'Checkout - ' . APP_NAME;
            $data['content'] = 'frontend/cart/detail_checkout';
            $data['detailCart'] = $this->showCart();
            $this->load->view('frontend/master_frontend', $data);
        }
    }


    function loadCourier()
    {
        $data = $this->model_courier->getAllCourier();
        echo json_encode($data);
    }

    function loadCourierById($id)
    {
        $data = $this->model_courier->getCourierById($id);
        echo json_encode($data);
    }

    function deleteCartItems()
    {
        $data = array(
            'rowid' => $this->input->post('row_id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->showCart();
    }

    function checkOut()
    {
        $idbarang = $this->input->post('id_barang');
        $getUser = $this->input->post('user_checkout');
        $qty = $this->input->post('qty');
        $date = date('Y-m-d');
        $dateSet = date('d');
        $hourSet = date('h');
        $minuteSet = date('i');
        $getString = strtoupper(random_string('alpha', 4));
        $getString2 = strtoupper(random_string('alpha', 2));
        $getNum = random_string('numeric', 2);
        $setNoPemesanan = $getString . $dateSet . $getUser . $hourSet . $getNum . $minuteSet . $getString2;

        $totalHarga = $this->input->post('totalorder');
        $idKurir = $this->input->post('id_kurir');
        $hargaKurir = $this->input->post('harga_kurir');
        $namaTujuan = $this->input->post('nama_t');
        $alamatTujuan = $this->input->post('alamat_t');

        $data = array();
        foreach ($idbarang as $key => $value) {
            $data[]  = array(
                'id_barang' => $value,
                'qty_pesan' => $qty[$key],
                'id_user' => $getUser,
                'no_pemesanan' => $setNoPemesanan,
                'total_harga' => $totalHarga,
                'tgl_pesan' => $date,
                'id_kurir' => $idKurir,
                'hrg_kurir' => $hargaKurir,
                'nama_t' => $namaTujuan,
                'alamat_t' => $alamatTujuan,
                'status' => "ONHOLD"
            );
        }

        $this->db->insert_batch('pemesanan', $data);
        $this->session->set_flashdata('SuccessCheckout', 'Data berhasil ditambahkan');
        $this->cart->destroy();
        redirect('cart/checkout-finish/' . $setNoPemesanan);
    }

    function loadCheckoutFinish($setNoPemesanan)
    {
        $data['getNoPemesanan'] = $setNoPemesanan;
        $data['title']   = 'Checkout Finish - ' . APP_NAME;
        $data['content'] = 'frontend/cart/success_checkout';
        $this->load->view('frontend/master_frontend', $data);
    }
}
