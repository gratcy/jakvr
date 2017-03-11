<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('product/product_lib');
		$this -> load -> model('reportstock_model');
	}

	function index() {
		if ($_POST) {
			$pid = $this -> input -> post('pid');
			$datesort = explode(' - ',$this -> input -> post('datesort'));
			$dfrom = explode('/',$datesort[0]);
			$dfrom = $dfrom[2] . '-' . $dfrom[0] . '-' . $dfrom[1];
			$dto = explode('/',$datesort[1]);
			$dto = $dto[2] . '-' . $dto[0] . '-' . $dto[1];
			$dfrom = strtotime($dfrom);
			$datediff = strtotime($dto) - $dfrom;
			$view['datediff'] = floor($datediff / (60 * 60 * 24));

			$format = (int) $this -> input -> post('format');
			$view['data'] = $this -> reportstock_model -> __get_stock($this -> privileges -> sesresult['ubid'], $pid, array('datefrom' => $dfrom, 'dateto' => $dto));
			$view['post'] = $_POST;
			$this->load->view('print/reportstock', $view, FALSE);
		}
		else {
			$view['from'] = date('m/d/Y', strtotime('-1 month', time()));
			$view['to'] = date('m/d/Y');
			$view['products'] = $this -> product_lib -> __get_product(0);
			$this->load->view('pages/reportstock', $view);
		}
	}
}
