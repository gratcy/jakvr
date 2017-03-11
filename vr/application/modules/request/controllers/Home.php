<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('request_model');
		$this -> load -> library('branch/branch_lib');
		$this -> load -> model('product/product_model');
	}

	function index() {
		($this -> cache -> memcached -> get('__request_products', true) ? $this -> cache -> memcached -> delete('__request_products', true) : NULL);
		$view['request'] = $this -> request_model -> __get_request($this -> privileges -> sesresult['ubid']);
		$this->load->view('pages/request', $view);
	}
	
	function request_add() {
		if ($_POST) {
			$status = (int) $this -> input -> post('status');
			$products = $this -> input -> post('products');
			$bfrom = ($this -> input -> post('bfrom') ? (int) $this -> input -> post('bfrom') : $this -> privileges -> sesresult['ubid']);
			$bto = (int) $this -> input -> post('bto');
			$desc = $this -> input -> post('desc', TRUE);

			if (!$bfrom || !$bto) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('request' . '/' . __FUNCTION__));
			}
			else if ($bfrom == $bto) {
				__set_error_msg(array('error' => 'Cabang dari dan tujuan tidak boleh sama !!!'));
				redirect(site_url('request' . '/' . __FUNCTION__));
			}
			else {
				$rno = 'RQ01' . date('dmy') .str_pad(($this -> request_model -> __get_total_today_request($this -> privileges -> sesresult['ubid'])+1), 3, "0", STR_PAD_LEFT);

				if ($this -> request_model -> __insert_request(array('rfrom' => $bfrom, 'rto' => $bto, 'rno' => $rno, 'rdate' => time(), 'rdesc' => $desc, 'rstatus' => $status, 'rcreatedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time()))))) {
					$rrid = $this -> db -> insert_id();
					foreach($products as $k => $v)
						$this -> request_model -> __insert_request_products(array('riid' => $rrid,'rpid' => $k,'rqty' => $v,'rstatus' => 1, 'rcreatedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'nick' => $this -> privileges -> sesresult['unick'], 'date' => time()))));
						
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('request'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('request'));
				}
			}
		}
		else {
			$view['bfrom'] = $this -> branch_lib -> __get_branch($this -> privileges -> sesresult['ubid'],1);
			$view['bto'] = $this -> branch_lib -> __get_branch(0,1);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function request_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$app = (int) $this -> input -> post('app');
			$status = (int) $this -> input -> post('status');
			$products = $this -> input -> post('products');
			$bfrom = ($this -> input -> post('bfrom') ? (int) $this -> input -> post('bfrom') : $this -> privileges -> sesresult['ubid']);
			$bto = (int) $this -> input -> post('bto');
			$desc = $this -> input -> post('desc', TRUE);
			
			if ($id) {
				if (!$bfrom || !$bto) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('request' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if ($bfrom == $bto) {
					__set_error_msg(array('error' => 'Cabang dari dan tujuan tidak boleh sama !!!'));
					redirect(site_url('request' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					if ($app == 1) $status = 3;
					
					$arr = array('rdesc' => $desc, 'rstatus' => $status, 'rmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time())));
					if ($app == 1) $arr += array('rapprovedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time())));

					if ($this -> request_model -> __update_request($id,$arr)) {
						foreach($products as $k => $v)
							$this -> request_model -> __update_request_products($k, array('rqty' => $v, 'rmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'date' => time()))));
							
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('request'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('request'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('request'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> request_model -> __get_request_detail($id);
			$view['bfrom'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> rfrom,1);
			$view['bto'] = $this -> branch_lib -> __get_branch($view['detail'][0] -> rto,1);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function request_detail($id) {
		$view['detail'] = $this -> request_model -> __get_request_detail_approved($id);
		$view['products'] = $this -> request_model -> __get_products($id, 2);
		$this->load->view('pages/'.__FUNCTION__, $view);
	}
	
	function request_products_delete($type) {
		$pid = (int) $this -> input -> post('pid');
		$did = (int) $this -> input -> post('did');
		
		if ($pid) {
			if ($type == 1) {
				$products = $this -> cache -> memcached -> get('__request_products', true);
				$arr = array();
				foreach($products as $v)
					if ($v <> $pid) $arr[] = $v;
				$this -> cache -> memcached -> save('__request_products', $arr, 900, true);
			}
			else
				if ($did) $this -> request_model -> __delete_request_product($did,$pid);
		}
	}
	
	function request_list_products($type,$did) {
		$view['products'] = $this -> product_model -> __get_product(2, $this -> privileges -> sesresult['ubid']);
		$dids = $this -> input -> get('did');
		
		if ($dids) $did = $dids;
		
		$view['did'] = $did;
		$view['type'] = $type;
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function request_products_add($type) {
		$pid = $this -> input -> post('pid');
		if (!$pid) {
			__set_error_msg(array('error' => 'Product harus dipilih !!!'));
			redirect(site_url('request/request_list_products/' . $type));
		}
		else {
			if ($type == 1) {
				$DidN = (!$this -> cache -> memcached -> get('__request_products', true) ? array() : $this -> cache -> memcached -> get('__request_products', true));
				$wew = $this -> cache -> memcached -> save('__request_products', array_unique(array_merge($DidN,$pid)), 900, true);
			}
			else {
				$drid = (int) $this -> input -> post('did');
				foreach($pid as $k => $v) {
					$price = $this -> product_model -> __get_product_price($v);
					$this -> request_model -> __insert_request_products(array('riid' => $drid,'rpid' => $v, 'rqty' => 0, 'rprice' => $price[0] -> pprice, 'rpricebase' => $price[0] -> ppricebase, 'rstatus' => 1));
				}
			}

			__set_error_msg(array('info' => 'Product berhasil ditambahkan.'));
			redirect(site_url('request/request_list_products/' . $type));
		}
	}
	
	function request_products($did) {
		if ($did) {
			$view['type'] = 2;
			$view['did'] = $did;
			$view['products'] = $this -> request_model -> __get_products($did, 2);
		}
		else {
			$pid = $this -> cache -> memcached -> get('__request_products', true);
			if (!$pid) return false;
			$pid = implode(',',$pid);

			if ($pid) {
				$view['type'] = 1;
				$view['products'] = $this -> request_model -> __get_products($pid, 1);
			}
		}
		$this->load->view('tmp/' . __FUNCTION__, $view, FALSE);
	}
	
	function request_delete($id) {
		if ($this -> request_model -> __delete_request($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('request'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('request'));
		}
	}
}
