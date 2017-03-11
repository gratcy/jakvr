<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('customer_model');
		$this -> load -> library('country/country_lib');
		$this -> load -> library('province/province_lib');
		$this -> load -> library('city/city_lib');
	}

	function index() {
		$view['customer'] = $this -> customer_model -> __get_customer();
		$this->load->view('pages/customer', $view);
	}
	
	function customer_quick_add() {
		if ($_POST) {
			$email = $this -> input -> post('email', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$ctype = (int) $this -> input -> post('ctype');
			$carea = (int) $this -> input -> post('carea');
			$country = (int) $this -> input -> post('country');
			$province = (int) $this -> input -> post('province');
			$city = (int) $this -> input -> post('city');
			$status = (int) $this -> input -> post('status');
			
			if (!$name) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('customer' . '/' . __FUNCTION__));
			}
			else {
				if ($this -> customer_model -> __check_duplicate_phone($phone) > 0) {
					__set_error_msg(array('error' => 'Customer phone duplicate !!!'));
					redirect(site_url('customer' . '/' . __FUNCTION__));
				}
				
				$arr = array('ctype' => $ctype, 'carea' => $carea, 'cname' => $name, 'caddr' => $addr, 'cemail' => $email, 'cphone' => implode('*', $phone), 'ccountry' => $country, 'cprovince' => $province, 'ccity' => $city, 'cstatus' => $status);
				if ($this -> customer_model -> __insert_customer($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('customer' . '/' . __FUNCTION__ . '?wew=' . $this -> db -> insert_id() ));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('customer' . '/' . __FUNCTION__));
				}
			}
		}
		else {
			$view['lastid'] = 0;
			if ($this -> input -> get('wew')) $view['lastid'] = (int) $this -> input -> get('wew');
			
			$view['country'] = $this -> country_lib -> __get_country(0);
			$this->load->view('tmp/'.__FUNCTION__, $view, FALSE);
		}
	}
	
	function customer_add() {
		if ($_POST) {
			$email = $this -> input -> post('email', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$ctype = (int) $this -> input -> post('ctype');
			$carea = (int) $this -> input -> post('carea');
			$country = (int) $this -> input -> post('country');
			$province = (int) $this -> input -> post('province');
			$city = (int) $this -> input -> post('city');
			$status = (int) $this -> input -> post('status');
			
			if (!$name) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('customer' . '/' . __FUNCTION__));
			}
			else {
				if ($this -> customer_model -> __check_duplicate_phone($phone) > 0) {
					__set_error_msg(array('error' => 'Customer phone duplicate !!!'));
					redirect(site_url('customer' . '/' . __FUNCTION__));
				}
				
				$arr = array('ctype' => $ctype, 'carea' => $carea, 'cname' => $name, 'caddr' => $addr, 'cemail' => $email, 'cphone' => implode('*', $phone), 'ccountry' => $country, 'cprovince' => $province, 'ccity' => $city, 'cstatus' => $status);
				if ($this -> customer_model -> __insert_customer($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('customer'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('customer'));
				}
			}
		}
		else {
			$view['country'] = $this -> country_lib -> __get_country(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function customer_update($id) {
		if ($_POST) {
			$email = $this -> input -> post('email', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$addr = $this -> input -> post('addr', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$carea = (int) $this -> input -> post('carea');
			$ctype = (int) $this -> input -> post('ctype');
			$country = (int) $this -> input -> post('country');
			$province = (int) $this -> input -> post('province');
			$city = (int) $this -> input -> post('city');
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('customer' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('ctype' => $ctype, 'carea' => $carea, 'cname' => $name, 'caddr' => $addr, 'cemail' => $email, 'cphone' => implode('*', $phone), 'ccountry' => $country, 'cprovince' => $province, 'ccity' => $city, 'cstatus' => $status);
					if ($this -> customer_model -> __update_customer($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('customer'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('customer'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('customer'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> customer_model -> __get_customer_detail($id);
			$view['country'] = $this -> country_lib -> __get_country($view['detail'][0] -> ccountry);
			$view['province'] = $this -> province_lib -> __get_province($view['detail'][0] -> cprovince);
			$view['city'] = $this -> city_lib -> __get_city($view['detail'][0] -> ccity);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function customer_delete($id) {
		if ($this -> customer_model -> __delete_customer($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('customer'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('customer'));
		}
	}
}
