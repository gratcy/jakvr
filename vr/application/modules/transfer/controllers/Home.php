<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('request/request_lib');
		$this -> load -> model('transfer_model');
		$this -> load -> model('receiving/receiving_model');
		$this -> load -> model('request/request_model');
		$this -> load -> model('product/product_model');
	}

	function index() {
		$view['transfer'] = $this -> transfer_model -> __get_transfer($this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/transfer', $view);
	}
	
	function transfer_add() {
		$desc = $this -> input -> post('desc', TRUE);
		$products = $this -> input -> post('products', TRUE);
		$rno = (int) $this -> input -> post('rno');
		$status = (int) $this -> input -> post('status');
		if ($_POST) {
			
			if (!$rno) {
				__set_error_msg(array('error' => 'Judul dan Request No harus di isi !!!'));
				redirect(site_url('transfer' . '/' . __FUNCTION__));
			}
			else {
				$tno = 'TR01' . date('dmy') .str_pad(($this -> transfer_model -> __get_total_today_transfer($this -> privileges -> sesresult['ubid'])+1), 3, "0", STR_PAD_LEFT);

				$arr = array('tno' => $tno, 'trid' => $rno, 'tdate' => time(), 'tdesc' => $desc, 'tstatus' => $status, 'tcreatedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time())));

				if ($this -> transfer_model -> __insert_transfer($arr)) {
					foreach($products as $k => $v)
						$this -> request_model -> __update_request_products($k, array('rqty' => $v, 'rmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time()))));
						
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('transfer'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('transfer'));
				}
			}
		}
		else {
			$view['rno'] = $this -> request_lib -> __get_request(0,$this -> privileges -> sesresult['ubid'],1);
			$this->load->view('pages/' . __FUNCTION__, $view);
		}
	}
	
	function transfer_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$app = (int) $this -> input -> post('app');
			$desc = $this -> input -> post('desc', TRUE);
			$products = $this -> input -> post('products', TRUE);
			$rno = (int) $this -> input -> post('rno');
			$status = (int) $this -> input -> post('status');
			
			if ($app == 1) $status = 3;
			
			if ($id) {
				if (!$rno) {
					__set_error_msg(array('error' => 'Judul dan Request No harus di isi !!!'));
					redirect(site_url('transfer' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$rq = $this -> request_model -> __get_request_detail($rno);
					if (!$rq) redirect(site_url('transfer'));
					
					$arr = array('trid' => $rno, 'tdesc' => $desc, 'tstatus' => $status, 'tmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time())));
					if ($app == 1) $arr += array('tapprovedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time())));

					if ($this -> transfer_model -> __update_transfer($id, $arr)) {
						foreach($products as $k => $v) {
							if ($app == 1) {
								$it = $this -> request_model -> __get_request_item_detail($k);
								$iv = $this -> receiving_model -> __get_inventory_detail($it[0] -> rpid, $rq[0] -> rto);
								$this -> request_model -> __update_inventory($it[0] -> rpid, array('istockout' => ($iv[0] -> istockout+$v),'istock' => ($iv[0] -> istock - $v)), $rq[0] -> rto);
							}
							$this -> request_model -> __update_request_products($k, array('rqty' => $v, 'rmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time()))));
						}
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('transfer'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('transfer'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('transfer'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> transfer_model -> __get_transfer_detail($id);
			$view['rno'] = $this -> request_lib -> __get_request($view['detail'][0] -> trid,$this -> privileges -> sesresult['ubid'],1);
			$this->load->view('pages/' . __FUNCTION__, $view);
		}
	}
	
	function transfer_list_products($did) {
		$view['products'] = $this -> request_model -> __get_products($did, 2);
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function transfer_detail($id) {
		$view['detail'] = $this -> transfer_model -> __get_transfer_detail_approved($this -> privileges -> sesresult['ubid'],$id);
		$view['products'] = $this -> request_model -> __get_products($view['detail'][0] -> trid, 2);
		$view['id'] = $id;
		if ($view['detail'][0] -> tstatus < 3) redirect(site_url('transfer'));
		$this->load->view('pages/' . __FUNCTION__, $view);
	}
	
	function transfer_delete($id) {
		if ($this -> transfer_model -> __delete_transfer($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('transfer'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('transfer'));
		}
	}
}
