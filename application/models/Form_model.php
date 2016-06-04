<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model
{
	
	public function founder($first_name, $last_name, $email, $phone_number, $dob, $study, $title, $idea, $motivation)
	{
		//insert data for new member
		$query = "INSERT INTO members (first_name, last_name, email, phone, dob, study, updated_at) VALUES (?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $dob, $study, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);

		//retrieve new member id
		$query = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();

		//register new member as founder
		$query = "INSERT INTO founders (members_id) VALUES(?)";
		$this->db->query($query, $result['id']);

		//retrieve founder id
		$query = $this->db->query("SELECT id FROM founders ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();

		//register new project
		$query = "INSERT INTO projects (founders_id, project_title, project_description, project_motivation, updated_at) VALUES (?,?,?,?,?)";
		$values = array($result['id'], $title, $idea, $motivation, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}

	public function cofounder($first_name, $last_name, $email, $phone_number, $dob, $study, $preference, $motivation)
	{
		//insert data for new member
		$query = "INSERT INTO members (first_name, last_name, email, phone, dob, study, updated_at) VALUES (?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $dob, $study, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);

		//retrieve new member id
		$query = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();

		//register new member as cofounder
		$query = "INSERT INTO cofounders (members_id) VALUES(?)";
		$this->db->query($query, $result['id']);

		//retrieve cofounder id
		$query = $this->db->query("SELECT id FROM cofounders ORDER BY id DESC LIMIT 1");
		$cofounder = $query->row_array();

		//retrieve project id
		$query = $this->db->query("SELECT id FROM projects WHERE project_title = '{$preference}'");
		$project = $query->row_array();

		// register new application
		$query = "INSERT INTO applications (cofounders_id, projects_id, project_preference, apply_motivation, updated_at) VALUES (?,?,?,?,?)";
		$values = array($cofounder['id'], $project['id'], $preference, $motivation,  date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}

	public function passive($first_name, $last_name, $email, $phone_number, $dob, $study, $motivation)
	{
		//insert data for new member
		$query = "INSERT INTO members (first_name, last_name, email, phone, dob, study, updated_at) VALUES (?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $dob, $study, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);

		//retrieve new member id
		$query = $this->db->query("SELECT id FROM members ORDER BY id DESC LIMIT 1");
		$result = $query->row_array();

		//register new member as passive member
		$query = "INSERT INTO passives (members_id, motivation) VALUES(?,?)";
		$values = array($result['id'], $motivation);
		$this->db->query($query, $values);
	}

	public function partner($first_name, $last_name, $email, $phone_number, $organization, $motivation)
	{
		//insert data for new member
		$query = "INSERT INTO partners (first_name, last_name, email, phone, organization, interest, updated_at) VALUES (?,?,?,?,?,?,?)";
		$values = array($first_name, $last_name, $email, $phone_number, $organization, $motivation, date("Y-m-d, H:i:s"));
		$this->db->query($query, $values);
	}
}