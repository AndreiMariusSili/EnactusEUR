<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_edit_model extends CI_Model
{
	public function videoEdit($post)
	{
		$title = $post['video_title'];
		$subtitle = $post['video_subtitle'];

		//update video title and subtitle in database
	    $data = array(
	    	'id' => 0,
	    	'video_title' => $title,
	    	'video_subtitle' => $subtitle,
	   	);
	    $this->db->replace('landing_admin', $data);
	}
}