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
	    $data = $query->result_array();
	    return $data;
	}
	public function viewProjects()
	{
		$query = "SELECT projects.id, projects.project_title, projects.updated_at, projects.status, members.first_name, members.last_name
					FROM projects
					INNER JOIN members
					ON projects.members_id = members.id
					ORDER BY projects.status ASC, projects.updated_at DESC";
		$result=$this->db->query($query);
		return $result;
	}
}

?>