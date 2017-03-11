<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('product_model');
		$this -> load -> library('brand/brand_lib');
		$this -> load -> library('categories/categories_lib');
	}

	function index() {
		$view['product'] = $this -> product_model -> __get_product();
		$this->load->view('pages/product', $view);
	}
	
	function product_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$cid = (int) $this -> input -> post('cid');
			$bid = (int) $this -> input -> post('bid');
			$price = $this -> input -> post('price');
			$pricebase = $this -> input -> post('pricebase');
			$priceseller = $this -> input -> post('priceseller');
			$status = (int) $this -> input -> post('status');
			
			$pricebase = str_replace(',','', $pricebase);
			$price = str_replace(',','', $price);
			$priceseller = str_replace(',','', $priceseller);
			
			if (!$name || !$desc || !$cid || !$bid) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('product' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('pcid' => $cid, 'pdate' => time(), 'pbid' => $bid,'pname' => $name, 'pdesc' => $desc, 'pprice' => $price, 'ppricebase' => $pricebase, 'ppriceseller' => $priceseller, 'pstatus' => $status);
				if ($this -> product_model -> __insert_product($arr, 1)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('product'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('product'));
				}
			}
		}
		else {
			$view['brand'] = $this -> brand_lib -> __get_brand(0);
			$view['categories'] = $this -> categories_lib -> __get_categories(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function product_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$cid = (int) $this -> input -> post('cid');
			$bid = (int) $this -> input -> post('bid');
			$tmpprice = $this -> input -> post('tmpprice');
			$tmppricebase = $this -> input -> post('tmppricebase');
			$tmppriceseller = $this -> input -> post('tmppriceseller');
			$price = $this -> input -> post('price');
			$pricebase = $this -> input -> post('pricebase');
			$priceseller = $this -> input -> post('priceseller');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			$tmpprice = str_replace(',','', $tmpprice);
			$tmppricebase = str_replace(',','', $tmppricebase);
			$tmppriceseller = str_replace(',','', $tmppriceseller);
			$price = str_replace(',','', $price);
			$pricebase = str_replace(',','', $pricebase);
			$priceseller = str_replace(',','', $priceseller);
			
			if ($id) {
				if (!$name || !$desc || !$cid || !$bid) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('product' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('pcid' => $cid, 'pbid' => $bid,'pname' => $name, 'pdesc' => $desc, 'pprice' => $price, 'ppricebase' => $pricebase, 'ppriceseller' => $priceseller, 'pstatus' => $status);
					if ($this -> product_model -> __update_product($id, $arr)) {
						if ($price !== $tmpprice || $pricebase !== $tmppricebase || $priceseller !== $tmppriceseller) {
							$this -> product_model -> __insert_product(array('ppid' => $id, 'pdate' => time(), 'pprice' => $price, 'ppricebase' => $pricebase, 'ppriceseller' => $priceseller, 'pstatus' => 1), 2);
						}
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('product'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('product'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('product'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> product_model -> __get_product_detail($id);
			$view['brand'] = $this -> brand_lib -> __get_brand($view['detail'][0] -> pbid);
			$view['categories'] = $this -> categories_lib -> __get_categories($view['detail'][0] -> pcid);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function product_delete($id) {
		if ($this -> product_model -> __delete_product($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('product'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('product'));
		}
	}
}
