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

	    $query = "SELECT projects.project_title, members.first_name AS founder_firstname, members.last_name AS founder_lastname, projects.project_description, projects.project_motivation, projects.status
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

	public function exportFounders()
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

	public function cvFounders($id)
	{
	    $this->load->helper('download');
	    $query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();
	    force_download($path["cv"], NULL);
	}

	public function viewTeamleaderApplications()
	{
	    $query = "SELECT teamleader_applications.*, members.first_name, members.last_name
					FROM teamleader_applications
					INNER JOIN members
					ON teamleader_applications.members_id = members.id
					ORDER BY status DESC, teamleader_applications.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function exportTeamleaderApplications()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT teamleader_applications.project_preference AS teamleader_application_target, members.first_name AS teamleader_first_name, members.last_name AS teamleader_last_name,teamleader_applications.apply_motivation, teamleader_applications.status
					FROM teamleader_applications
					INNER JOIN members
					ON teamleader_applications.members_id = members.id
					ORDER BY teamleader_applications.status ASC, teamleader_applications.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "teamleader_applications" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function viewTeammemberApplications()
	{
	    $query = "SELECT teammember_applications.*, members.first_name, members.last_name
					FROM teammember_applications
					INNER JOIN members
					ON teammember_applications.members_id = members.id
					ORDER BY status DESC, teammember_applications.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function exportTeammemberApplications()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT teammember_applications.project_preference AS teammember_application_target, members.first_name AS teammember_first_name, members.last_name AS teammember_last_name,teammember_applications.apply_motivation, teammember_applications.status
					FROM teammember_applications
					INNER JOIN members
					ON teammember_applications.members_id = members.id
					ORDER BY teammember_applications.status ASC, teammember_applications.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "teammember_applications" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function viewTeamleaders()
	{
	    $query = "SELECT members.*, teamleader_applications.project_preference
					FROM members
					INNER JOIN teamleader_applications
					ON teamleader_applications.members_id = members.id
					WHERE members.type='team leader'
					ORDER BY members.status ASC, members.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function exportTeamleaders()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT members.first_name, members.last_name, members.email, members.phone, members.dob, members.study, members.type, teamleader_applications.project_preference, teamleader_applications.apply_motivation AS motivation, members.status
					FROM members
					INNER JOIN teamleader_applications
					ON teamleader_applications.members_id = members.id
					WHERE type='team leader'
					ORDER BY members.status ASC, members.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "teamleaders" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function cvTeamleaders($id)
	{
	    $this->load->helper('download');
	    $query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();
	    force_download($path["cv"], NULL);
	}

	public function viewTeammembers()
	{
	    $query = "SELECT members.*, teammember_applications.project_preference
					FROM members
					INNER JOIN teammember_applications
					ON teammember_applications.members_id = members.id
					WHERE members.type='team member'
					ORDER BY members.status ASC, members.updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function exportTeammembers()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT members.first_name, members.last_name, members.email, members.phone, members.dob, members.study, members.type, teammember_applications.project_preference, teammember_applications.apply_motivation AS motivation, members.status
					FROM members
					INNER JOIN teammember_applications
					ON teammember_applications.members_id = members.id
					WHERE type='team member'
					ORDER BY members.status ASC, members.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "teammembers" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function cvTeammembers($id)
	{
	    $this->load->helper('download');
	    $query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();
	    force_download($path["cv"], NULL);
	}

	public function viewAmbassadors()
	{
	    $query = "SELECT *
					FROM members
					WHERE type='ambassador'
					ORDER BY status ASC, updated_at DESC";
		$result=$this->db->query($query)->result_array();
		return $result;
	}

	public function exportAmbassadors()
	{
	    $this->load->dbutil();
	    $this->load->helper('file');
	    $this->load->helper('download');

	    $query = "SELECT members.first_name, members.last_name, members.email, members.phone, members.dob, members.study, members.type, members.status, passives_motivation.motivation
					FROM members
					INNER JOIN ambassadors_motivation
					ON ambassadors_motivation.members_id = members.id
					WHERE type='ambassador'
					ORDER BY members.status ASC, members.updated_at DESC";

	    $result = $this->db->query($query);

	 	$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
	    $file = $this->dbutil->csv_from_result($result, $delimiter, $newline, $enclosure);
	    $name =  "ambassadors" . " " . date('Y-m-d') . ".csv";

	    force_download($name, $file);
	}

	public function cvAmbassadors($id)
	{
	    $this->load->helper('download');
	    $query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();
	    force_download($path["cv"], NULL);
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