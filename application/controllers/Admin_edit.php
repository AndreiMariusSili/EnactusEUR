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
            ),
            array(
                'field' => 'type',
                'label' => 'status',
                'rules' => 'in_list[founder]'
            ),
            array(
                'field' => 'statusProject',
                'label' => 'status',
                'rules' => 'in_list[pending]'
            ),
            array(
                'field' => 'statusMember',
                'label' => 'status',
                'rules' => 'in_list[pending]'
            ),
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_message('in_list', 'Something went wrong. Please try again.');
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
            $this->Admin_edit_model->newFounder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["title"], $post["idea"], $post["type"], $post["statusProject"], $post['statusMember'], $post["motivation"]);

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mailtrap.io',
                'smtp_port' => 2525,
                'smtp_user' => 'ac339ee871b149',
                'smtp_pass' => '85f0e7b2f21fbc',
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => 'html'
            );

            $this->email->initialize($config);

            $this->email->from("robots@enactuseur.nl","Enactus Robots");
            $this->email->to("contact@enactuseur.nl");
            $this->email->subject("New founder registration - {$post['first_name']} {$post['last_name']}");
            $this->email->message(
                "<h2>Dear Enactus Administrator,</h2>" .
                "<p>You have just registered a new potential founder. You can review his details below.</p>" .
                "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                "<strong>Email:</strong> {$post['email']} " . "<br>" .
                "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                "<strong>Date of Birth:</strong> {$post['dob']}" . "<br>" . 
                "<strong>Study:</strong> {$post['study']}" . "<br>" . 
                "<strong>Idea Title:</strong> {$post['title']}" . "<br>" .
                "<strong>Idea Description:</strong> {$post['idea']}" ."<br>" .
                "<strong>Motivation:</strong> {$post['motivation']}</p>" . 
                "<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() . "</a></p>" . 
                "<p>Best," . "<br>" .
                "The Enactus Robot</p>"
            );
            $this->email->send();

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
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'in_list[cofounder]'
            ),
            array(
                'field' => 'type',
                'label' => 'status',
                'rules' => 'in_list[cofounder]'
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'in_list[pending]'
            ),
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_message('in_list', 'Something went wrong. Please try again.');
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
            $this->Admin_edit_model->newCofounder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["type"], $post['statusMember'], $post['statusApplication'], $post["motivation"]);

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mailtrap.io',
                'smtp_port' => 2525,
                'smtp_user' => 'ac339ee871b149',
                'smtp_pass' => '85f0e7b2f21fbc',
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => 'html'
            );

            $this->email->initialize($config);

            $this->email->from("robots@enactuseur.nl","Enactus Robots");
            $this->email->to("contact@enactuseur.nl");
            $this->email->subject("New cofounder registration - {$post['first_name']} {$post['last_name']}");
            $this->email->message(
                "<h2>Dear Enactus Administrator,</h2>" .
                "<p>You have just registered a new potential cofounder. You can review his details below.</p>" .
                "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                "<strong>Email:</strong> {$post['email']} " . "<br>" .
                "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                "<strong>Date of Birth:</strong> {$post['dob']}" . "<br>" . 
                "<strong>Study:</strong> {$post['study']}" . "<br>" . 
                "<strong>Project preference:</strong> {$post['project_preference']}" . "<br>" .
                "<strong>Motivation:</strong> {$post['motivation']}</p>" .
                "<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() . "</a></p>" .
                "<p>Best," . "<br>" .
                "The Enactus Robot</p>"
            );
            $this->email->send();

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
            ),
            array(
                'field' => 'type',
                'label' => 'status',
                'rules' => 'in_list[passive]'
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'in_list[accepted]'
            ),
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_message('in_list', 'Something went wrong. Please try again.');
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
        $this->Admin_edit_model->newPassive($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post['type'], $post["status"], $post["motivation"]);

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mailtrap.io',
                'smtp_port' => 2525,
                'smtp_user' => 'ac339ee871b149',
                'smtp_pass' => '85f0e7b2f21fbc',
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => 'html'
            );

            $this->email->initialize($config);

            $this->email->from("robots@enactuseur.nl","Enactus Robots");
            $this->email->to("contact@enactuseur.nl");
            $this->email->subject("New passive member registration - {$post['first_name']} {$post['last_name']}");
            $this->email->message(
                "<h2>Dear Enactus Administrator,</h2>" .
                "<p>You have just registered a new potential passive member. You can review his details below.</p>" .
                "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                "<strong>Email:</strong> {$post['email']} " . "<br>" .
                "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                "<strong>Date of Birth:</strong> {$post['dob']}" . "<br>" . 
                "<strong>Study:</strong> {$post['study']}" . "<br>" . 
                "<strong>Motivation:</strong> {$post['motivation']}</p>" .
                "<p>Best," . "<br>" .
                "The Enactus Robot</p>"
            );
            $this->email->send();

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
            ),
            array(
                'field' => 'status',
                'label' => 'status',
                'rules' => 'in_list[pending]'
            ),
        );
        $this->form_validation->set_message('required', "Please fill in your %s");
        $this->form_validation->set_message('in_list', 'Something went wrong. Please try again.');
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
            $this->Admin_edit_model->newPartner($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["organization"],$post["motivation"], $post['status']);

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mailtrap.io',
                'smtp_port' => 2525,
                'smtp_user' => 'ac339ee871b149',
                'smtp_pass' => '85f0e7b2f21fbc',
                'crlf' => "\r\n",
                'newline' => "\r\n",
                'mailtype' => 'html'
            );

            $this->email->initialize($config);

            $this->email->from("robots@enactuseur.nl","Enactus Robots");
            $this->email->to("contact@enactuseur.nl");
            $this->email->subject("New partner registration - {$post['first_name']} {$post['last_name']}");
            $this->email->message(
                "<h2>Dear Enactus Administrator,</h2>" .
                "<p>You have just registered a new potential partner. You can review his details below.</p>" .
                "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                "<strong>Email:</strong> {$post['email']} " . "<br>" .
                "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                "<strong>Organization:</strong> {$post['organization']}" . "<br>" . 
                "<strong>Motivation:</strong> {$post['motivation']}</p>" .
                "<p>Best," . "<br>" .
                "The Enactus Robot</p>"
            );
            $this->email->send();

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

    public function founders_update()
    {
        $this->load->model('Admin_edit_model');
        $post=$this->input->post(NULL, TRUE);
        $founder_id=$this->uri->segment(3);
        $this->Admin_edit_model->founders_update($founder_id, $post['status']);

        $this->session->set_flashdata('update', TRUE);
        redirect('/Admin/founders_view');
    }

    public function founders_delete()
    {
        $this->load->model('Admin_edit_model');
        $founder_id=$this->uri->segment(3);
        $this->Admin_edit_model->founders_delete($founder_id);

        $this->session->set_flashdata('delete', TRUE);
        redirect('Admin/founders_view');
    }

    public function applications_update()
    {
        $this->load->model('Admin_edit_model');
        $post=$this->input->post(NULL, TRUE);
        $founder_id=$this->uri->segment(3);
        $this->Admin_edit_model->applications_update($founder_id, $post['status']);

        $this->session->set_flashdata('update', TRUE);
        redirect('/Admin/applications_view');
    }

    public function applications_delete()
    {
        $this->load->model('Admin_edit_model');
        $founder_id=$this->uri->segment(3);
        $this->Admin_edit_model->applications_delete($founder_id);

        $this->session->set_flashdata('delete', TRUE);
        redirect('Admin/applications_view');
    }

    public function cofounders_update()
    {
        $this->load->model('Admin_edit_model');
        $post=$this->input->post(NULL, TRUE);
        $cofounder_id=$this->uri->segment(3);
        $this->Admin_edit_model->cofounders_update($cofounder_id, $post['status']);

        $this->session->set_flashdata('update', TRUE);
        redirect('/Admin/cofounders_view');
    }

    public function cofounders_delete()
    {
        $this->load->model('Admin_edit_model');
        $cofounder_id=$this->uri->segment(3);
        $this->Admin_edit_model->cofounders_delete($cofounder_id);

        $this->session->set_flashdata('delete', TRUE);
        redirect('Admin/cofounders_view');
    }

    public function passives_update()
    {
        $this->load->model('Admin_edit_model');
        $post=$this->input->post(NULL, TRUE);
        $passive_id=$this->uri->segment(3);
        $this->Admin_edit_model->passives_update($passive_id, $post['status']);

        $this->session->set_flashdata('update', TRUE);
        redirect('/Admin/passives_view');
    }

    public function passives_delete()
    {
        $this->load->model('Admin_edit_model');
        $passive_id=$this->uri->segment(3);
        $this->Admin_edit_model->passives_delete($passive_id);

        $this->session->set_flashdata('delete', TRUE);
        redirect('Admin/passives_view');
    }

    public function partners_update()
    {
        $this->load->model('Admin_edit_model');
        $post=$this->input->post(NULL, TRUE);
        $partner_id=$this->uri->segment(3);
        $this->Admin_edit_model->partners_update($partner_id, $post['status']);

        $this->session->set_flashdata('update', TRUE);
        redirect('/Admin/partners_view');
    }

    public function partners_delete()
    {
        $this->load->model('Admin_edit_model');
        $partner_id=$this->uri->segment(3);
        $this->Admin_edit_model->partners_delete($partner_id);

        $this->session->set_flashdata('delete', TRUE);
        redirect('Admin/partners_view');
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
