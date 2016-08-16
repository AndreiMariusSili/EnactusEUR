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
			redirect("/#contact-us");
		}
		else
		{
			$this->load->model("Form_model");
			$post = $this->input->post(NULL, TRUE);
			$this->Form_model->founder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["title"], $post["idea"], $post["type"], $post["statusProject"], $post['statusMember'], $post["motivation"]);

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
				"<p>You can also review his application in the Enactus Admin Panel at: " . "<a href='" . site_url() . "admin'>" . site_url() . "</a></p>" . 
				"<p>Best," . "<br>" .
				"The Enactus Robot</p>"
			);
			$this->email->send();

			$this->email->from("robots@enactus-eur.nl","Enactus Robots");
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
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>"
			);
			$this->email->send();

			redirect ("/Main/success");
		}
	}

	//validate and register new cofounder
	public function cofounder()
	{
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->helper('form');

		$this->load->helper("url");
		$this->load->library('email');

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
			redirect("/#contact-us");
		}
		else
		{
			$this->load->model("Form_model");
			$post = $this->input->post(NULL, TRUE);
			$this->Form_model->cofounder($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post["project_preference"], $post["type"], $post['statusMember'], $post['statusApplication'], $post["motivation"]);

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
			$this->email->subject("New cofounder application - {$post['first_name']} {$post['last_name']}");
			$this->email->message(
				"<h2>Dear Enactus Administrator,</h2>" .
				"<p>A potential cofounder has just applied on your website. You can review his details below.</p>" .
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

			$this->email->from("robots@enactus-eur.nl","Enactus Robots");
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
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>"
			);
			$this->email->send();

			redirect ("/Main/success");
		}
	}

	//validate and register new passive member
	public function passive()
	{
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->helper('form');

		$this->load->helper('url');
		$this->load->library('email');

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
			redirect("/#contact-us");
		}
		else
		{
			$this->load->model("Form_model");
			$post = $this->input->post(NULL, TRUE);
			$this->Form_model->passive($post["first_name"], $post["last_name"], $post["email"], $post["phone_number"], $post["dob"], $post["study"], $post['type'], $post["status"], $post["motivation"]);

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
			$this->email->subject("New passive member application - {$post['first_name']} {$post['last_name']}");
			$this->email->message(
				"<h2>Dear Enactus Administrator,</h2>" .
				"<p>A new passive member has just applied on your website. You can review his details below.</p>" .
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

			$this->email->from("robots@enactus-eur.nl","Enactus Robots");
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
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>"
			);
			$this->email->send();

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
				"<p>Best," . "<br>" .
				"The Enactus Robot</p>"
			);
			$this->email->send();

			$this->email->from("robots@enactus-eur.nl","Enactus Robots");
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
				"<img src='" . site_url() . "assets/images/Logo_enactus_eur.png'" . "style='width: 200px; height: auto;' alt='Enactus Eramus University Rotterdam'>"
			);
			$this->email->send();

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