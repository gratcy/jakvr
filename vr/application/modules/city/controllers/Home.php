<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('city_model');
		$this -> load -> library('province/province_lib');
	}

	function index() {
		$view['city'] = $this -> city_model -> __get_city();
		$this->load->view('pages/city', $view);
	}
	
	function city_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$prov = (int) $this -> input -> post('prov');
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$prov) {
				__set_error_msg(array('error' => 'Nama kota dan provinsi harus di isi !!!'));
				redirect(site_url('city' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('cpid' => $prov,'cname' => $name, 'cstatus' => $status);
				if ($this -> city_model -> __insert_city($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('city'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('city'));
				}
			}
		}
		else {
			$view['province'] = $this -> province_lib -> __get_province(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function city_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$prov = (int) $this -> input -> post('prov');
			$name = $this -> input -> post('name', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if ($id) {
				if (!$name || !$prov) {
					__set_error_msg(array('error' => 'Nama kota dan provinsi harus di isi !!!'));
					redirect(site_url('city' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cpid' => $prov, 'cname' => $name, 'cstatus' => $status);
					
					if ($this -> city_model -> __update_city($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('city'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('city'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('city'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> city_model -> __get_city_detail($id);
			$view['province'] = $this -> province_lib -> __get_province($view['detail'][0] -> cpid);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function get_city() {
		header('Content-type: application/json');
		$province_id = (int) $this -> input -> post('province_id');
		if ($province_id) {
			echo json_encode($this -> city_model -> __get_city_select($province_id));
		}
	}
	
	function city_delete($id) {
		if ($this -> city_model -> __delete_city($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('city'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('city'));
		}
	}
}
