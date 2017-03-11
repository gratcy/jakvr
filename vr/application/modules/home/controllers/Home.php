<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('home_model');
	}

	function index() {
		$data['total']['products'] = $this -> home_model -> __get_total_product();
		$data['total']['customer'] = $this -> home_model -> __get_total_customer();
		$data['total']['stock'] = $this -> home_model -> __get_total_stock($this -> privileges -> sesresult['ubid']);
		$data['total']['order'] = $this -> home_model -> __get_total_order();
		$this->load->view('index', $data);
	}
	
	function get_stats() {
		header('Content-type: application/json');
		$data['total']['products'] = $this -> home_model -> __get_total_product();
		$data['total']['customer'] = $this -> home_model -> __get_total_customer();
		$data['total']['stock'] = $this -> home_model -> __get_total_stock($this -> privileges -> sesresult['ubid']);
		$data['total']['order'] = $this -> home_model -> __get_total_order();
		echo json_encode($data);
	}

	function switchbranch($id) {
		$login = $this -> cache -> memcached -> get('__login', TRUE);
		$login['ubid'] = $id;
		$login['ubname'] = __get_branch($id, 1);
		$this -> cache -> memcached -> regenerateCache($login, '__login', 7200, TRUE);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
