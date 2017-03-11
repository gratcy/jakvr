<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('dailyreport_model');
	}

	function index() {
		$view['dailyreport'] = $this -> dailyreport_model -> __get_daily_report($this -> privileges -> sesresult['uid'],$this -> privileges -> sesresult['ugid']);
		$this->load->view('pages/dailyreport', $view);
	}
	
	function dailyreport_add() {
		if ($_POST) {
			$report = $this -> input -> post('report', TRUE);
			$report = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $report);
			$subject = $this -> input -> post('subject', TRUE);
			$datereport = $this -> input -> post('datereport', TRUE);
			$datereport = str_replace('/','-', $datereport);
			$status = (int) $this -> input -> post('status');

			if (!$subject || !$report || !$datereport) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('dailyreport' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('ruid' => $this -> privileges -> sesresult['uid'], 'rdate' => strtotime($datereport),'rsubject' => $subject,'rreport' => $report, 'rstatus' => $status);
				if ($this -> dailyreport_model -> __insert_daily_report($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('dailyreport'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('dailyreport'));
				}
			}
		}
		else {
			$this->load->view('pages/'.__FUNCTION__, array());
		}
	}
	
	function dailyreport_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$app = (int) $this -> input -> post('app');
			$report = $this -> input -> post('report', TRUE);
			$report = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $report);
			$subject = $this -> input -> post('subject', TRUE);
			$datereport = $this -> input -> post('datereport', TRUE);
			$datereport = str_replace('/','-', $datereport);
			$status = (int) $this -> input -> post('status');
			
			if ($id) {
				if (!$subject || !$report || !$datereport) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('dailyreport' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					if ($app == 1) $status = 3;
					$arr = array('rdate' => strtotime($datereport),'rsubject' => $subject,'rreport' => $report, 'rstatus' => $status);
					if ($this -> dailyreport_model -> __update_daily_report($id, $this -> privileges -> sesresult['uid'], $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('dailyreport'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('dailyreport'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('dailyreport'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> dailyreport_model -> __get_daily_report_detail($id, $this -> privileges -> sesresult['uid']);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function dailyreport_delete($id) {
		$id = (int) $id;
		if ($this -> dailyreport_model -> __update_daily_report($id, $this -> privileges -> sesresult['uid'], array('rstatus' => 2))) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('dailyreport'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('dailyreport'));
		}
	}
	
	function dailyreport_update_one() {
		$idnya = $this -> input -> post('idnya');
		$value = $this -> input -> post('value');
		if ($this -> privileges -> sesresult['ugid'] != 1) {
			echo '1';
			die;
		}
		
		$idnya = (int) $this -> input -> post('idnya');
		if ($this -> dailyreport_model -> __update_daily_report($idnya,0, array('rnotes' => $value))) {
			echo '-1';
		}
		else {
			echo '1';
		}
	}
}
