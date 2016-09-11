<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model
{
	
	public function founder($first_name, $last_name, $email, $phone_number, $dob, $study, $title, $idea, $type, $statusProject, $statusMember, $cv, $motivation)
	{
		//insert data for new member
		$query = "INSERT INTO members (first_name, last_name, email, phone, dob, study, type, status, cv, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $dob, $study, $type, $statusMember, $cv , date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);

		//retrieve new member id
		$query = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();

		//register new project
		$query = "INSERT INTO projects (members_id, project_title, project_description, project_motivation, status,  updated_at) VALUES (?,?,?,?,?,?)";
		$values = array($result['id'], $title, $idea, $motivation, $statusProject, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}

	public function teamleader($first_name, $last_name, $email, $phone_number, $dob, $study, $preference, $type, $statusMember, $cv, $statusApplication ,$motivation)
	{
		//insert data for new member
		$query = "INSERT INTO members (first_name, last_name, email, phone, dob, study, type, status, cv, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $dob, $study, $type, $statusMember, $cv, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);

		//retrieve new member id
		$query = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1");
		$member = $query->row_array();

		//retrieve project id
		$query = $this->db->query("SELECT id FROM projects WHERE project_title = '{$preference}'");
		$project = $query->row_array();

		// register new application
		$query = "INSERT INTO teamleader_applications (members_id, projects_id, project_preference, apply_motivation, status, updated_at) VALUES (?,?,?,?,?,?)";
		$values = array($member['id'], $project['id'], $preference, $motivation, $statusApplication, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}

	public function teammember($first_name, $last_name, $email, $phone_number, $dob, $study, $preference, $type, $statusMember, $cv, $statusApplication ,$motivation)
	{
		//insert data for new member
		$query = "INSERT INTO members (first_name, last_name, email, phone, dob, study, type, status, cv, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $dob, $study, $type, $statusMember, $cv, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);

		//retrieve new member id
		$query = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1");
		$member = $query->row_array();

		//retrieve project id
		$query = $this->db->query("SELECT id FROM projects WHERE project_title = '{$preference}'");
		$project = $query->row_array();

		// register new application
		$query = "INSERT INTO teammember_applications (members_id, projects_id, project_preference, apply_motivation, status, updated_at) VALUES (?,?,?,?,?,?)";
		$values = array($member['id'], $project['id'], $preference, $motivation, $statusApplication, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}

	public function ambassador($first_name, $last_name, $email, $phone_number, $dob, $study, $type, $status, $cv, $motivation)
	{
		//insert data for new member
		$query = "INSERT INTO members (first_name, last_name, email, phone, dob, study, type, status, cv, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $dob, $study, $type, $status, $cv, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);

		//retrieve new member id
		$query = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1");
		$member = $query->row_array();

		// register new application
		$query = "INSERT INTO ambassador_motivations(members_id, motivation, updated_at) VALUES (?,?,?)";
		$values = array($member['id'], $motivation, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}

	public function partner($first_name, $last_name, $email, $phone_number, $organization, $motivation, $status)
	{
		//insert data for new member
		$query = "INSERT INTO partners (first_name, last_name, email, phone, organization, interest, status,  updated_at) VALUES (?,?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $organization, $motivation, $status, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}
}