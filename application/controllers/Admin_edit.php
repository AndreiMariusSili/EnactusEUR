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
        redirect('/Admin/founder_admin');
    }

    public function viewProjects()
    {
        $this->load->model('Admin_edit_model');
        $projects = $this->Admin_edit_model->viewProjects();
        redirect('/Admin/projects_admin');
    }
}