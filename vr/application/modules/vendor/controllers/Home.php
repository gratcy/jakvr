<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('vendor_model');
		$this -> load -> library('country/country_lib');
		$this -> load -> library('province/province_lib');
		$this -> load -> library('city/city_lib');
	}

	function index() {
		$view['vendor'] = $this -> vendor_model -> __get_vendor();
		$this->load->view('pages/vendor', $view);
	}
	
	function vendor_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$country = (int) $this -> input -> post('country');
			$province = (int) $this -> input -> post('province');
			$city = (int) $this -> input -> post('city');
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$addr || !$country || !$province || !$city) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('vendor' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('vname' => $name, 'vaddr' => $addr, 'vphone' => implode('*', $phone), 'vcountry' => $country, 'vprovince' => $province, 'vcity' => $city, 'vstatus' => $status);
				if ($this -> vendor_model -> __insert_vendor($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('vendor'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('vendor'));
				}
			}
		}
		else {
			$view['country'] = $this -> country_lib -> __get_country(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function vendor_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$country = (int) $this -> input -> post('country');
			$province = (int) $this -> input -> post('province');
			$city = (int) $this -> input -> post('city');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$addr || !$country || !$province || !$city) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('vendor' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('vname' => $name, 'vaddr' => $addr, 'vphone' => implode('*', $phone), 'vcountry' => $country, 'vprovince' => $province, 'vcity' => $city, 'vstatus' => $status);
					if ($this -> vendor_model -> __update_vendor($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('vendor'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('vendor'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('vendor'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> vendor_model -> __get_vendor_detail($id);
			$view['country'] = $this -> country_lib -> __get_country($view['detail'][0] -> vcountry);
			$view['province'] = $this -> province_lib -> __get_province($view['detail'][0] -> vprovince);
			$view['city'] = $this -> city_lib -> __get_city($view['detail'][0] -> vcity);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function vendor_delete($id) {
		if ($this -> vendor_model -> __delete_vendor($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('vendor'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('vendor'));
		}
	}
}
