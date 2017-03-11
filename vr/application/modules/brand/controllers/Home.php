<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('brand_model');
	}

	function index() {
		$view['brand'] = $this -> brand_model -> __get_brand();
		$this->load->view('pages/brand', $view);
	}
	
	function brand_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('brand' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('bname' => $name, 'bdesc' => $desc, 'bstatus' => $status);
				if ($this -> brand_model -> __insert_brand($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('brand'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('brand'));
				}
			}
		}
		else {
			$this->load->view('pages/'.__FUNCTION__, '');
		}
	}
	
	function brand_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('brand' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('bname' => $name, 'bdesc' => $desc, 'bstatus' => $status);
					if ($this -> brand_model -> __update_brand($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('brand'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('brand'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('brand'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> brand_model -> __get_brand_detail($id);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function brand_delete($id) {
		if ($this -> brand_model -> __delete_brand($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('brand'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('brand'));
		}
	}
}
