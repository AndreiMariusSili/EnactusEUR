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
}