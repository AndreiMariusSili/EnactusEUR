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
	    $this->db->update('landing_admin', $data);
	}
	public function aboutusEdit($post)
	{
	    $block_left_title = $post['block_left_title'];
	    $block_left_content = $post['block_left_content'];
	    $block_center_title = $post['block_center_title'];
	    $block_center_content = $post['block_center_content'];
	    $block_right_title = $post['block_right_title'];
	    $block_right_content = $post['block_right_content'];


	    $data = array (
	    	'id' => 0,
	    	'aboutus_left_title' => $block_left_title,
	    	'aboutus_left_content' => $block_left_content,
	    	'aboutus_center_title' => $block_center_title,
	    	'aboutus_center_content' => $block_center_content,
	    	'aboutus_right_title' => $block_right_title,
	    	'aboutus_right_content' => $block_right_content,
	    );
	    $this->db->update('landing_admin', $data);
	}
	public function accompEdit($post)
	{
	    $block_left_title = $post['block_left_title'];
	    $block_left_content = $post['block_left_content'];
	    $block_center_title = $post['block_center_title'];
	    $block_center_content = $post['block_center_content'];
	    $block_right_title = $post['block_right_title'];
	    $block_right_content = $post['block_right_content'];


	    $data = array (
	    	'id' => 0,
	    	'accomp_left_title' => $block_left_title,
	    	'accomp_left_content' => $block_left_content,
	    	'accomp_center_title' => $block_center_title,
	    	'accomp_center_content' => $block_center_content,
	    	'accomp_right_title' => $block_right_title,
	    	'accomp_right_content' => $block_right_content,
	    );
	    $this->db->update('landing_admin', $data);
	}
}