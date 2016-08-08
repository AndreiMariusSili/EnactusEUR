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
            if(!password_verify($password, $auth_password))
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

    public function ventures_admin()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->view('/admin/ventures_admin');
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
            $this->load->model('Admin_model');

            $viewdata['projects']=$this->Admin_model->viewProjects();
			$this->load->view('/admin/projects_view',$viewdata);
		}
    }

    public function projects_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->projectsExport();
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
            $this->load->model('Admin_model');

            $viewdata['founders']=$this->Admin_model->viewFounders();
            $this->load->view('/admin/founders_view', $viewdata);
		}
    }

    public function founders_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->foundersExport();
        }
    }

    public function applications_view()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $viewdata['applications']=$this->Admin_model->viewApplications();
            $this->load->view('/admin/applications_view', $viewdata);
        }
        }
    }

    public function applications_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->applicationsExport();
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
            $this->load->model('Admin_model');

            $viewdata['cofounders']=$this->Admin_model->viewCofounders();
            $this->load->view('/admin/cofounders_view', $viewdata);
		}
    }

    public function cofounders_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->cofoundersExport();
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
            $this->load->model('Admin_model');

            $viewdata['passives']=$this->Admin_model->viewPassives();
            $this->load->view('/admin/passives_view', $viewdata);
		}
    }

    public function passives_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->passivesExport();
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
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $viewdata['partners']=$this->Admin_model->viewPartners();
            $this->load->view('/admin/partners_view', $viewdata);
        }
		}
    }

    public function partners_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->partnersExport();
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
            $viewdata['options']= $this->Admin_model->options_get();

            
            $this->load->view('/admin/cofounders_create', $viewdata);
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