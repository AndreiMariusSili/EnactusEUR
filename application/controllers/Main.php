<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{

	public function index()
	{
			$this->load->model("Main_model");
			$viewdata = $this->Main_model->ventureCount();
			$this->load->view('landing', $viewdata);
	}

	public function landing()
	{
			$this->load->view('landing');
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