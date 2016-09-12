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

            $this->Admin_model->exportFounders();
        }
    }

    public function founders_cv()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            $founder_id = $this->uri->segment(3);
            $this->Admin_model->cvFounders($founder_id);
        }
    }

    public function teamleader_applications_view()
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

            $viewdata['applications']=$this->Admin_model->viewTeamleaderApplications();
            $this->load->view('/admin/teamleader_applications_view', $viewdata);
        }
        }
    }

    public function teamleader_applications_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->exportTeamleaderApplications();
        }
    }

    public function teammember_applications_view()
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

            $viewdata['applications']=$this->Admin_model->viewTeammemberApplications();
            $this->load->view('/admin/teammember_applications_view', $viewdata);
        }
        }
    }

    public function teammember_applications_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->exportTeammemberApplications();
        }
    }

    public function teamleaders_view()
    {
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
            $this->load->model('Admin_model');

            $viewdata['teamleaders']=$this->Admin_model->viewTeamleaders();
            $this->load->view('/admin/teamleaders_view', $viewdata);
		}
    }

    public function teamleaders_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->exportTeamleaders();
        }
    }

    public function teamleaders_cv()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            $teamleader_id = $this->uri->segment(3);
            $this->Admin_model->cvTeamleaders($teamleader_id);
        }
    }

    public function teammembers_view()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $viewdata['teammembers']=$this->Admin_model->viewTeammembers();
            $this->load->view('/admin/teammembers_view', $viewdata);
        }
    }

    public function teammembers_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->exportTeammembers();
        }
    }

    public function teammembers_cv()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            $teammember_id = $this->uri->segment(3);
            $this->Admin_model->cvTeammembers($teammember_id);
        }
    }

    public function ambassadors_view()
    {
		if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
		{
			$this->session->set_flashdata('errors', "Nice try. Please login first.");
			redirect('/Admin');
		}
		else
		{
            $this->load->model('Admin_model');

            $viewdata['ambassadors']=$this->Admin_model->viewambassadors();
            $this->load->view('/admin/ambassadors_view', $viewdata);
		}
    }

    public function ambassadors_export()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');

            $this->Admin_model->exportAmbassadors();
        }
    }

    public function ambassadors_cv()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            $ambassador_id = $this->uri->segment(3);
            $this->Admin_model->cvAmbassadors($ambassador_id);
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

    public function teamleaders_create()
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

            
            $this->load->view('/admin/teamleaders_create', $viewdata);
        }   
    }

    public function teammembers_create()
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

            
            $this->load->view('/admin/teammembers_create', $viewdata);
        }   
    }

    public function ambassadors_create()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_model');
            
            $this->load->view('/admin/ambassadors_create');
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