<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{

	public function index()
	{
			$this->load->model("Main_model");
			$this->load->model('Main_model');

			$venturesdata = $this->Main_model->ventureCount();
			$contentdata = $this->Main_model->landing();
			$this->load->view('landing', $contentdata, $venturesdata);
	}

	public function landing()
	{
		$this->load->model("Main_model");
		$viewdata = $this->Main_model->ventureCount();
		$this->load->model('Main_model');
		$viewdata = $this->Main_model->landing();
		$this->load->view('landing', $viewdata);
	}

	public function teams()
	{
		$this->load->view('teams');
	}

	public function ventures()
	{
		$this->load->view('ventures');
	}

	public function success()
	{
		$this->load->view('success');
	}
}
?>