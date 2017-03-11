<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __date_compare( $a, $b ) {
    return $a -> tdate - $b -> tdate;
}

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('product/product_lib');
		$this -> load -> library('customer/customer_lib');
		$this -> load -> model('reportcommission_model');
		$this -> load -> library('reffer/reffer_lib');
	}

	function index() {
		if ($_POST) {
			if (empty($_POST['type'])) $_POST['type'] = array(3);
			$branch = (int) $this -> input -> post('branch');
			$ttype = (int) $this -> input -> post('ttype');
			$type = $this -> input -> post('type');
			$approval = (int) $this -> input -> post('approval');
			$format = (int) $this -> input -> post('format');
			$reffer = (int) $this -> input -> post('reffer');
			$datesort = explode(' - ',$this -> input -> post('datesort'));
			$cid = $this -> input -> post('cid');
			$pid = $this -> input -> post('pid');
			$dfrom = explode('/',$datesort[0]);
			$dfrom = $dfrom[2] . '-' . $dfrom[0] . '-' . $dfrom[1];
			$dto = explode('/',$datesort[1]);
			$dto = $dto[2] . '-' . $dto[0] . '-' . $dto[1];
			$PO = array();
			$RO = array();
			$RC = array();
			
			$params = array('cid' => $cid, 'pid' => $pid, 'approval' => $approval, 'ttype' => $ttype, 'datefrom' => $dfrom, 'dateto' => $dto, 'reffer' => $reffer);

			foreach($type as $k => $v) {
				if ($v == 0 || $v == 4) {
					$PO = $this -> reporttransaction_model -> __get_transaction($branch,$params, 1);
				}
				
				if ($v == 1 || $v == 4) {
					$RO = $this -> reporttransaction_model -> __get_transaction($branch,$params, 2);
				}
				if (!$reffer) {
					if ($v == 2 || $v == 4) {
						$RC = $this -> reporttransaction_model -> __get_receiving($branch,$params, 2);
					}
				}
				
				if ($v == 3 || $v == 4) {
					$RC = $this -> reporttransaction_model -> __get_transaction_others($params);
				}
			}
			$view['data'] = array_merge($PO, $RO, $RC);
			usort($view['data'], '__date_compare');
			$view['post'] = $_POST;
			$this->load->view('print/reportcommission', $view, FALSE);
		}
		else {
			$view['from'] = date('m/d/Y', strtotime('-1 month', time()));
			$view['to'] = date('m/d/Y');
			$view['reffer'] = $this -> reffer_lib -> __get_reffer(0);
			$view['products'] = $this -> product_lib -> __get_product(0);
			$view['customers'] = $this -> customer_lib -> __get_customer();
			$this->load->view('pages/reportcommission', $view);
		}
	}
}
