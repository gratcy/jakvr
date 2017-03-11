<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('retur_model');
		$this -> load -> library('customer/customer_lib');
		$this -> load -> library('reffer/reffer_lib');
		$this -> load -> model('product/product_model');
	}

	function index() {
		($this -> cache -> memcached -> get('__retur_products', true) ? $this -> cache -> memcached -> delete('__retur_products', true) : NULL);
		($this -> cache -> memcached -> get('__retur_reject', true) ? $this -> cache -> memcached -> delete('__retur_reject', true) : NULL);
		$view['retur'] = $this -> retur_model -> __get_retur($this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/retur', $view);
	}
	
	function retur_add() {
		if ($_POST) {
			$products = $this -> input -> post('products', TRUE);
			$dateorder = $this -> input -> post('dateorder', TRUE);
			$dateorder = str_replace('/','-', $dateorder);
			$reject = $this -> input -> post('reject', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$ttype = (int) $this -> input -> post('ttype');
			$customer = (int) $this -> input -> post('customer');
			$status = (int) $this -> input -> post('status');
			
			if (count($products) < 1) {
				__set_error_msg(array('error' => 'Product harus di isi !!!'));
				redirect(site_url('retur' . '/' . __FUNCTION__));
			}
			else {
				$ammount = 0;
				$tqty = 0;
				foreach($products as $k => $v) {
					$price = $this -> product_model -> __get_product_price($k);
					$ammount += (isset($price) ? $price[0] -> pprice : 0) * $v;
					$tqty += $v;
				}
				$ttoday = $this -> retur_model -> __get_total_today_transaction($this -> privileges -> sesresult['ubid']);

				$total = $ammount;
				$tno = 'RO'.date('dmy').str_pad($ttoday[0] -> totaltoday+1, 3, "0", STR_PAD_LEFT);
				$arr = array('tbid' => $this -> privileges -> sesresult['ubid'], 'tno' => $tno, 'titype' => 2, 'tqty' => $tqty, 'tcid' => $customer, 'tdate' => strtotime($dateorder),'ttype' => $ttype, 'tdesc' => $desc, 'tammount' => $ammount, 'ttotal' => $total, 'tstatus' => $status, 'tcreatedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));

				if ($this -> retur_model -> __insert_retur($arr)) {
					$rrid = $this -> db -> insert_id();
					foreach($products as $k => $v) {
						$price = $this -> product_model -> __get_product_price($k);
						$this -> retur_model -> __insert_retur_products(array('ttid' => $rrid,'tpid' => $k, 'tprice' => ($price[0] -> pprice * $v),'tqty' => $v, 'treject' => (isset($reject[$k]) ? $reject[$k] : 0),'tstatus' => 1));
						$price = 0;
					}
					
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('retur'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('retur'));
				}
			}
		}
		else {
			$view['reffer'] = $this -> reffer_lib -> __get_reffer(0);
			$view['customer'] = $this -> customer_lib -> __get_customer(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function retur_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$products = $this -> input -> post('products', TRUE);
			$dateorder = $this -> input -> post('dateorder', TRUE);
			$dateorder = str_replace('/','-', $dateorder);
			$reject = $this -> input -> post('reject', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$ttype = (int) $this -> input -> post('ttype');
			$customer = (int) $this -> input -> post('customer');
			$app = (int) $this -> input -> post('app');
			$status = (int) $this -> input -> post('status');

			if ($id) {
				if (count($products) < 1) {
					__set_error_msg(array('error' => 'Product harus di isi !!!'));
					redirect(site_url('retur' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$ammount = 0;
					$tqty = 0;
					foreach($products as $k => $v) {
						$price = $this -> product_model -> __get_product_price($k,2);
						$ammount += (isset($price) ? $price[0] -> pprice : 0) * $v;
						$tqty += $v;
					}
					
					if ($app == 1) $status = 3;
					
					$total = $ammount;
					$arr = array('tqty' => $tqty, 'tcid' => $customer, 'tdate' => strtotime($dateorder),'ttype' => $ttype, 'tdesc' => $desc, 'tammount' => $ammount, 'ttotal' => $total, 'tstatus' => $status, 'tmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));
					if ($app == 1) $arr += array('tapprovedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));					

					if ($this -> retur_model -> __update_retur($id, $arr)) {
						foreach($products as $k => $v) :
							$this -> retur_model -> __update_retur_products($k, array('tqty' => $v, 'treject' => (isset($reject[$k]) ? $reject[$k] : 0)));
							if ($app == 1) {
								$pid = $this -> retur_model -> __get_retur_products_detail($k);
								$iv = $this -> retur_model -> __get_inventory_detail($pid[0] -> tpid, $this -> privileges -> sesresult['ubid']);
							
								if (isset($reject[$k]))
									$this -> retur_model -> __update_inventory($pid[0] -> tpid,array('istockreject' => ($iv[0] -> istockreject+$v)),$this -> privileges -> sesresult['ubid']);
								else
									$this -> retur_model -> __update_inventory($pid[0] -> tpid,array('istockreturn' => ($iv[0] -> istockreturn+$v), 'istockin' => ($iv[0] -> istockin+$v),'istock' => ($iv[0] -> istock + $v)),$this -> privileges -> sesresult['ubid']);
							}
						endforeach;
						__set_error_msg(array('info' => ($app == 1 ? 'Retur berhasil dilakukan.' : 'Data berhasil diubah.')));
						redirect(site_url('retur'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('retur'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('retur'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> retur_model -> __get_retur_detail($id);
			$view['customer'] = $this -> customer_lib -> __get_customer($view['detail'][0] -> tcid);
			$view['reffer'] = $this -> reffer_lib -> __get_reffer($view['detail'][0] -> treffer);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function retur_detail($id) {
		$view['detail'] = $this -> retur_model -> __get_retur_detail_approved($id);
		$view['products'] = $this -> retur_model -> __get_products($id, 2);
		$this->load->view('pages/'.__FUNCTION__, $view);
	}
	
	function faktur($id) {
		$view['detail'] = $this -> retur_model -> __get_retur_detail_approved($id);
		$view['products'] = $this -> retur_model -> __get_products($id, 2);
		$this->load->view('print/faktur_retur', $view, FALSE);
	}
	
	function retur_products_delete($type) {
		$pid = (int) $this -> input -> post('pid');
		$did = (int) $this -> input -> post('did');
		
		if ($pid) {
			if ($type == 1) {
				$products = $this -> cache -> memcached -> get('__retur_products', true);
				$arr = array();
				foreach($products as $v)
					if ($v <> $pid) $arr[] = $v;
				$this -> cache -> memcached -> save('__retur_products', $arr, 900, true);
			}
			else
				if ($did) $this -> retur_model -> __delete_retur_product($did,$pid);
		}
	}
	
	function retur_products($did) {
		if ($did) {
			$view['type'] = 2;
			$view['did'] = $did;
			$view['products'] = $this -> retur_model -> __get_products($did, 2);
		}
		else {
			$pid = $this -> cache -> memcached -> get('__retur_products', true);
			if (!$pid) return false;
			$pid = implode(',',$pid);

			if ($pid) {
				$view['type'] = 1;
				$view['products'] = $this -> retur_model -> __get_products($pid, 1);
			}
		}
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function retur_products_add($type) {
		$pid = $this -> input -> post('pid');
		if (!$pid) {
			__set_error_msg(array('error' => 'Product harus dipilih !!!'));
			redirect(site_url('retur/retur_list_products/' . $type));
		}
		else {
			if ($type == 1) {
				$DidN = (!$this -> cache -> memcached -> get('__retur_products', true) ? array() : $this -> cache -> memcached -> get('__retur_products', true));
				$RjT = (!$this -> cache -> memcached -> get('__retur_reject', true) ? array() : $this -> cache -> memcached -> get('__retur_reject', true));
				$wew = $this -> cache -> memcached -> save('__retur_products', array_unique(array_merge($DidN,$pid)), 900, true);
				$wew2 = $this -> cache -> memcached -> save('__retur_reject', array_unique(array_merge($RjT,$pid)), 900, true);
			}
			else {
				$drid = (int) $this -> input -> post('did');
				foreach($pid as $k => $v) {
					$this -> retur_model -> __insert_retur_products(array('ttid' => $drid,'tpid' => $v, 'tprice' => 0, 'tqty' => 0, 'tstatus' => 1));
				}
			}

			__set_error_msg(array('info' => 'Product berhasil ditambahkan.'));
			redirect(site_url('retur/retur_list_products/' . $type));
		}
	}
	
	function retur_list_products($type,$did) {
		$view['products'] = $this -> product_model -> __get_product(3);
		$dids = $this -> input -> get('did');
		
		if ($dids) $did = $dids;
		
		$view['did'] = $did;
		$view['type'] = $type;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function retur_delete($id) {
		if ($this -> retur_model -> __delete_retur($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('retur'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('retur'));
		}
	}
}
