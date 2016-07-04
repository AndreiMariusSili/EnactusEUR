<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function login($username)
	{
		$query = "SELECT * FROM admin_users WHERE username = ?";
		return $this->db->query($query, $username)->row_array();
	}

	public function landing_admin()
	{
	    $query = $this->db->get('landing_admin');
	    $data = $query->row();
	    return $data;
	}

}

?>