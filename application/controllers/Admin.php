<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function index()
	{
		$this->load->view('login');
	}

	public function crypto()
	{
		$this->load->library('encrypt')	
		$crypto = $this->encrypt->encode('admin');
		echo $crypto;
	}
}