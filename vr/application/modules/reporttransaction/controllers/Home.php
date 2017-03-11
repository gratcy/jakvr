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
		$this -> load -> model('reporttransaction_model');
		$this -> load -> library('reffer/reffer_lib');
		$this -> load -> library('users/users_lib');
	}

	function index() {
		if ($_POST) {
			if (empty($_POST['type'])) $_POST['type'] = array(3);
			$netto = (int) $this -> input -> post('netto');
			$branch = (int) $this -> input -> post('branch');
			$ttype = (int) $this -> input -> post('ttype');
			$rtype = (int) $this -> input -> post('rtype');
			$type = $this -> input -> post('type');
			$approval = (int) $this -> input -> post('approval');
			$format = (int) $this -> input -> post('format');
			$reffer = $this -> input -> post('reffer');
			$user = $this -> input -> post('user');
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
			$OT = array();
			
			$params = array('cid' => $cid, 'pid' => $pid, 'approval' => $approval, 'ttype' => $ttype, 'rtype' => $rtype, 'datefrom' => $dfrom, 'dateto' => $dto, 'reffer' => $reffer, 'user' => $user, 'netto' => $netto);

			foreach($type as $k => $v) {
				if ($v == 0 || $v == 4) $PO = $this -> reporttransaction_model -> __get_transaction($branch,$params, 1);
				
				if ($v == 1 || $v == 4) $RO = $this -> reporttransaction_model -> __get_transaction($branch,$params, 2);
				
				if (!$reffer && $v == 2 || $v == 4) $RC = $this -> reporttransaction_model -> __get_receiving($branch,$params, 2);
				
				if ($v == 3 || $v == 4) $OT = $this -> reporttransaction_model -> __get_transaction_others($params);
			}
			
			$data = array_merge($PO, $RO, $OT, $RC);
			usort($data, '__date_compare');
			
			if ($rtype == 3) {
				$rport = array();
				foreach($data as $k => $v) {
					$createdby = json_decode($v -> createdby);
					$v -> createdby = $createdby -> unick;
					if ($createdby -> uid) $rport[$createdby -> uid][] = $v;
				}
				$view['data'] = $rport;
			}
			else if ($rtype == 2) {
				if ($PO) usort($PO, '__date_compare');
				if ($RO) usort($RO, '__date_compare');
				if ($OT) usort($OT, '__date_compare');
				if ($RC) usort($RC, '__date_compare');
				$rdata = array('Purchase Order JakVR' => $PO,'Purchase Order KoekMurah' => $OT,'Retur Order' => $RO,'Receiving' => $RC);
				$view['data'] = $rdata;
			}
			else
				$view['data'] = $data;
				
			$view['post'] = $_POST;
			$this->load->view('print/reporttransaction', $view, FALSE);
		}
		else {
			$view['from'] = date('m/d/Y', strtotime('-1 month', time()));
			$view['to'] = date('m/d/Y');
			$view['reffer'] = $this -> reffer_lib -> __get_reffer(0);
			$view['products'] = $this -> product_lib -> __get_product(0);
			$view['customers'] = $this -> customer_lib -> __get_customer();
			$view['user'] = $this -> users_lib -> __get_user(0);
			$this->load->view('pages/reporttransaction', $view);
		}
	}
}
