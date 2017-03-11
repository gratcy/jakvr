<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('receiving_model');
		$this -> load -> model('product/product_model');
		$this -> load -> model('request/request_model');
		$this -> load -> library('vendor/vendor_lib');
		$this -> load -> library('request/request_lib');
	}

	function index() {
		($this -> cache -> memcached -> get('__receiving_products', true) ? $this -> cache -> memcached -> delete('__receiving_products', true) : NULL);
		$view['receiving'] = $this -> receiving_model -> __get_receiving($this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/receiving', $view);
	}
	
	function receiving_add() {
		if ($_POST) {
			$status = (int) $this -> input -> post('status');
			$rtype = (int) $this -> input -> post('rtype');
			$vendor = (int) $this -> input -> post('vendor');
			$products = $this -> input -> post('products');
			$docno = $this -> input -> post('docno', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$waktu = $this -> input -> post('waktu', TRUE);

			if (!$vendor || !$docno || !$waktu || !$rtype) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('receiving' . '/' . __FUNCTION__));
			}
			else {
				$waktu = explode('/', $waktu);
				$waktu = $waktu[2].'-'.$waktu[1].'-'.$waktu[0];
				if ($this -> receiving_model -> __insert_receiving(array('rbid' => $this -> privileges -> sesresult['ubid'], 'rtype' => $rtype, 'rvendor' => $vendor, 'rdocno' => $docno, 'rdate' => strtotime($waktu), 'rdesc' => $desc, 'rstatus' => $status, 'rcreatedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time()))))) {
					$rrid = $this -> db -> insert_id();
					foreach($products as $k => $v) {
						$price = $this -> product_model -> __get_product_price($k);
						$this -> receiving_model -> __insert_receiving_products(array('riid' => $rrid,'rpid' => $k, 'rprice' => $price[0] -> pprice, 'rpricebase' => $price[0] -> ppricebase,'rqty' => $v,'rstatus' => 1));
					}
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('receiving'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('receiving'));
				}
			}
		}
		else {
			$this->load->view('pages/'.__FUNCTION__, array());
		}
	}
	
	function receiving_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$rtype = (int) $this -> input -> post('rtype');
			$status = (int) $this -> input -> post('status');
			$app = (int) $this -> input -> post('app');
			$vendor = (int) $this -> input -> post('vendor');
			$products = $this -> input -> post('products', TRUE);
			$docno = $this -> input -> post('docno', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$waktu = $this -> input -> post('waktu', TRUE);
			
			if ($id) {
				if (!$vendor || !$docno || !$waktu) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('receiving' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					if ($app == 1) $status = 3;
					
					$waktu = explode('/', $waktu);
					$waktu = $waktu[2].'-'.$waktu[1].'-'.$waktu[0];
				
					$arr = array('rvendor' => $vendor, 'rdocno' => $docno, 'rdate' => strtotime($waktu), 'rdesc' => $desc, 'rstatus' => $status, 'rmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));
					if ($app == 1) $arr += array('rapprovedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));

					if ($this -> receiving_model -> __update_receiving($id,$arr)) {
						foreach($products as $k => $v) :
							$this -> receiving_model -> __update_receiving_products($k, array('rqty' => $v));
							if ($app == 1) {
								$pid = $this -> receiving_model -> __get_receiving_products_detail($k);
								$iv = $this -> receiving_model -> __get_inventory_detail($pid[0] -> rpid, $this -> privileges -> sesresult['ubid']);
								$this -> receiving_model -> __update_inventory($pid[0] -> rpid,array('istockin' => ($iv[0] -> istockin+$v),'istock' => ($iv[0] -> istock + $v)), $this -> privileges -> sesresult['ubid']);
							}
						endforeach;
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('receiving'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('receiving'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('receiving'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> receiving_model -> __get_receiving_detail($id);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function receiving_detail($id) {
		$view['detail'] = $this -> receiving_model -> __get_receiving_detail_approved($id);
		$view['products'] = $this -> receiving_model -> __get_products($id, 2);
		$this->load->view('pages/'.__FUNCTION__, $view);
	}
	
	function receiving_products_delete($type) {
		$pid = (int) $this -> input -> post('pid');
		$did = (int) $this -> input -> post('did');
		
		if ($pid) {
			if ($type == 1) {
				$products = $this -> cache -> memcached -> get('__receiving_products', true);
				$arr = array();
				foreach($products as $v)
					if ($v <> $pid) $arr[] = $v;
				$this -> cache -> memcached -> save('__receiving_products', $arr, 900, true);
			}
			else
				if ($did) $this -> receiving_model -> __delete_receiving_product($did,$pid);
		}
	}
	
	function receiving_list_products($type,$did) {
		$view['products'] = $this -> product_model -> __get_product(2, $this -> privileges -> sesresult['uid']);
		$dids = $this -> input -> get('did');
		
		if ($dids) $did = $dids;
		
		$view['did'] = $did;
		$view['type'] = $type;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function receiving_products_add($type) {
		$pid = $this -> input -> post('pid');
		if (!$pid) {
			__set_error_msg(array('error' => 'Product harus dipilih !!!'));
			redirect(site_url('receiving/receiving_list_products/' . $type));
		}
		else {
			if ($type == 1) {
				$DidN = (!$this -> cache -> memcached -> get('__receiving_products', true) ? array() : $this -> cache -> memcached -> get('__receiving_products', true));
				$wew = $this -> cache -> memcached -> save('__receiving_products', array_unique(array_merge($DidN,$pid)), 900, true);
			}
			else {
				$drid = (int) $this -> input -> post('did');
				foreach($pid as $k => $v) {
					$price = $this -> product_model -> __get_product_price($v);
					$this -> receiving_model -> __insert_receiving_products(array('riid' => $drid,'rpid' => $v, 'rqty' => 0, 'rprice' => $price[0] -> pprice, 'rpricebase' => $price[0] -> ppricebase, 'rstatus' => 1));
				}
			}

			__set_error_msg(array('info' => 'Product berhasil ditambahkan.'));
			redirect(site_url('receiving/receiving_list_products/' . $type));
		}
	}
	
	function receiving_products($did,$rtype=0) {
		if ($did) {
			$view['type'] = 2;
			$view['did'] = $did;
			$view['products'] = $this -> receiving_model -> __get_products($did, 2);
		}
		else {
			$pid = $this -> cache -> memcached -> get('__receiving_products', true);
			if (!$pid) return false;
			$pid = implode(',',$pid);

			if ($pid) {
				$view['type'] = 1;
				$view['products'] = $this -> receiving_model -> __get_products($pid, 1);
			}
		}
		$view['rtype'] = $rtype;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function receiving_types($type,$id) {
		$res = '<select name="vendor" class="form-control" id="vendor">';
		if ($type == 1)
			$res .= $this -> vendor_lib -> __get_vendor($id);
		else
			$res .= $this -> request_lib -> __get_request($id, $this -> privileges -> sesresult['ubid'],2);
		$res .= '</select>';
		echo $res;
	}
	
	function request_products_receiving($did) {
		$view['products'] = $this -> request_model -> __get_products($did, 2);
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function receiving_delete($id) {
		if ($this -> receiving_model -> __delete_receiving($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('receiving'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('receiving'));
		}
	}
}
