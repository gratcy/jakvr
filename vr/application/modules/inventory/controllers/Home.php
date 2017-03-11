<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('inventory_model');
	}

	function index() {
		$view['inventory'] = $this -> inventory_model -> __get_inventory($this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/inventory', $view);
	}

	function cardstock($id) {
		$bid = $this -> privileges -> sesresult['ubid'];
		$view['detail'] = $this -> inventory_model -> __get_inventory_detail($id, $bid);
		$orderApproved = $this -> inventory_model -> __get_transaction($id,1, $bid);
		$orderUnApproved = $this -> inventory_model -> __get_transaction($id,2, $bid);
		$returApproved = $this -> inventory_model -> __get_transaction($id,3, $bid);
		$returUnApproved = $this -> inventory_model -> __get_transaction($id,4, $bid);
		$receivingApproved = $this -> inventory_model -> __get_transaction($id,5, $bid);
		$receivingUnApproved = $this -> inventory_model -> __get_transaction($id,6, $bid);
		$transferApproved = $this -> inventory_model -> __get_transaction($id,9, $bid);
		$transferUnApproved = $this -> inventory_model -> __get_transaction($id,10, $bid);
		
		$OadjustPlus = $this -> inventory_model -> __get_transaction($id,7, $bid);
		$OadjustMin = $this -> inventory_model -> __get_transaction($id,8, $bid);
		
		$data = array_merge($orderApproved, $orderUnApproved, $returApproved, $returUnApproved, $receivingApproved, $receivingUnApproved, $OadjustPlus, $OadjustMin, $transferApproved, $transferUnApproved);
		usort($data, "__sortArrayByDate");

		$view['data'] = $data;
		$this->load->view('print/card_stock', $view, FALSE);
	}
}
