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
            'qty' => $this->input->post('quantity'),
            'sku' => $this->input->post('sku'),
            'gambar' => $this->input->post('gambar')
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
                <input hidden type="text" value="' . $items['id'] . '" name="id_barang[]">
                <input hidden type="text" value="' . $items['qty'] . '" name="qty[]">
                        <div class="flex flex-row w-4/4 border border-gray-500 my-2 md:px-0 md:py-0 py-2 px-2 space-x-3 md:space-x-5">
                            <div class="flex h-16 w-20 ">
                                <img class="object-cover opacity-75" src="' . base_url() . 'uploads/product/' .  $items['sku'] . '/' . $items['gambar'] . '">
                            </div>
                            <div class="flex flex-col w-full w-4/4 md:px-2 md:py-2">    
                                <div class="w-full lg:pl-0 flex flex-row ">
                                    <div class="w-11/12"><span class="font-bold text-gray-800">' . $items['name'] . '</span></div>
                                    <div class="w-1/12">
                                        <button type="button" id="' . $items['rowid'] . '" 
                                            class="hapus_cart p-1 w-5 h-5 rounded-md mt-0 text-center  mx-auto font-bold text-xs text-white transition-colors duration-150 bg-red-600 active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex flex-row w-full md:space-x-6">
                                    <div class="flex-1"><label class="font-bold mx-auto w-1/4 text-gray-600">Qty : ' . $items['qty'] . '</label></div>
                                </div>
                            </div>
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
        $dateNow  = date('Y-m-d H:i:s');
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
                'tgl_pesan' => $dateNow,
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
