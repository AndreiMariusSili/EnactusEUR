<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{

	public function index()
	{
			$this->load->model("Main_model");

			$data['count'] = $this->Main_model->ventureCount();
			$data['options'] = $this->Main_model->options_get();
			$data['content'] = $this->Main_model->landing();
			$this->load->view('landing', $data);
	}

	public function landing()
	{
		$this->load->model("Main_model");
		$viewdata = $this->Main_model->ventureCount();
		$this->load->model('Main_model');
		$viewdata = $this->Main_model->landing();
		$viewdata['options']= $this->Main_model->options_get();
		$this->load->view('landing', $viewdata);
	}

	public function teams()
	{
		$this->load->model('Main_model');
		$data = $this->Main_model->teams();

		$this->load->view('teams', $data);
	}

	public function ventures()
	{
		$this->load->view('ventures');
	}

	public function success()
	{
		$this->load->view('success');
	}

	public function teamsbeta()
	{
		$this->load->view('teamsbeta');
	}
}
?>