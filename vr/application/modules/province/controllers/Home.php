<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('province_model');
		$this -> load -> library('country/country_lib');
	}

	function index() {
		$view['province'] = $this -> province_model -> __get_province();
		$this->load->view('pages/province', $view);
	}
	
	function province_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$pcid = (int) $this -> input -> post('pcid', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$pcid) {
				__set_error_msg(array('error' => 'Nama provinsi dan negara harus di isi !!!'));
				redirect(site_url('province' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('pcid' => $pcid,'pname' => $name, 'pstatus' => $status);
				if ($this -> province_model -> __insert_province($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('province'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('province'));
				}
			}
		}
		else {
			$view['country'] = $this -> country_lib -> __get_country(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function province_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$name = $this -> input -> post('name', TRUE);
			$pcid = (int) $this -> input -> post('pcid', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if ($id) {
				if (!$name || !$pcid) {
					__set_error_msg(array('error' => 'Nama provinsi dan negara harus di isi !!!'));
					redirect(site_url('province' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('pcid' => $pcid,'pname' => $name, 'pstatus' => $status);
					
					if ($this -> province_model -> __update_province($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('province'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('province'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('province'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> province_model -> __get_province_detail($id);
			$view['country'] = $this -> country_lib -> __get_country($view['detail'][0] -> pcid);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function get_province() {
		header('Content-type: application/json');
		$country_id = (int) $this -> input -> post('country_id');
		if ($country_id) {
			echo json_encode($this -> province_model -> __get_province_select($country_id));
		}
	}
	
	function province_delete($id) {
		if ($this -> province_model -> __delete_province($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('province'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('province'));
		}
	}
}
