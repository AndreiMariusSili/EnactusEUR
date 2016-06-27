<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$this->load->library('encrypt');
		$this->load->helper('security');
		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => "username",
				'label' => "Username",
				'rules' => "trim|required|xss_clean"
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'trim|required|xss_clean'
			)
		);
		$this->form_validation->set_rules($config);
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect("/Admin/");
		}
		else
		{
			$this->load->model("Admin_model");
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$auth = $this->Admin_model->login($username);
			$auth_password = $this->encrypt->decode($auth['password']);
			if($password <> $auth_password)
			{
				$this->session->set_flashdata('errors', "Username and password don't match.");
				redirect("/Admin/login_fail");
			}
			else
			{
				redirect('/Admin/login_success');
			}
		}
	}

	public function login_fail()
	{
		$this->load->view('login');
	}

	public function login_success()
	{
		$this->load->view('panel');
	}
}