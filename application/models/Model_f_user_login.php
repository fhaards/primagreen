<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_f_user_login extends CI_Model
{
	protected $table = 'user';
	public function __construct()
	{
		$this->load->database();
		$this->load->helper('directory');
		$this->load->helper("file");
	}

	function findBy($fieldName, $value)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($fieldName, $value);
		$query = $this->db->get();
		return $query->row_array();
	}

	function cekLogin($email, $password)
	{
		$userData = $this->db->get_where($this->table, ['email' => $email])->row_array();
		if (is_null($userData)) {
			return false;
		} else {
			return password_verify($password, $userData['password']);
		}
	}

	function getLevelByEmail($email)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();
		return $query->row_array()['level'];
	}

	public function getAllUsers()
	{
		$query = $this->db->get('user');
		return $query->result();
	}

	public function insert($user)
	{
		$this->db->insert('user', $user);
		return $this->db->insert_id();
	}

	public function getDataExist($email)
	{
		$this->db->select('email');
		$this->db->from('user');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
