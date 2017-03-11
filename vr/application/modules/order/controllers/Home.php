<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('order_model');
		$this -> load -> library('customer/customer_lib');
		$this -> load -> library('reffer/reffer_lib');
		$this -> load -> library('logistics/logistics_lib');
		$this -> load -> model('product/product_model');
	}

	function index() {
		($this -> cache -> memcached -> get('__order_products', true) ? $this -> cache -> memcached -> delete('__order_products', true) : NULL);
		$view['order'] = $this -> order_model -> __get_order($this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/order', $view);
	}
	
	function order_add() {
		if ($_POST) {
			$reffer = (int) $this -> input -> post('reffer');
			$products = $this -> input -> post('products', TRUE);
			$dateorder = $this -> input -> post('dateorder', TRUE);
			$dateorder = str_replace('/','-', $dateorder);
			$desc = $this -> input -> post('desc', TRUE);
			$disc = $this -> input -> post('disc', TRUE);
			$disc = (int) str_replace(',','', $disc);
			$ttype = (int) $this -> input -> post('ttype');
			$customer = (int) $this -> input -> post('customer');
			$ctype = (int) $this -> input -> post('ctype');
			$status = (int) $this -> input -> post('status');

			if (count($products) < 1) {
				__set_error_msg(array('error' => 'Product harus di isi !!!'));
				redirect(site_url('order' . '/' . __FUNCTION__));
			}
			else {
				$tqty = 0;
				$ammount = 0;
				foreach($products as $k => $v) {
					$price = $this -> product_model -> __get_product_price($k);
					if ($ctype == 1)
						$ammount += (isset($price) ? $price[0] -> pprice : 0) * $v;
					else
						$ammount += (isset($price) ? $price[0] -> ppriceseller : 0) * $v;
					$tqty += $v;
				}
				
				$ttoday = $this -> order_model -> __get_total_today_transaction($this -> privileges -> sesresult['ubid']);
				$total = $ammount - $disc;
				$tno = 'PO'.date('dmy').str_pad($ttoday[0] -> totaltoday+1, 3, "0", STR_PAD_LEFT);
				$arr = array('tbid' => $this -> privileges -> sesresult['ubid'], 'tno' => $tno, 'titype' => 1, 'tqty' => $tqty, 'tcid' => $customer, 'tdate' => strtotime($dateorder),'ttype' => $ttype, 'tdesc' => $desc, 'treffer' => $reffer, 'tammount' => $ammount, 'tdiscount' => $disc, 'ttotal' => $total, 'tstatus' => $status, 'tcreatedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));

				if ($this -> order_model -> __insert_order($arr)) {
					$rrid = $this -> db -> insert_id();
					foreach($products as $k => $v) {
						$price = $this -> product_model -> __get_product_price($k);
						$this -> order_model -> __insert_order_products(array('ttid' => $rrid,'tpid' => $k, 'tprice' => (($ctype == 1 ? $price[0] -> pprice * $v : $price[0] -> ppriceseller * $v)), 'tpricebase' => $price[0] -> ppricebase,'tqty' => $v,'tstatus' => 1));
						$price = 0;
					}
					
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('order'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('order'));
				}
			}
		}
		else {
			$view['reffer'] = $this -> reffer_lib -> __get_reffer(0);
			$view['customer'] = $this -> customer_lib -> __get_customer(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function order_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$reffer = (int) $this -> input -> post('reffer');
			$dateorder = $this -> input -> post('dateorder', TRUE);
			$dateorder = str_replace('/','-', $dateorder);
			$products = $this -> input -> post('products', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$disc = $this -> input -> post('disc', TRUE);
			$disc = (int) str_replace(',','', $disc);
			$ttype = (int) $this -> input -> post('ttype');
			$customer = (int) $this -> input -> post('customer');
			$app = (int) $this -> input -> post('app');
			$ctype = (int) $this -> input -> post('ctype');
			$status = (int) $this -> input -> post('status');

			if ($id) {
				if (count($products) < 1) {
					__set_error_msg(array('error' => 'Product harus di isi !!!'));
					redirect(site_url('order' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$ammount = 0;
					$tqty = 0;
					$soldOut = false;
					foreach($products as $k => $v) {
						$price = $this -> product_model -> __get_product_price($k,2);
						if ($ctype == 1)
							$ammount += (isset($price) ? $price[0] -> pprice : 0) * $v;
						else
							$ammount += (isset($price) ? $price[0] -> ppriceseller : 0) * $v;
						$tqty += $v;
						
						if ($app == 1) {
							$ck = $this -> order_model -> __get_inventory_detail($k,2,$this -> privileges -> sesresult['ubid']);
							if ($ck[0] -> istock == 0 || $ck[0] -> istock < $v) {
								$soldOut = true;
								break;
							}
						}
					}
					
					if ($soldOut) {
						__set_error_msg(array('error' => 'Stock produk tidak tersedia !!!'));
						redirect(site_url('order' . '/' . __FUNCTION__ . '/' . $id));
					}
					
					if ($app == 1) $status = 3;
					
					$total = $ammount - $disc;
					$arr = array('tqty' => $tqty, 'tcid' => $customer, 'tdate' => strtotime($dateorder),'ttype' => $ttype, 'tdesc' => $desc, 'treffer' => $reffer, 'tammount' => $ammount, 'tdiscount' => $disc, 'ttotal' => $total, 'tstatus' => $status, 'tmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));
					if ($app == 1) $arr += array('tapprovedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));					

					if ($this -> order_model -> __update_order($id, $arr)) {
						foreach($products as $k => $v) :
							$price = $this -> product_model -> __get_product_price($k, 2);
							$this -> order_model -> __update_order_products($k, array('tqty' => $v, 'tprice' => (($ctype == 1 ? $price[0] -> pprice * $v : $price[0] -> ppriceseller * $v)), 'tpricebase' => $price[0] -> ppricebase));
							if ($app == 1) {
								$pid = $this -> order_model -> __get_order_products_detail($k);
								$iv = $this -> order_model -> __get_inventory_detail($pid[0] -> tpid,1,$this -> privileges -> sesresult['ubid']);
								$this -> order_model -> __update_inventory($pid[0] -> tpid,array('istockout' => ($iv[0] -> istockout+$v),'istock' => ($iv[0] -> istock - $v)), $this -> privileges -> sesresult['ubid']);
							}
						endforeach;
						__set_error_msg(array('info' => ($app == 1 ? 'Order berhasil dilakukan.' : 'Data berhasil diubah.')));
						redirect(site_url('order'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('order'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('order'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> order_model -> __get_order_detail($id, $this -> privileges -> sesresult['ubid']);
			$view['reffer'] = $this -> reffer_lib -> __get_reffer($view['detail'][0] -> treffer);
			$view['customer'] = $this -> customer_lib -> __get_customer($view['detail'][0] -> tcid);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function order_detail($id) {
		$view['detail'] = $this -> order_model -> __get_order_detail_approved($id);
		$view['products'] = $this -> order_model -> __get_products($id, 2);
		$this->load->view('pages/'.__FUNCTION__, $view);
	}
	
	function order_products_delete($type) {
		$pid = (int) $this -> input -> post('pid');
		$did = (int) $this -> input -> post('did');
		
		if ($pid) {
			if ($type == 1) {
				$products = $this -> cache -> memcached -> get('__order_products', true);
				$arr = array();
				foreach($products as $v)
					if ($v <> $pid) $arr[] = $v;
				$this -> cache -> memcached -> save('__order_products', $arr, 900, true);
			}
			else
				if ($did) $this -> order_model -> __delete_order_product($did,$pid);
		}
	}
	
	function order_products($did) {
		$ctype = (int) $this -> input -> get('ctype');
		if ($did) {
			$view['type'] = 2;
			$view['did'] = $did;
			$view['products'] = $this -> order_model -> __get_products($did, 2);
		}
		else {
			$pid = $this -> cache -> memcached -> get('__order_products', true);
			if (!$pid) return false;
			$pid = implode(',',$pid);

			if ($pid) {
				$view['type'] = 1;
				$view['products'] = $this -> order_model -> __get_products($pid, 1);
			}
		}
		$view['ctype'] = $ctype;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function order_products_add($type) {
		$pid = $this -> input -> post('pid');
		if (!$pid) {
			__set_error_msg(array('error' => 'Product harus dipilih !!!'));
			redirect(site_url('order/order_list_products/' . $type));
		}
		else {
			if ($type == 1) {
				$DidN = (!$this -> cache -> memcached -> get('__order_products', true) ? array() : $this -> cache -> memcached -> get('__order_products', true));
				$wew = $this -> cache -> memcached -> save('__order_products', array_unique(array_merge($DidN,$pid)), 900, true);
			}
			else {
				$drid = (int) $this -> input -> post('did');
				foreach($pid as $k => $v) {
					$this -> order_model -> __insert_order_products(array('ttid' => $drid,'tpid' => $v, 'tprice' => 0, 'tqty' => 0, 'tstatus' => 1));
				}
			}

			__set_error_msg(array('info' => 'Product berhasil ditambahkan.'));
			redirect(site_url('order/order_list_products/' . $type));
		}
	}
	
	function order_list_products($type,$did) {
		$view['products'] = $this -> product_model -> __get_product(2, $this -> privileges -> sesresult['ubid']);
		$dids = $this -> input -> get('did');
		$ctype = (int) $this -> input -> get('ctype');
		
		if ($dids) $did = $dids;
		
		$view['ctype'] = $ctype;
		$view['did'] = $did;
		$view['type'] = $type;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function faktur($id) {
		$view['detail'] = $this -> order_model -> __get_order_detail_approved($id);
		$view['products'] = $this -> order_model -> __get_products($id, 2);
		$this->load->view('print/' . __FUNCTION__, $view, FALSE);
	}
	
	function deliveryorder($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$do = $this -> input -> post('do');
			$addr = $this -> input -> post('addr');
			if ($this -> order_model -> __update_order($id, array('tdo' => $do, 'tdoaddr' => $addr))) {
				$view['detail'] = $this -> order_model -> __get_order_detail_approved($id);
				$view['products'] = $this -> order_model -> __get_products($id, 2);
				$this->load->view('print/do', $view, FALSE);
			}
		}
		else {
			$view['detail'] = $this -> order_model -> __get_order_detail_approved($id);
			$view['products'] = $this -> order_model -> __get_products($id, 2);
			$view['do'] = $this -> logistics_lib -> __get_logistics($view['detail'][0] -> tdo, 2);
			$view['id'] = $id;
			$this->load->view('print/' . __FUNCTION__, $view, FALSE);
		}
	}
	
	function order_delete($id) {
		if ($this -> order_model -> __delete_order($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('order'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('order'));
		}
	}
	
	function order_approved($id) {
		$id = (int) $id;
		$arr = array('tstatus' => 3, 'tapprovedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));
		if (__get_roles('OrderApproved')) {
			if ($this -> order_model -> __update_order($id, $arr)) {
				__set_error_msg(array('info' => 'Data berhasil di approved.'));
				redirect(site_url('order'));
			}
			else {
				__set_error_msg(array('error' => 'Gagal approve data !!!'));
				redirect(site_url('order'));
			}
		}
		else {
			__set_error_msg(array('error' => 'Gagal approve data !!!'));
			redirect(site_url('order'));
		}
	}
	
	function order_approved_all() {
		$apv = $this -> input -> post('apv');
		if (count($apv) > 0) {
			foreach($apv as $k => $v)
				$this -> order_model -> __update_order($v, array('tstatus' => 3));
			
			__set_error_msg(array('info' => 'Data berhasil di approved.'));
			redirect(site_url('order'));
		}
		else {
			__set_error_msg(array('error' => 'Tidak ada data yang dipilih !!!'));
			redirect(site_url('order'));
		}
	}
}
