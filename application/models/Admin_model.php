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
	    $data = $query->row_array();
	    return $data;
	}
	public function viewProjects()
	{
		$query = "SELECT projects.id, projects.project_title, projects.updated_at, projects.status, members.first_name, members.last_name
					FROM projects
					INNER JOIN members
					ON projects.members_id = members.id
					ORDER BY projects.status ASC, projects.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function projectsExport()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT projects.project_title, members.first_name AS founder_firstname, members.last_name AS founder_lastname, projects.project_description, projects.project_motivation, projects.status, projects.updated_at
					FROM projects
					INNER JOIN members
					ON projects.members_id = members.id
					ORDER BY projects.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "projects" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function viewFounders()
	{
	    $query = "SELECT members.*, projects.project_title
					FROM members
					INNER JOIN projects
					ON projects.members_id = members.id
					WHERE type='founder'
					ORDER BY members.status ASC, members.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function foundersExport()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT members.first_name, members.last_name, projects.project_title AS project_founded, members.email, members.phone, members.dob, members.study, members.type, members.status
					FROM members
					INNER JOIN projects
					ON projects.members_id = members.id
					WHERE type='founder'
					ORDER BY members.status ASC, members.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "founders" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function viewApplications()
	{
	    $query = "SELECT applications.*, members.first_name, members.last_name
					FROM applications
					INNER JOIN members
					ON applications.members_id = members.id
					ORDER BY status DESC, applications.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function applicationsExport()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT applications.project_preference, members.first_name AS cofounder_first_name, members.last_name AS cofounder_last_name, applications.apply_motivation, applications.status, applications.updated_at
					FROM applications
					INNER JOIN members
					ON applications.members_id = members.id
					ORDER BY applications.status ASC, applications.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "applications" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function viewCofounders()
	{
	    $query = "SELECT members.*, applications.project_preference
					FROM members
					INNER JOIN applications
					ON applications.members_id = members.id
					WHERE type='cofounder'
					ORDER BY members.status ASC, members.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function cofoundersExport()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT members.first_name, members.last_name, members.email, members.phone, members.dob, members.study, members.type, members.status, applications.project_preference, applications.apply_motivation AS motivation
					FROM members
					INNER JOIN applications
					ON applications.members_id = members.id
					WHERE type='cofounder'
					ORDER BY members.status ASC, members.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "cofounders" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function viewPassives()
	{
	    $query = "SELECT members.*
					FROM members
					WHERE type='passive'
					ORDER BY members.status ASC, members.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function passivesExport()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT members.first_name, members.last_name, members.email, members.phone, members.dob, members.study, members.type, members.status, passives_motivation.motivation
					FROM members
					INNER JOIN passives_motivation
					ON passives_motivation.members_id = members.id
					WHERE type='passive'
					ORDER BY members.status ASC, members.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "passives" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function viewPartners()
	{
	    $query = "SELECT * FROM partners ORDER BY updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function partnersExport()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT first_name, last_name, organization, email, phone, interest, status, updated_at FROM partners ORDER BY updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "partners" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}	

    public function options_get()
    {
        $query = "SELECT project_title FROM projects WHERE status='pending'";
        $result = $this->db->query($query)->result_array();
        return $result;
    }
}

?>