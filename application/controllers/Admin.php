<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function index()
	{
		$this->load->view('/admin/login');
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
			redirect("/Admin");
		}
		else
		{
			$this->load->model("Admin_model");
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$auth = $this->Admin_model->login($username);
			$auth_password = $auth['password'];
			if($password <> $auth_password)
			{
				$this->session->set_flashdata('errors', "Username and password don't match.");
				redirect("/Admin");
			}
			else
			{
				$data = array(
						'username' => $username,
						'password' => $password,
					);
				$this->session->set_userdata($data);
				redirect('/Admin/landing_admin');
			}
		}
	}

	public function landing_admin()
	{
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
			$this->load->model('Admin_model');

			$viewdata = $this->Admin_model->landing_admin();			
			$this->load->view('/admin/landing_admin', $viewdata);
		}
	}

    public function teams_admin_teams()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {       
            $this->load->model('Admin_edit_model');

            $data['teams']=$this->Admin_edit_model->teams_get();
            $this->load->view('/admin/teams_admin_teams', $data);
        }
    }

    public function teams_admin_members()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $data['teams']=$this->Admin_edit_model->teams_get();
            $data['members']=$this->Admin_edit_model->members_get();
            $this->load->view('/admin/teams_admin_members', $data);
        }
    }

	public function dashboard()
	{
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
			$this->load->view('/admin/dashboard');
		}	
	}

    public function projects_view()
    {
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
			$this->load->view('/admin/projects_view');
		}
    }

    public function founders_view()
    {
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
			$this->load->view('/admin/founders_view');
		}
    }

    public function cofounders_view()
    {
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
			$this->load->view('/admin/cofounders_view');
		}
    }

    public function passives_view()
    {
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
			$this->load->view('/admin/passives_view');
		}
    }

    public function partners_view()
    {
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
			$this->load->view('/admin/partners_view');
		}
    }

    public function founders_create()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            
            $this->load->view('/admin/founders_create');
        }   
    }

    public function cofounders_create()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            
            $this->load->view('/admin/cofounders_create');
        }   
    }

    public function passives_create()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            
            $this->load->view('/admin/passives_create');
        }   
    }

    public function partners_create()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            
            $this->load->view('/admin/partners_create');
        }   
    }
}

?>