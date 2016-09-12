<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_edit extends CI_Controller 
{
	public function videoEdit()
	{
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
    		$this->load->model('Admin_edit_model');

    		$post = $this->input->post(NULL, TRUE);
    		$this->Admin_edit_model->videoEdit($post);
    		redirect('/Admin/landing_admin');
        }
	}

    public function videoPosterUpload()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->helper('url');

            $config['upload_path'] = './assets/videos/';
            $config['allowed_types'] = 'mp4|webm';
            $config['file_name'] = 'background-video';
            $config['overwrite'] = TRUE;

            $this->load->library('upload');

            $this->upload->initialize($config);
            $this->upload->do_upload('video');

            $config['upload_path'] = './assets/videos/';
            $config['allowed_types'] = 'jpg';
            $config['file_name'] = 'background-video-poster';
            $config['overwrite'] = TRUE;

            $this->upload->initialize($config);
            $this->upload->do_upload('poster');

            redirect('/Admin/landing_admin');
        }
    }

    public function aboutusEdit()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');

            $post = $this->input->post(NULL, TRUE);
            $this->Admin_edit_model->aboutusEdit($post);
            redirect('/Admin/landing_admin');
        }
    }

    public function accompEdit()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');

            $post = $this->input->post(NULL, TRUE);
            $this->Admin_edit_model->accompEdit($post);
            redirect('/Admin/landing_admin');
        }
    }

    public function newFounder()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->helper('form');

            $this->load->library('email');
            $this->load->library('upload');
            $this->load->helper('url');

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
                    'label' => 'type',
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
                $this->load->model("Admin_edit_model");
                $post = $this->input->post(NULL, TRUE);

                $config = [];
                $config['upload_path'] = './uploads/CV/founder/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_{$post['title']}_founder";
                $config['overwrite'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('founderCV')){
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect("/Admin/founders_create");
                }
                else{
                    $filePath = array('upload_data' => $this->upload->data('full_path'));
                }

                $this->Admin_edit_model->founder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["title"], $post["idea"], $post["type"], $post["statusProject"], $post['statusMember'], $filePath, $post["motivation"]);

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_crypto' => 'ssl',
                    'smtp_port' => 465,
                    'smtp_user' => 'robots@enactus-eur.nl',
                    'smtp_pass' => '100%Enactus387!',
                    'newline' => "\r\n",
                    'mailtype' => 'html',
                    'charset'   => 'iso-8859-1'
                );

                $this->email->initialize($config);

                $this->email->from("robots@enactus-eur.nl","The Enactus Robot");
                $this->email->to("recruitment@enactus-eur.nl");
                $this->email->subject("New founder application - {$post['first_name']} {$post['last_name']}");
                $this->email->message(
                    "<h2>Dear Enactus Administrator,</h2>" .
                    "<p>A potential founder has just applied on your website. You can review his details below.</p>" .
                    "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                    "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                    "<strong>Email:</strong> {$post['email']} " . "<br>" .
                    "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                    "<strong>Date of Birth:</strong> {$post['dob']}" . "<br>" . 
                    "<strong>Study:</strong> {$post['study']}" . "<br>" . 
                    "<strong>Idea Title:</strong> {$post['title']}" . "<br>" .
                    "<strong>Idea Description:</strong> {$post['idea']}" ."<br>" .
                    "<strong>Motivation:</strong> {$post['motivation']}</p>" . 
                    "<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() ."admin" . "</a></p>" . 
                    "<p>Best," . "<br>" .
                    "The Enactus Robot</p>" . "<br>"
                );
                $this->email->attach("./uploads/CV/founder/{$post['first_name']}_{$post['last_name']}_{$post['title']}_founder.pdf");
                $this->email->send();
                $this->email->clear(TRUE);

                $this->session->set_flashdata('success', TRUE);
                redirect('/Admin/founders_create');
            }
        }
    }

    public function newTeamleader()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->helper('form');

            $this->load->library('email');
            $this->load->library('upload');
            $this->load->helper('url');

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
                    'field' => 'type',
                    'label' => 'type',
                    'rules' => 'in_list[team leader]'
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
                redirect("/Admin/teamleaders_create");
            }
            else
            {
                $this->load->model("Admin_edit_model");
                $post = $this->input->post(NULL, TRUE);

                $config = [];
                $config['upload_path'] = './uploads/CV/teamleader/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_{$post['project_preference']}_teamLeader";
                $config['overwrite'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('teamleaderCV')){
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect("/Admin/teamleaders_create");
                }
                else{
                    $filePath = array('upload_data' => $this->upload->data('full_path'));
                }

                $this->Admin_edit_model->teamleader($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["type"], $post['statusMember'], $filePath, $post['statusApplication'], $post["motivation"]);

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_crypto' => 'ssl',
                    'smtp_port' => 465,
                    'smtp_user' => 'robots@enactus-eur.nl',
                    'smtp_pass' => '100%Enactus387!',
                    'newline' => "\r\n",
                    'mailtype' => 'html',
                    'charset'   => 'iso-8859-1'
                );

                $this->email->initialize($config);

                $this->email->from("robots@enactuseur.nl","The Enactus Robot");
                $this->email->to("recruitment@enactus-eur.nl");
                $this->email->subject("New team leader application - {$post['first_name']} {$post['last_name']}");
                $this->email->message(
                    "<h2>Dear Enactus Administrator,</h2>" .
                    "<p>A potential team leader has just applied on your website. You can review his details below.</p>" .
                    "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                    "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                    "<strong>Email:</strong> {$post['email']} " . "<br>" .
                    "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                    "<strong>Date of Birth:</strong> {$post['dob']}" . "<br>" . 
                    "<strong>Study:</strong> {$post['study']}" . "<br>" . 
                    "<strong>Project preference:</strong> {$post['project_preference']}" . "<br>" .
                    "<strong>Motivation:</strong> {$post['motivation']}</p>" .
                    "<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() . "admin" . "</a></p>" .
                    "<p>Best," . "<br>" .
                    "The Enactus Robot</p>"
                );
                $this->email->attach("./uploads/CV/teamleader/{$post['first_name']}_{$post['last_name']}_{$post['project_preference']}_teamLeader.pdf");
                $this->email->send();
                $this->email->clear(TRUE);

                $this->session->set_flashdata('success', TRUE);
                redirect('/Admin/teamleaders_create');
            }
        }
    }

    public function newTeammember()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->helper('form');

            $this->load->library('email');
            $this->load->library('upload');
            $this->load->helper('url');

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
                    'field' => 'type',
                    'label' => 'type',
                    'rules' => 'in_list[team member]'
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
                redirect('/Admin/teammembers_create');
            }
            else
            {
                $this->load->model("Admin_edit_model");
                $post = $this->input->post(NULL, TRUE);

                $config = [];
                $config['upload_path'] = './uploads/CV/teammember/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_{$post['project_preference']}_teamMember";
                $config['overwrite'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('teammemberCV')){
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect('/Admin/teammembers_create');
                }
                else{
                    $filePath = array('upload_data' => $this->upload->data('full_path'));
                }

                $this->Admin_edit_model->teammember($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["type"], $post['statusMember'], $filePath, $post['statusApplication'], $post["motivation"]);

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_crypto' => 'ssl',
                    'smtp_port' => 465,
                    'smtp_user' => 'robots@enactus-eur.nl',
                    'smtp_pass' => '100%Enactus387!',
                    'newline' => "\r\n",
                    'mailtype' => 'html',
                    'charset'   => 'iso-8859-1'
                );

                $this->email->initialize($config);

                $this->email->from("robots@enactuseur.nl","The Enactus Robot");
                $this->email->to("recruitment@enactus-eur.nl");
                $this->email->subject("New team member application - {$post['first_name']} {$post['last_name']}");
                $this->email->message(
                    "<h2>Dear Enactus Administrator,</h2>" .
                    "<p>A potential team member has just applied on your website. You can review his details below.</p>" .
                    "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                    "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                    "<strong>Email:</strong> {$post['email']} " . "<br>" .
                    "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                    "<strong>Date of Birth:</strong> {$post['dob']}" . "<br>" . 
                    "<strong>Study:</strong> {$post['study']}" . "<br>" . 
                    "<strong>Project preference:</strong> {$post['project_preference']}" . "<br>" .
                    "<strong>Motivation:</strong> {$post['motivation']}</p>" .
                    "<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() . "admin" . "</a></p>" .
                    "<p>Best," . "<br>" .
                    "The Enactus Robot</p>"
                );
                $this->email->attach("./uploads/CV/teammember/{$post['first_name']}_{$post['last_name']}_{$post['project_preference']}_teamMember.pdf");
                $this->email->send();
                $this->email->clear(TRUE);

                $this->session->set_flashdata('success', TRUE);
                redirect('/Admin/teammembers_create');
            }
        }
    }

    public function newAmbassador()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->helper('form');

            $this->load->library('email');
            $this->load->library('upload');
            $this->load->helper('url');

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
                    'rules' => 'in_list[ambassador]'
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
                redirect('/Admin/ambassadors_create');
            }
            else
            {
                $this->load->model("Admin_edit_model");
                $post = $this->input->post(NULL, TRUE);

                $config = [];
                $config['upload_path'] = './uploads/CV/ambassador/';
                $config['allowed_types'] = 'pdf';
                $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_ambassador";
                $config['overwrite'] = TRUE;
                
                $this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('ambassadorCV')){
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect('/Admin/ambassadors_create');
                }
                else{
                    $filePath = array('upload_data' => $this->upload->data('full_path'));
                }

                $this->Admin_edit_model->ambassador($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post['type'], $post["status"], $filePath, $post["motivation"]);

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_crypto' => 'ssl',
                    'smtp_port' => 465,
                    'smtp_user' => 'robots@enactus-eur.nl',
                    'smtp_pass' => '100%Enactus387!',
                    'newline' => "\r\n",
                    'mailtype' => 'html',
                    'charset'   => 'iso-8859-1'
                );

                $this->email->initialize($config);

                $this->email->from("robots@enactuseur.nl","The Enactus Robot");
                $this->email->to("recruitment@enactus-eur.nl");
                $this->email->subject("New ambassador application - {$post['first_name']}_{$post['last_name']}");
                $this->email->message(
                    "<h2>Dear Enactus Administrator,</h2>" .
                    "<p>A new potential ambassador has just applied on your website. You can review his details below.</p>" .
                    "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                    "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                    "<strong>Email:</strong> {$post['email']} " . "<br>" .
                    "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                    "<strong>Date of Birth:</strong> {$post['dob']}" . "<br>" . 
                    "<strong>Study:</strong> {$post['study']}" . "<br>" . 
                    "<strong>Motivation:</strong> {$post['motivation']}</p>" .
                    "<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() . "admin" . "</a></p>" .
                    "<p>Best," . "<br>" .
                    "The Enactus Robot</p>"
                );
                $this->email->attach("./uploads/CV/ambassador/{$post['first_name']}_{$post['last_name']}_ambassador.pdf");
                $this->email->send();
                $this->email->clear(TRUE);

            $this->session->set_flashdata('success', TRUE);
            redirect('/Admin/ambassadors_create');
            }
        }
    }

    public function newPartner()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->helper('form');

            $this->load->library('email');
            $this->load->helper('url');

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
                )
            );
            $this->form_validation->set_message('required', "Please fill in your %s");
            $this->form_validation->set_message('in_list', 'Something went wrong. Please try again.');
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('errors', validation_errors());
                redirect('/Admin/partners_create');
            }
            else
            {
                $this->load->model("Form_model");
                $post = $this->input->post(NULL, TRUE);
                $this->Form_model->partner($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["organization"],$post["motivation"], $post['status']);

                $config = array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'smtp.gmail.com',
                    'smtp_crypto' => 'ssl',
                    'smtp_port' => 465,
                    'smtp_user' => 'robots@enactus-eur.nl',
                    'smtp_pass' => '100%Enactus387!',
                    'newline' => "\r\n",
                    'mailtype' => 'html',
                    'charset'   => 'iso-8859-1'
                );

                $this->email->initialize($config);

                $this->email->from("robots@enactuseur.nl","The Enactus Robot");
                $this->email->to("recruitment@enactus-eur.nl");
                $this->email->subject("New partner application - {$post['first_name']} {$post['last_name']}");
                $this->email->message(
                    "<h2>Dear Enactus Administrator,</h2>" .
                    "<p>A potential partner has just applied on your website. You can review his details below.</p>" .
                    "<p><strong>First Name:</strong> {$post['first_name']} " . "<br>" .
                    "<strong>Last Name:</strong> {$post['last_name']} " . "<br>" .
                    "<strong>Email:</strong> {$post['email']} " . "<br>" .
                    "<strong>Telephone:</strong> {$post['phone_number']}" . "<br>" .
                    "<strong>Organization:</strong> {$post['organization']}" . "<br>" . 
                    "<strong>Motivation:</strong> {$post['motivation']}</p>" .
                    "<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() . "admin" . "</a></p>" .
                    "<p>Best," . "<br>" .
                    "The Enactus Robot</p>"
                );
                $this->email->send();
                $this->email->clear(TRUE);

                $this->session->set_flashdata('success', TRUE);
                redirect('/Admin/partners_create');
            }
        }
    }

    public function teams_create()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->helper('form');

            $config = array(
                array(
                    'field' => "title",
                    'label' => "title",
                    'rules' => "trim|required|is_unique[teams_admin_teams.title]|xss_clean"
                )
            );
            $this->form_validation->set_message('required', "Please fill in a team name.");
            $this->form_validation->set_message('is_unique', 'The team name must be unique.');
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('errors', validation_errors());
                redirect('/Admin/teams_admin_teams');
            }
            else
            {
            $this->load->model('Admin_edit_model');

            $post=$this->input->post(NULL, TRUE);
            $this->Admin_edit_model->teams_create($post['title']);

             $this->session->set_flashdata('success', TRUE);
            redirect('/Admin/teams_admin_teams');
            }
        }
    }

    public function teams_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $team = $this->uri->segment(3);
            $this->load->model('Admin_edit_model');
            $this->Admin_edit_model->teams_delete($team);

            redirect('/Admin/teams_admin_teams');
        }
    }

    public function members_create()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->library('form_validation');
            $this->load->helper('security');
            $this->load->helper('form');

            $config = array(
                array(
                    'field' => "team",
                    'label' => "team",
                    'rules' => "trim|required|xss_clean"
                ),
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
                    'field' => 'function',
                    'label' => 'function',
                    'rules' => 'trim|required|xss_clean'
                ),
                array(
                    'field' => 'linkedin',
                    'label' => 'linkedin url',
                    'rules' => 'callback_validate_url|trim|required|xss_clean'
                ),
                array(
                    'field' => 'email',
                    'label' => 'email',
                    'rules' => 'trim|required|valid_email|xss_clean'
                ),
                array(
                    'field' => 'quote',
                    'label' => 'quote',
                    'rules' => 'trim|required|xss_clean'
                )
            );
            $this->form_validation->set_message('required', "Please fill in member's %s");
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE)
            {
                $this->session->set_flashdata('errors', validation_errors());
                redirect("/Admin/teams_admin_members");
            }
            else
            {
                $this->load->helper('url');
                $this->load->library('upload');
                $this->load->model('Admin_edit_model');

                $post=$this->input->post(NULL, TRUE);

                $config['upload_path'] = "./uploads/teamsAdmin/members/";
                $config['allowed_types'] = 'jpg';
                $config['max_width'] = 100;
                $config['max_height'] = 100;
                $config['file_name'] = $post["first_name"] . '_' . $post["last_name"] . "_" . $post["team"];
                $config['overwrite'] = TRUE;

                $this->upload->initialize($config);
            
                if ( ! $this->upload->do_upload('photo')){
                    $this->session->set_flashdata('errors', $this->upload->display_errors());
                    redirect("/Admin/teams_admin_members");
                }
                else{
                    $relative_path = "/uploads/teamsAdmin/members/" . $this->upload->data('file_name');
                    $absolute_path = $this->upload->data('full_path');
                }

                $this->Admin_edit_model->members_create($post["first_name"], $post["last_name"], $post["function"], $post["linkedin"], $post["email"], $post["quote"], $post["team"], $relative_path, $absolute_path);

                $this->session->set_flashdata('success', TRUE);
                redirect('/Admin/teams_admin_members');
            }
        }
    }

    public function members_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $team = $this->uri->segment(3);
            $this->load->model('Admin_edit_model');
            $this->Admin_edit_model->members_delete($team);

            redirect('/Admin/teams_admin_members');
        }
    }

    public function projects_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $project_id=$this->uri->segment(3);
            $this->Admin_edit_model->projects_update($project_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/projects_view');
        }

    }

    public function projects_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $project_id=$this->uri->segment(3);
            $this->Admin_edit_model->projects_delete($project_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/projects_view');
        }
    }

    public function founders_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $founder_id=$this->uri->segment(3);
            $this->Admin_edit_model->founders_update($founder_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/founders_view');
        }
    }

    public function founders_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $founder_id=$this->uri->segment(3);
            $this->Admin_edit_model->founders_delete($founder_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/founders_view');
        }
    }

    public function teamleader_applications_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $founder_id=$this->uri->segment(3);
            $this->Admin_edit_model->teamleader_applications_update($founder_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/teamleader_applications_view');
        }
    }

    public function teamleader_applications_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $founder_id=$this->uri->segment(3);
            $this->Admin_edit_model->teamleader_applications_delete($founder_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/teamleader_applications_view');
        }
    }

    public function teammember_applications_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $founder_id=$this->uri->segment(3);
            $this->Admin_edit_model->teammember_applications_update($founder_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/teammember_applications_view');
        }
    }

    public function teammember_applications_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $founder_id=$this->uri->segment(3);
            $this->Admin_edit_model->teammember_applications_delete($founder_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/teammember_applications_view');
        }
    }

    public function teamleaders_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $teamleader_id=$this->uri->segment(3);
            $this->Admin_edit_model->teamleaders_update($teamleader_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/teamleaders_view');
        }
    }

    public function teamleaders_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $teamleader_id=$this->uri->segment(3);
            $this->Admin_edit_model->teamleaders_delete($teamleader_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/teamleaders_view');
        }
    }

    public function teammembers_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $teammember_id=$this->uri->segment(3);
            $this->Admin_edit_model->teammembers_update($teammember_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/teammembers_view');
        }
    }

    public function teammembers_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $teammember_id=$this->uri->segment(3);
            $this->Admin_edit_model->teammembers_delete($teammember_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/teammembers_view');
        }
    }

    public function ambassadors_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $ambassador_id=$this->uri->segment(3);
            $this->Admin_edit_model->ambassadors_update($ambassador_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/ambassadors_view');
        }
    }

    public function ambassadors_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $ambassador_id=$this->uri->segment(3);
            $this->Admin_edit_model->ambassadors_delete($ambassador_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/ambassadors_view');
        }
    }

    public function partners_update()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $post=$this->input->post(NULL, TRUE);
            $partner_id=$this->uri->segment(3);
            $this->Admin_edit_model->partners_update($partner_id, $post['status']);

            $this->session->set_flashdata('update', TRUE);
            redirect('/Admin/partners_view');
        }
    }

    public function partners_delete()
    {
        if (null == $this->session->userdata('username') && null == $this->session->userdata('password'))
        {
            $this->session->set_flashdata('errors', "Nice try. Please login first.");
            redirect('/Admin');
        }
        else
        {
            $this->load->model('Admin_edit_model');
            $partner_id=$this->uri->segment(3);
            $this->Admin_edit_model->partners_delete($partner_id);

            $this->session->set_flashdata('delete', TRUE);
            redirect('Admin/partners_view');
        }
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

    public function validate_url($url)
    {
        if(filter_var($url, FILTER_VALIDATE_URL) === FALSE)
        {
            $this->form_validation->set_message("validate_url", "The email field must contain a valid url. (e.g. http://linkedin.com/profile)");
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

}
