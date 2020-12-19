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
        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('date');
        $this->load->helper('directory');
        $this->load->helper("file");
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
        foreach ($this->cart->contents() as $items) {
            $no++;
            $output .= '
                <tr class="border-b border-gray-500">
                    <td class="py-2"><label class="font-bold text-gray-800">' . $items['name'] . '</label></td>
                    <td class="p-2">' . $items['qty'] . '</td>
                    <td class="float_right text-right"><button type="button" id="' . $items['rowid'] . '" class="hapus_cart text-center px-auto w-5 h-5 text-xs font-medium text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-full active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">x</button></td>
                </tr>
			';
        }
        $output .= '
                <tr>
                    <td class="text-gray-600 font-semibold py-4">
                        <input type="number" id="cekrowcart" class="cekrowcart hidden" value="' . $countCartRow . '">
                        Subtotal
                    </td>
                    <td></td>
                    <td class="text-gray-900 font-semibold py-4 float-right text-right">' . 'Rp ' . number_format($this->cart->total()) . '</td>
                </tr>';
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
            $data['getCourier'] = $this->model_courier->getAllCourier();
            $data['title']   = 'Checkout - ' . APP_NAME;
            $data['content'] = 'frontend/cart/detail_checkout';
            $data['detailCart'] = $this->showCart();
            $this->load->view('frontend/master_frontend', $data);
        }
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
}
