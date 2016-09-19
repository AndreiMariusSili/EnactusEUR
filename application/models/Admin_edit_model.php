<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_edit_model extends CI_Model
{
	public function videoEdit($post)
	{
		$title = $post['video_title'];
		$subtitle = $post['video_subtitle'];

		//update video title and subtitle in database
	    $data = array(
	    	'id' => 1,
	    	'video_title' => $title,
	    	'video_subtitle' => $subtitle,
	   	);
	    $this->db->update('landing_admin', $data);
	}
	public function aboutusEdit($post)
	{
		$block_left_icon = $post['block_left_icon'];
	    $block_left_title = $post['block_left_title'];
	    $block_left_content = $post['block_left_content'];
	    $block_center_icon = $post['block_center_icon'];
	    $block_center_title = $post['block_center_title'];
	    $block_center_content = $post['block_center_content'];
	    $block_right_icon = $post['block_right_icon'];
	    $block_right_title = $post['block_right_title'];
	    $block_right_content = $post['block_right_content'];



	    $data = array (
	    	'id' => 1,
	    	'aboutus_left_icon' => $block_left_icon,
	    	'aboutus_left_title' => $block_left_title,
	    	'aboutus_left_content' => $block_left_content,
	    	'aboutus_center_icon' => $block_center_icon,
	    	'aboutus_center_title' => $block_center_title,
	    	'aboutus_center_content' => $block_center_content,
	    	'aboutus_right_icon' => $block_right_icon,
	    	'aboutus_right_title' => $block_right_title,
	    	'aboutus_right_content' => $block_right_content,
	    );
	    $this->db->update('landing_admin', $data);
	}
	public function accompEdit($post)
	{
		$block_left_icon = $post['block_left_icon'];
	    $block_left_title = $post['block_left_title'];
	    $block_left_content = $post['block_left_content'];
	    $block_center_icon = $post['block_center_icon'];
	    $block_center_title = $post['block_center_title'];
	    $block_center_content = $post['block_center_content'];
	    $block_right_icon = $post['block_right_icon'];
	    $block_right_title = $post['block_right_title'];
	    $block_right_content = $post['block_right_content'];


	    $data = array (
	    	'id' => 1,
	    	'accomp_left_icon' => $block_left_icon,
	    	'accomp_left_title' => $block_left_title,
	    	'accomp_left_content' => $block_left_content,
	    	'accomp_center_icon' => $block_center_icon,
	    	'accomp_center_title' => $block_center_title,
	    	'accomp_center_content' => $block_center_content,
	    	'accomp_right_icon' => $block_right_icon,
	    	'accomp_right_title' => $block_right_title,
	    	'accomp_right_content' => $block_right_content,
	    );
	    $this->db->update('landing_admin', $data);
	}
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

	public function teams_create($title)
	{
	    $query = "INSERT INTO teams_admin_teams (title, updated_at) VALUES(?,?)";
	    $values = array($title, date("Y-m-d, H:i:s"));
	    $this->db->query($query, $values);
	}

	public function teams_get()
	{
	   $query ="SELECT * FROM teams_admin_teams";
	   $result = $this->db->query($query)->result_array();
	   return $result;
	}

	public function teams_delete($id)
	{
	    $this->db->delete('teams_admin_teams', array('id' => $id ));
	    $this->db->delete('teams_admin_members', array('teams_admin_team_id' => $id));
	}

	public function members_create($first_name, $last_name, $function, $linkedin, $mail, $quote, $team, $relative_path, $absolute_path)
	{
	    $team = $this->db->query("SELECT id FROM teams_admin_teams WHERE title='{$team}'")->row_array();

	    $query = "INSERT INTO teams_admin_members (teams_admin_team_id, first_name, last_name, function, linkedin, mail, quote, relative_path, absolute_path, updated_at) VALUES(?,?,?,?,?,?,?,?,?,?);";
	    $values= array($team['id'], $first_name, $last_name, $function, $linkedin, $mail, $quote, $relative_path, $absolute_path, date("Y-m-d, H:i:s"));

	    $this->db->query($query, $values);
	}

	public function members_get()
	{
	    $query ="SELECT teams_admin_members.id, teams_admin_members.first_name, teams_admin_members.last_name, teams_admin_teams.title AS team
					FROM teams_admin_members
					INNER JOIN teams_admin_teams
					ON teams_admin_teams.id = teams_admin_members.teams_admin_team_id
					ORDER BY teams_admin_teams.title ASC, teams_admin_members.updated_at DESC;";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function members_delete($id)
	{
		$query = "SELECT absolute_path FROM teams_admin_members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();

	    unlink($path['absolute_path']);

	    $this->db->delete('teams_admin_members', array('id' => $id ));
	}

	public function projects_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('projects', $data);
	}

	public function projects_delete($id)
	{
		$this->load->helper('file');

		$query = "SELECT members_id AS id FROM projects WHERE id = {$id}";
		$founders = $this->db->query($query)->result_array();

		foreach($founders as $founder)
		{
			$query = "SELECT cv FROM members WHERE id = {$founder['id']}";
			$path = $this->db->query($query)->row_array();
			unlink($path['cv']);

			$this->db->delete('members', array('id' => $founder['id']));
		}

		$query = "SELECT members_id AS id FROM teamleader_applications WHERE projects_id = {$id}";
		$teamleaders = $this->db->query($query)->result_array();

	    foreach ($teamleaders as $teamleader)
	    {
			$query = "SELECT cv FROM members WHERE id = {$teamleader['id']}";
		    $path = $this->db->query($query)->row_array();

		    unlink($path['cv']);

		    $this->db->delete('teamleader_applications', array('members_id' => $teamleader['id'], ));

	    	$this->db->delete('members', array('id' => $teamleader['id']));
	    }

		$query = "SELECT members_id AS id FROM teammember_applications WHERE projects_id = {$id}";
		$teammembers = $this->db->query($query)->result_array();

	    foreach ($teammembers as $teammember) {
	    	$query = "SELECT cv FROM members WHERE id = {$teammember['id']}";
		    $path = $this->db->query($query)->row_array();

		    unlink($path['cv']);

		    $this->db->delete('teammember_applications', array('members_id' => $teammember['id'], ));

	    	$this->db->delete('members', array('id' => $teammember['id']));
	    }

	    $this->db->delete('projects', array('id' => $id));
	}

	public function founders_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('members', $data);
	}

	public function founders_delete($id)
	{
		$this->load->helper('file');

		$query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();

	    unlink($path['cv']);

	    $query = "SELECT id from projects WHERE members_id = {$id}";
	    $project = $this->db->query($query)->row_array();

	    $this->projects_delete($project['id']);

	    $this->db->delete('members', array('id' => $id));

	}

	public function teamleader_applications_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('teamleader_applications', $data);
	}

	public function teamleader_applications_delete($id)
	{
		$this->load->helper('file');

	    $query = "SELECT members_id AS id FROM teamleader_applications WHERE id = {$id}";
	    $teamleader = $this->db->query($query)->row_array();

		$query = "SELECT cv FROM members WHERE id = {$teamleader['id']}";
	    $path = $this->db->query($query)->row_array();

	    unlink($path['cv']);

	    $this->db->delete('members', array('id' => $teamleader['id']));

	    $this->db->delete('teamleader_applications', array('id' => $id));
	}

	public function teammember_applications_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('teammember_applications', $data);
	}

	public function teammember_applications_delete($id)
	{
		$this->load->helper('file');

	    $query = "SELECT members_id AS id FROM teammember_applications WHERE id = {$id}";
	    $teammember = $this->db->query($query)->row_array();

		$query = "SELECT cv FROM members WHERE id = {$teammember['id']}";
	    $path = $this->db->query($query)->row_array();

	    unlink($path['cv']);

	    $this->db->delete('members', array('id' => $teammember['id']));

	    $this->db->delete('teammember_applications', array('id' => $id));
	}

	public function teamleaders_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('members', $data);
	}

	public function teamleaders_delete($id)
	{
		$this->load->helper('file');

		$query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();

	    unlink($path['cv']);

	    $query = "SELECT id FROM teamleader_applications WHERE members_id = {$id}";
	    $applications = $this->db->query($query)->result_array();

	    foreach ($applications as $application) {
	    	$this->db->delete('teamleader_applications', array('id' => $application['id']));
	    }

	    $this->db->delete('members', array('id' => $id));

	}

	public function teammembers_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('members', $data);
	}

	public function teammembers_delete($id)
	{
		$this->load->helper('file');

		$query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();

	    unlink($path['cv']);

	    $query= "SELECT id FROM teammember_applications WHERE members_id = {$id}";
	    $applications = $this->db->query($query)->result_array();

	    foreach ($applications as $application) {
	    	$this->db->delete('teammember_applications', array('id' => $application['id']));
	    }

	    $this->db->delete('members', array('id' => $id));

	}

	public function ambassadors_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('members', $data);
	}

	public function ambassadors_delete($id)
	{
		$this->load->helper('file');

		$query = "SELECT cv FROM members WHERE id = {$id}";
	    $path = $this->db->query($query)->row_array();

	    $this->db->delete('members', array('id' => $id));

	    unlink($path['cv']);
	}

	public function partners_update($id, $status)
	{
		$data=array(
			'status' => $status,
		);
	    $this->db->where('id', $id);
	    $this->db->update('partners', $data);
	}

	public function partners_delete($id)
	{
	    $this->db->delete('partners', array('id' => $id));
	}
}