<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> helper('peti_cash');
		$this -> load -> model('peti_cash_model');
	}

	function index() {
		if ($_POST) {
			$monthyear = $this -> input -> post('monthyear');
			$my = explode(',', $monthyear);
			$view['monthyear'] = $monthyear;
			$month = $my[0];
			$year = $my[1];
		}
		else {
			$view['monthyear'] = date('m,Y');
			$month = date('m');
			$year = date('Y');
		}
		
		$view['peti_cash'] = $this -> peti_cash_model -> __get_peti_cash($month, $year, $this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/peti_cash', $view);
	}
	
	function peti_cash_add() {
		if ($_POST) {
			$nominal = str_replace(',','',$this -> input -> post('nominal', TRUE));
			$desc = $this -> input -> post('desc', TRUE);
			$type = (int) $this -> input -> post('type');
			
			if (!$nominal || !$desc || !$type) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('peti_cash' . '/' . __FUNCTION__));
			}
			else {
				$csaldo = $this -> peti_cash_model -> __get_current_saldo(date('m'), date('Y'));
				if ($type == 1) $saldo = $csaldo[0] -> psaldo + $nominal;
				else $saldo = $csaldo[0] -> psaldo - $nominal;
				
				$arr = array('pbid' => $this -> privileges -> sesresult['ubid'], 'pdate' => time(), 'ptype' => $type, 'pdesc' => $desc, 'pnominal' => $nominal, 'psaldo' => $saldo, 'pstatus' => 1);
				if ($this -> peti_cash_model -> __insert_peti_cash($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('peti_cash'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('peti_cash'));
				}
			}
		}
		else {
			$this->load->view('pages/'.__FUNCTION__, '');
		}
	}
}
