<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('opname_model');
		$this -> load -> model('inventory/inventory_model');
	}

	function index() {
		$view['opname'] = $this -> opname_model -> __get_opname($this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/opname', $view);
	}

	function opname_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$desc = $this -> input -> post('desc');

			$adjustmin = (int) $this -> input -> post('adjustmin');
			$adjustplus = (int) $this -> input -> post('adjustplus');
			
			$sbegin2 = (int) $this -> input -> post('sbegin2');
			$sin2 = (int) $this -> input -> post('sin2');
			$sout2 = (int) $this -> input -> post('sout2');
			$sfinal2 = (int) $this -> input -> post('sfinal2');
			
			if ($id) {
				if ($adjustplus && $adjustmin) {
					__set_error_msg(array('error' => 'Adjust min dan plus salah satu harus di isi !!!'));
					redirect(site_url('opname/'. __FUNCTION__ .'/' . $id));
				}
				else if (!$adjustmin && !$adjustplus) {
					__set_error_msg(array('error' => 'Adjust min dan plus salah satu harus di isi !!!'));
					redirect(site_url('opname/'. __FUNCTION__ .'/' . $id));
				}
				else if (!$desc) {
					__set_error_msg(array('error' => 'Keterangan harus di isi !!!'));
					redirect(site_url('opname/'. __FUNCTION__ .'/' . $id));
				}
				else {
					if ($adjustplus) $sfinal = $sfinal2 + $adjustplus;
					else $sfinal = $sfinal2 - $adjustmin;
					
					$arr = array('istock' => $sfinal);
					if ($this -> inventory_model -> __update_inventory($id, $arr, $this -> privileges -> sesresult['ubid'])) {
						$oarr = array('obid' => $this -> privileges -> sesresult['ubid'], 'oidid' => $id, 'odate' => time(), 'ostockbegining' => $sbegin2, 'ostockin' => $sin2, 'ostockout' => $sout2, 'ostock' => $sfinal2, 'oadjustmin' => $adjustmin, 'oadjustplus' => $adjustplus, 'odesc' => $desc);
						$this -> opname_model -> __insert_opname($oarr);
						__set_error_msg(array('info' => 'Stock berhasil diubah.'));
						redirect(site_url('opname'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah stock !!!'));
						redirect(site_url('opname'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('opname'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> opname_model -> __get_opname_detail($id, $this -> privileges -> sesresult['ubid']);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
}
