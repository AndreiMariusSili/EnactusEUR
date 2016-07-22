<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model
{
	//get number of projects
	public function ventureCount()
	{
		$query = "SELECT COUNT(id) AS ventures from projects";
		return $this->db->query($query)->row_array();
	}

    public function landing()
    {
        $query = $this->db->get('landing_admin');
        $data = $query->row();
        return $data;
    }

}

?>