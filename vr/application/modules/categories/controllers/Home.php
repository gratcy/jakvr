<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('categories_model');
		$this -> load -> library('categories/categories_lib');
	}

	function index() {
		$view['categories'] = $this -> categories_model -> __get_categories();
		$this->load->view('pages/categories', $view);
	}
	
	function categories_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$warranty = (int) $this -> input -> post('warranty');
			
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('categories' . '/' . __FUNCTION__));
			}
			else if ($warranty < 0) {
				__set_error_msg(array('error' => 'Garansi harus lebih dari 0 !!!'));
				redirect(site_url('categories' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('ctype' => 1,'cname' => $name, 'cdesc' => $desc, 'cwarranty' => $warranty, 'cstatus' => $status);
				if ($this -> categories_model -> __insert_categories($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('categories'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('categories'));
				}
			}
		}
		else {
			$this->load->view('pages/'.__FUNCTION__, '');
		}
	}
	
	function categories_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			$warranty = (int) $this -> input -> post('warranty');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('categories' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if ($warranty < 0) {
					__set_error_msg(array('error' => 'Garansi harus lebih dari 0 !!!'));
					redirect(site_url('categories' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cname' => $name, 'cdesc' => $desc, 'cwarranty' => $warranty, 'cstatus' => $status);
					if ($this -> categories_model -> __update_categories($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('categories'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('categories'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('categories'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> categories_model -> __get_categories_detail($id);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function categories_delete($id) {
		if ($this -> categories_model -> __delete_categories($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('categories'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('categories'));
		}
	}
}
