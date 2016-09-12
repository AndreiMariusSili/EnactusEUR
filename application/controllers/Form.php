<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller 
{
	//validate and register new founder
	public function founder()
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
			redirect("/#contact-us");
		}
		else
		{
			$this->load->model("Form_model");
			$post = $this->input->post(NULL, TRUE);

			$config = [];
			$config['upload_path'] = './uploads/CV/founder/';
	        $config['allowed_types'] = 'pdf';
	        $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_{$post['title']}_founder";
	        $config['overwrite'] = TRUE;
	        
	        $this->upload->initialize($config);
	        
	        if ( ! $this->upload->do_upload('founderCV')){
	        	$this->session->set_flashdata('errors', $this->upload->display_errors());
	        	redirect("/#contact-us");
	        }
	        else{
	        	$filePath = array('upload_data' => $this->upload->data('full_path'));
	        }

			$this->Form_model->founder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["title"], $post["idea"], $post["type"], $post["statusProject"], $post['statusMember'], $filePath, $post["motivation"]);

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

			$this->email->from("robots@enactus-eur.nl","The Enactus Robot");
			$this->email->to($post["email"]);
			$this->email->subject("A warm welcome from EnactusEUR!");
			$this->email->message(
				"<h2 style='color: #FFC222;'>Hey, {$post["first_name"]}!</h2>" .
				"<p> Thank you for your interest in EnactusEUR. Together we challenge the status-quo of business to make Rotterdam and our planet a better, fairer, and more hopeful place to live in.</p>" .
				"<p>You will receive more information on recruitment activities and entrepreneurial events in the comming week!</p>" . 
				"<h4 style='color: #FFC222;'>Stay in touch:</h2>" . 
				"<a href='http://facebook.com/EUREnactus'>http://facebook.com/EUREnactus</a>" . "<br>" .
				"<a href='mailto:info@enactus-eur.nl'>info@enactus-eur.nl</a>" . "<br>" .
				"<a href='http://instagram.com/enactus_eur'>http://instagram.com/enactus_eur</a>" . "<br>" .
				"<br>" .
				"<p>Best," . "<br>" . 
				"The EnactusEUR Family </p>" . "<br>" .
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>" .
				"<p>This is an automatically generated email. Please do no reply." . "<br>"
			);
			$this->email->send();
			$this->email->clear(TRUE);

			redirect ("/Main/success");
		}
	}

	//validate and register new cofounder
	public function teamleader()
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
			redirect("/#contact-us");
		}
		else
		{
			$this->load->model("Form_model");
			$post = $this->input->post(NULL, TRUE);

			$config = [];
			$config['upload_path'] = './uploads/CV/teamleader/';
	        $config['allowed_types'] = 'pdf';
	        $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_{$post['project_preference']}_teamLeader";
	        $config['overwrite'] = TRUE;
	        
	        $this->upload->initialize($config);
	        
	        if ( ! $this->upload->do_upload('teamleaderCV')){
	        	$this->session->set_flashdata('errors', $this->upload->display_errors());
	        	redirect("/#contact-us");
	        }
	        else{
	        	$filePath = array('upload_data' => $this->upload->data('full_path'));
	        }

			$this->Form_model->teamleader($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["type"], $post['statusMember'], $filePath, $post['statusApplication'], $post["motivation"]);

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

			$this->email->from("robots@enactus-eur.nl","The Enactus Robot");
			$this->email->to($post["email"]);
			$this->email->subject("A warm welcome from EnactusEUR!");
			$this->email->message(
				"<h2 style='color: #FFC222;'>Hey, {$post["first_name"]}!</h2>" .
				"<p> Thank you for your interest in EnactusEUR. Together we challenge the status-quo of business to make Rotterdam and our planet a better, fairer, and more hopeful place to live in.</p>" .
				"<p>You will receive more information on recruitment activities and entrepreneurial events in the comming week!</p>" . 
				"<h4 style='color: #FFC222;'>Stay in touch:</h2>" . 
				"<a href='http://facebook.com/EUREnactus'>http://facebook.com/EUREnactus</a>" . "<br>" .
				"<a href='mailto:info@enactus-eur.nl'>info@enactus-eur.nl</a>" . "<br>" .
				"<a href='http://instagram.com/enactus_eur'>http://instagram.com/enactus_eur</a>" . "<br>" .
				"<br>" .
				"<p>Best," . "<br>" . 
				"The EnactusEUR Family </p>" . "<br>" .
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>" .
				"<p>This is an automatically generated email. Please do no reply." . "<br>"
			);
			$this->email->send();
			$this->email->clear(TRUE);

			redirect ("/Main/success");
		}
	}

	//validate and register new cofounder
	public function teammember()
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
			redirect("/#contact-us");
		}
		else
		{
			$this->load->model("Form_model");
			$post = $this->input->post(NULL, TRUE);

			$config = [];
			$config['upload_path'] = './uploads/CV/teammember/';
	        $config['allowed_types'] = 'pdf';
	        $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_{$post['project_preference']}_teamMember";
	        $config['overwrite'] = TRUE;
	        
	        $this->upload->initialize($config);
	        
	        if ( ! $this->upload->do_upload('teammemberCV')){
	        	$this->session->set_flashdata('errors', $this->upload->display_errors());
	        	redirect("/#contact-us");
	        }
	        else{
	        	$filePath = array('upload_data' => $this->upload->data('full_path'));
	        }

			$this->Form_model->teammember($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["type"], $post['statusMember'], $filePath, $post['statusApplication'], $post["motivation"]);

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

			$this->email->from("robots@enactus-eur.nl","The Enactus Robot");
			$this->email->to($post["email"]);
			$this->email->subject("A warm welcome from EnactusEUR!");
			$this->email->message(
				"<h2 style='color: #FFC222;'>Hey, {$post["first_name"]}!</h2>" .
				"<p> Thank you for your interest in EnactusEUR. Together we challenge the status-quo of business to make Rotterdam and our planet a better, fairer, and more hopeful place to live in.</p>" .
				"<p>You will receive more information on recruitment activities and entrepreneurial events in the comming week!</p>" . 
				"<h4 style='color: #FFC222;'>Stay in touch:</h2>" . 
				"<a href='http://facebook.com/EUREnactus'>http://facebook.com/EUREnactus</a>" . "<br>" .
				"<a href='mailto:info@enactus-eur.nl'>info@enactus-eur.nl</a>" . "<br>" .
				"<a href='http://instagram.com/enactus_eur'>http://instagram.com/enactus_eur</a>" . "<br>" .
				"<br>" .
				"<p>Best," . "<br>" . 
				"The EnactusEUR Family </p>" . "<br>" .
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>" .
				"<p>This is an automatically generated email. Please do no reply." . "<br>"
			);
			$this->email->send();
			$this->email->clear(TRUE);

			redirect ("/Main/success");
		}
	}

	//validate and register new passive member
	public function ambassador()
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
			redirect("/#contact-us");
		}
		else
		{
			$this->load->model("Form_model");
			$post = $this->input->post(NULL, TRUE);

			$config = [];
			$config['upload_path'] = './uploads/CV/ambassador/';
	        $config['allowed_types'] = 'pdf';
	        $config['file_name'] = "{$post['first_name']}_{$post['last_name']}_ambassador";
	        $config['overwrite'] = TRUE;
	        
	        $this->upload->initialize($config);
	        
	        if ( ! $this->upload->do_upload('ambassadorCV')){
	        	$this->session->set_flashdata('errors', $this->upload->display_errors());
	        	redirect("/#contact-us");
	        }
	        else{
	        	$filePath = array('upload_data' => $this->upload->data('full_path'));
	        }

			$this->Form_model->ambassador($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post['type'], $post["status"], $filePath, $post["motivation"]);

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

			$this->email->from("robots@enactus-eur.nl","The Enactus Robot");
			$this->email->to($post["email"]);
			$this->email->subject("A warm welcome from EnactusEUR!");
			$this->email->message(
				"<h2 style='color: #FFC222;'>Hey, {$post["first_name"]}!</h2>" .
				"<p> Thank you for your interest in EnactusEUR. Together we challenge the status-quo of business to make Rotterdam and our planet a better, fairer, and more hopeful place to live in.</p>" .
				"<p>You will receive more information on recruitment activities and entrepreneurial events in the comming week!</p>" . 
				"<h2 style='color: #FFC222;'>Stay in touch:</h2>" . 
				"<a href='http://facebook.com/EUREnactus'>http://facebook.com/EUREnactus</a>" . "<br>" .
				"<a href='mailto:info@enactus-eur.nl'>info@enactus-eur.nl</a>" . "<br>" .
				"<a href='http://instagram.com/enactus_eur'>http://instagram.com/enactus_eur</a>" . "<br>" .
				"<br>" .
				"<p>Best," . "<br>" . 
				"The EnactusEUR Family </p>" . "<br>" .
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>" .
				"<p>This is an automatically generated email. Please do not reply.</p>" . "<br>"
			);
			$this->email->send();
			$this->email->clear(TRUE);

			redirect ("/Main/success");
		}
	}
	public function partner()
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
			redirect("/#contact-us");
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

			$this->email->from("robots@enactus-eur.nl","The Enactus Robot");
			$this->email->to($post["email"]);
			$this->email->subject("A warm welcome from EnactusEUR!");
			$this->email->message(
				"<h2 style='color: #FFC222;'>Hey, {$post["first_name"]}!</h2>" .
				"<p> Thank you for your interest in EnactusEUR. Together we challenge the status-quo of business to make Rotterdam and our planet a better, fairer, and more hopeful place to live in.</p>" .
				"<p>We will get back to you with more details shortly!</p>" . 
				"<h2 style='color: #FFC222;'>Stay in touch:</h2>" . 
				"<a href='http://facebook.com/EUREnactus'>http://facebook.com/EUREnactus</a>" . "<br>" .
				"<a href='mailto:info@enactus-eur.nl'>info@enactus-eur.nl</a>" . "<br>" .
				"<a href='http://instagram.com/enactus_eur'>http://instagram.com/enactus_eur</a>" . "<br>" .
				"<br>" .
				"<p>Best," . "<br>" . 
				"The EnactusEUR Family </p>" . "<br>" .
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>" . 
				"<p>This is an automatically generated email. Please do not reply.</p>" . "<br>"
			);
			$this->email->send();
			$this->email->clear(TRUE);

			redirect ("/Main/success");
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
}
?>