<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_messages extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
    }
    
    public function insertMsgGuest($insert){
        return $this->db->insert('msg_guest', $insert);
	}
	
    public function insertMsgUser($insert){
        return $this->db->insert('msg_user', $insert);
    }
}