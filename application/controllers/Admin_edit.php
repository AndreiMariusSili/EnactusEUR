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

        $config['upload_path'] = site_url('assets/videos/');
        $config['allowed_types'] = 'mp4|webm';
        $config['file_name'] = 'background-video';
        $config['overwrite'] = TRUE;

        $this->load->library('upload');

        $this->upload->initialize($config);
        $this->upload->do_upload('video');

        $config['upload_path'] = site_url('assets/videos/');
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
        $this->load->library('form_validation');
        $this->load->helper('security');

        $config = array(
            array(
                'field' => "first_name",
                'label' => "first name",
                'rules' => "trim|required|xss_clean"
            ),
            array(
                'field' => 'last_name',
                'label' => 'last name',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email|xss_clean'
            ),
            array(
                'field' => 'phone_number',
                'label' => 'phone number',
                'rules' => 'trim|required|numeric|xss_clean'
            ),
            array(
                'field' => 'dob',
                'label' => 'date of birth',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'study',
                'label' => 'study',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'title',
                'label' => 'title',
                'rules' => 'callback_title_check|xss_clean'
            ),
            array(
                'field' => 'idea',
                'label' => 'idea',
                'rules' => 'callback_idea_check|xss_clean'
            ),
            array(
                'field' => 'motivation',
                'label' => 'motivation',
                'rules' => 'callback_motivation_check|xss_clean'
            )
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("/Admin/founders_create");
        }
        else
        {
            $this->load->model('Admin_edit_model');

            $post = $this->input->post(NULL, TRUE);
            $this->Admin_edit_model->newFounder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["title"], $post["idea"], $post["statusMember"], $post["statusProject"], $post["motivation"]);

            $this->session->set_flashdata('success', TRUE);
            redirect('/Admin/founders_create');
        }
    }

    public function newCofounder()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');

        $config = array(
            array(
                'field' => "first_name",
                'label' => "first name",
                'rules' => "trim|required|xss_clean"
            ),
            array(
                'field' => 'last_name',
                'label' => 'last name',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email|xss_clean'
            ),
            array(
                'field' => 'phone_number',
                'label' => 'phone number',
                'rules' => 'trim|required|numeric|xss_clean'
            ),
            array(
                'field' => 'dob',
                'label' => 'date of birth',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'study',
                'label' => 'study',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'project_preference',
                'label' => 'preference',
                'rules' => 'callback_preference_check|xss_clean'
            ),
            array(
                'field' => 'motivation',
                'label' => 'motivation',
                'rules' => 'callback_motivation_check|xss_clean'
            )
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("/Admin/cofounders_create");
        }
        else
        {
            $this->load->model('Admin_edit_model');

            $post= $this->input->post(NULL, TRUE);
            $this->Admin_edit_model->newCofounder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["status"], $post["motivation"]);

            $this->session->set_flashdata('success', TRUE);
            redirect('/Admin/cofounders_create');
        }
    }

    public function newPassive()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');

        $config = array(
            array(
                'field' => "first_name",
                'label' => "first name",
                'rules' => "trim|required|xss_clean"
            ),
            array(
                'field' => 'last_name',
                'label' => 'last name',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email|xss_clean'
            ),
            array(
                'field' => 'phone_number',
                'label' => 'phone number',
                'rules' => 'trim|required|numeric|xss_clean'
            ),
            array(
                'field' => 'study',
                'label' => 'study',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'motivation',
                'label' => 'motivation',
                'rules' => 'callback_motivation_check|xss_clean'
            )
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("/Admin/passives_create");
        }
        else
        {
        $this->load->model('Admin_edit_model');

        $post= $this->input->post(NULL, TRUE);
        $this->Admin_edit_model->newPassive($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["status"], $post["motivation"]);

        $this->session->set_flashdata('success', TRUE);
        redirect('/Admin/passives_create');
        }

    }

    public function newPartner()
    {
        $this->load->library('form_validation');
        $this->load->helper('security');

        $config = array(
            array(
                'field' => "first_name",
                'label' => "first name",
                'rules' => "trim|required|xss_clean"
            ),
            array(
                'field' => 'last_name',
                'label' => 'last name',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'email',
                'label' => 'email',
                'rules' => 'trim|required|valid_email|xss_clean'
            ),
            array(
                'field' => 'phone_number',
                'label' => 'phone number',
                'rules' => 'trim|required|numeric|xss_clean'
            ),
            array(
                'field' => 'organization',
                'label' => 'organization',
                'rules' => 'trim|required|xss_clean'
            ),
            array(
                'field' => 'motivation',
                'label' => 'motivation',
                'rules' => 'callback_interest_check|xss_clean'
            )
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("/Admin/partners_create");
        }
        else
        {
            $this->load->model('Admin_edit_model');

            $post= $this->input->post(NULL, TRUE);
            $this->Admin_edit_model->newPartner($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["organization"], $post["motivation"]);

            $this->session->set_flashdata('success', TRUE);
            redirect('/Admin/partners_create');
        }
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
        $photo_path="/assets/images/members/{$post['first_name']}_{$post['last_name']}_{$post['team']}.jpg";
        $this->Admin_edit_model->members_create($post["first_name"], $post["last_name"], $post["function"], $post["linkedin"], $post["mail"], $post["quote"], $post["team"], $photo_path);

        $config['upload_path'] = "./assets/images/members";
        $config['allowed_types'] = 'jpg';
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

    public function projects_update()
    {
        $this->load->model('Admin_edit_model');
        $post=$this->input->post(NULL, TRUE);
        $project_id=$this->uri->segment(3);
        $this->Admin_edit_model->projects_update($project_id, $post['status']);

        $this->session->set_flashdata('update', TRUE);
        redirect('/Admin/projects_view');
    }

    public function projects_delete()
    {
        $this->load->model('Admin_edit_model');
        $project_id=$this->uri->segment(3);
        $this->Admin_edit_model->projects_delete($project_id);

        $this->session->set_flashdata('delete', TRUE);
        redirect('Admin/projects_view');
    }

    //custom validation functions
    public function title_check($title)
    {
        if(strlen($title) == 0)
        {
            $this->form_validation->set_message("title_check", "Your idea needs a title.");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function idea_check($idea)
    {
        if(strlen($idea) == 0)
        {
            $this->form_validation->set_message("idea_check", "Please let us know what your idea is.");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function preference_check($preference)
    {
        if(strlen($preference) == 0)
        {
            $this->form_validation->set_message("preference_check", "Please let us know which venture you want to join.");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    public function motivation_check($motivation)
    {
        if(strlen($motivation) == 0)
        {
            $this->form_validation->set_message("motivation_check", "Please let us know what your motivation is.");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

        public function interest_check($interest)
    {
        if(strlen($interest) == 0)
        {
            $this->form_validation->set_message("interest_check", "Please let us know what your interst in Enactus is.");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
