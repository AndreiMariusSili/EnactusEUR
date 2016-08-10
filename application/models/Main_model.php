<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model
{
	//get number of projects
	public function ventureCount()
	{
		$query = "SELECT COUNT(id) AS ventures from projects WHERE status='running'";
		return $this->db->query($query)->row_array();
	}

    public function landing()
    {
        $query = $this->db->get('landing_admin');
        $data = $query->row_array();
        return $data;
    }

    public function options_get()
    {
        $query = "SELECT project_title FROM projects WHERE status='pending'";
        $result = $this->db->query($query)->result_array();
        return $result;
    }

    public function teams()
    {
        $data['teams'] = $this->db->get('teams_admin_teams')->result_array();
        $data['members'] = $this->db->get('teams_admin_members') ->result_array();
        return $data;
    }
}

?>