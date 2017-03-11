<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('country/country_lib');
		$this -> load -> library('province/province_lib');
		$this -> load -> library('city/city_lib');
		$this -> load -> model('branch_model');
	}

	function index() {
		$view['branch'] = $this -> branch_model -> __get_branch();
		$this->load->view('pages/branch', $view);
	}
	
	function branch_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$country = (int) $this -> input -> post('country');
			$province = (int) $this -> input -> post('province');
			$city = (int) $this -> input -> post('city');
			$status = (int) $this -> input -> post('status');

			if (!$name || !$addr) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('branch' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('bname' => $name, 'bphone' => implode('*', $phone), 'bcountry' => $country, 'bprovince' => $province, 'bcity' => $city, 'baddr' => $addr, 'bstatus' => $status);
				if ($this -> branch_model -> __insert_branch($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('branch'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('branch'));
				}
			}
		}
		else {
			$view['country'] = $this -> country_lib -> __get_country(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function branch_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$country = (int) $this -> input -> post('country');
			$province = (int) $this -> input -> post('province');
			$city = (int) $this -> input -> post('city');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$addr) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('branch' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('bname' => $name, 'bphone' => implode('*', $phone), 'bcountry' => $country, 'bprovince' => $province, 'bcity' => $city, 'baddr' => $addr, 'bstatus' => $status);
					if ($this -> branch_model -> __update_branch($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('branch'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('branch'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('branch'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> branch_model -> __get_branch_detail($id);
			$view['country'] = $this -> country_lib -> __get_country($view['detail'][0] -> bcountry);
			$view['province'] = $this -> province_lib -> __get_province($view['detail'][0] -> bprovince);
			$view['city'] = $this -> city_lib -> __get_city($view['detail'][0] -> bcity);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function branch_delete($id) {
		if ($this -> branch_model -> __delete_branch($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('branch'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('branch'));
		}
	}
}
