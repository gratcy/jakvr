<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('reffer_model');
		$this -> load -> library('reffer/reffer_lib');
	}

	function index() {
		$view['reffer'] = $this -> reffer_model -> __get_reffer();
		$this->load->view('pages/reffer', $view);
	}
	
	function reffer_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('reffer' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('ctype' => 2,'cname' => $name, 'cdesc' => $desc, 'cstatus' => $status);
				if ($this -> reffer_model -> __insert_reffer($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('reffer'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('reffer'));
				}
			}
		}
		else {
			$this->load->view('pages/'.__FUNCTION__, '');
		}
	}
	
	function reffer_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('reffer' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cname' => $name, 'cdesc' => $desc, 'cstatus' => $status);
					if ($this -> reffer_model -> __update_reffer($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('reffer'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('reffer'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('reffer'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> reffer_model -> __get_reffer_detail($id);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function reffer_delete($id) {
		if ($this -> reffer_model -> __delete_reffer($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('reffer'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('reffer'));
		}
	}
}
