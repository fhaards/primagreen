<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_payment extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
    }
    
    public function getBy_NoPemesanan($noOrder){
        $this->db->select('*');
		$this->db->from('pay_con');
		$this->db->where("no_pemesanan", $noOrder);
		return $this->db->get();
    }
}