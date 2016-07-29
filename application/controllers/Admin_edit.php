<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_edit extends CI_Controller 
{
	public function videoEdit()
	{
		$this->load->model('Admin_edit_model');

		$post = $this->input->post(NULL, TRUE);
		$this->Admin_edit_model->videoEdit($post);
		redirect('/Admin/landing_admin');
	}

    public function videoPosterUpload()
    {
        $this->load->helper('url');

        $config['upload_path'] = '/Users/Andrei/Sites/GitHub/EnactusMVC/assets/videos/';
        $config['allowed_types'] = 'mp4|webm';
        $config['file_name'] = 'background-video';
        $config['overwrite'] = TRUE;

        $this->load->library('upload');

        $this->upload->initialize($config);
        $this->upload->do_upload('video');

        $config['upload_path'] = '/Users/Andrei/Sites/GitHub/EnactusMVC/assets/videos/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = 'background-video-poster';
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config);
        $this->upload->do_upload('poster');

        redirect('/Admin/landing_admin');
    }

    public function aboutusEdit()
    {
        $this->load->model('Admin_edit_model');

        $post = $this->input->post(NULL, TRUE);
        $this->Admin_edit_model->aboutusEdit($post);
        redirect('/Admin/landing_admin');
    }

    public function accompEdit()
    {
        $this->load->model('Admin_edit_model');

        $post = $this->input->post(NULL, TRUE);
        $this->Admin_edit_model->accompEdit($post);
        redirect('/Admin/landing_admin');
    }

    public function newFounder()
    {
        $this->load->model('Admin_edit_model');

        $post= $this->input->post(NULL, TRUE);
        $this->Admin_edit_model->newFounder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["title"], $post["idea"], $post["statusMember"], $post["statusProject"], $post["motivation"]);
        redirect('/Admin/founders_create');
    }

    public function newCofounder()
    {
        $this->load->model('Admin_edit_model');

        $post= $this->input->post(NULL, TRUE);
        $this->Admin_edit_model->newCofounder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["status"], $post["motivation"]);
        redirect('/Admin/cofounders_create');
    }

    public function newPassive()
    {
        $this->load->model('Admin_edit_model');

        $post= $this->input->post(NULL, TRUE);
        $this->Admin_edit_model->newPassive($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["status"], $post["motivation"]);
        redirect('/Admin/passives_create');
    }

    public function newPartner()
    {
        $this->load->model('Admin_edit_model');

        $post= $this->input->post(NULL, TRUE);
        $this->Admin_edit_model->newPartner($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["organization"], $post["motivation"]);
        redirect('/Admin/passives_create');
    }

    public function teams_create()
    {
        $this->load->model('Admin_edit_model');

        $post=$this->input->post(NULL, TRUE);
        $this->Admin_edit_model->teams_create($post['title']);
        redirect('/Admin/teams_admin_teams');
    }

    public function teams_delete()
    {
        $team = $this->uri->segment(3);
        $this->load->model('Admin_edit_model');
        $this->Admin_edit_model->teams_delete($team);

        redirect('/Admin/teams_admin_teams');
    }

    public function members_create()
    {
        $this->load->helper('url');
        $this->load->library('upload');
        $this->load->model('Admin_edit_model');

        $post=$this->input->post(NULL, TRUE);
        $photo_path = '/Users/Andrei/Sites/GitHub/EnactusMVC/assets/images/members/' . $post["first_name"] . "_" . $post["last_name"] . '_' . $post["team"];
        $this->Admin_edit_model->members_create($post["first_name"], $post["last_name"], $post["function"], $post["linkedin"], $post["mail"], $post["quote"], $post["team"], $photo_path);

        $config['upload_path'] = '/Users/Andrei/Sites/GitHub/EnactusMVC/assets/images/members/';
        $config['allowed_types'] = 'jpg|tif|png|gif';
        $config['file_name'] = $post["first_name"] . '_' . $post["last_name"] . "_" . $post["team"];
        $config['overwrite'] = TRUE;

        $this->upload->initialize($config);
        $this->upload->do_upload('photo');

        redirect('/Admin/teams_admin_members');
    }

    public function members_delete()
    {
        $team = $this->uri->segment(3);
        $this->load->model('Admin_edit_model');
        $this->Admin_edit_model->members_delete($team);

        redirect('/Admin/teams_admin_members');
    }


}
