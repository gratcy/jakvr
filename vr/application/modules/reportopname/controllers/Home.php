<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('reportopname_model');
	}

	function index() {
		$view['reportopname'] = $this -> reportopname_model -> __get_reportopname(strtotime('-2 months', time()),time());
		$view['from'] = date('m/d/Y', strtotime('-1 month', time()));
		$view['to'] = date('m/d/Y');
		$this->load->view('pages/reportopname', $view);
	}
	
	function sortreport($from,$to) {
		$datesort = $this -> input -> post('datesort', TRUE);
		if ($datesort) {
			$datesort = explode(' - ', $datesort);
			$from = explode('/', $datesort[0]);
			$from = strtotime($from[2].'-'.$from[0].'-'.$from[1]);
			$to = explode('/', $datesort[1]);
			$to = strtotime($to[2].'-'.$to[0].'-'.$to[1]);
			
			redirect(site_url('reportopname/sortreport/'.$from.'/'.$to));
		}
		else {
			$view['reportopname'] = $this -> reportopname_model -> __get_reportopname($from, $to);
			$view['from'] = date('m/d/Y',$from);
			$view['to'] = date('m/d/Y',$to);
			$this->load->view('pages/reportopname', $view);
		}
	}
}
