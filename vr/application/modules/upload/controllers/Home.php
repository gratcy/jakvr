<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
	
	}
	
	function images_browser() {
		header('Content-type: application/javascript');
		$path = FCPATH . 'upload';
		$img = array();
		if ($handle = opendir($path)) {
			while (false !== ($entry = readdir($handle))) {
				if (preg_match('/.jpg|.png|.gif/i',$entry)) $img[] = array('url' => site_url('upload/' . $entry));
			}
			closedir($handle);
			echo json_encode($img);
		}
	}
}
