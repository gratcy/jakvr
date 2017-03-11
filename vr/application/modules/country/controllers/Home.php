<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('country_model');
	}

	function index() {
		$view['country'] = $this -> country_model -> __get_country();
		$this->load->view('pages/country', $view);
	}
	
	function country_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$code = $this -> input -> post('code', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$code) {
				__set_error_msg(array('error' => 'Nama dan kode negara harus di isi !!!'));
				redirect(site_url('country' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('ccode' => $code, 'cname' => $name, 'cstatus' => $status);
				if ($this -> country_model -> __insert_country($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('country'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('country'));
				}
			}
		}
		else
			$this->load->view('pages/'.__FUNCTION__, '');
	}
	
	function country_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$name = $this -> input -> post('name', TRUE);
			$code = $this -> input -> post('code', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if ($id) {
				if (!$name || !$code) {
					__set_error_msg(array('error' => 'Nama dan kode negara harus di isi !!!'));
					redirect(site_url('country' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('ccode' => $code, 'cname' => $name, 'cstatus' => $status);
					if ($this -> country_model -> __update_country($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('country'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('country'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('country'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> country_model -> __get_country_detail($id);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function country_delete($id) {
		if ($this -> country_model -> __delete_country($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('country'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('country'));
		}
	}
}
