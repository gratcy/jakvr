<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('color_model');
	}

	function index() {
		$view['color'] = $this -> color_model -> __get_color();
		$this->load->view('pages/color', $view);
	}
	
	function color_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('color' . '/' . __FUNCTION__));
			}
			else {
				$arr = array('ctype' => 5,'cname' => $name, 'cdesc' => $desc, 'cstatus' => $status);
				if ($this -> color_model -> __insert_color($arr)) {
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('color'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('color'));
				}
			}
		}
		else {
			$this->load->view('pages/'.__FUNCTION__, '');
		}
	}
	
	function color_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$status = (int) $this -> input -> post('status');
			$id = (int) $this -> input -> post('id');
			
			if ($id) {
				if (!$name || !$desc) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('color' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$arr = array('cname' => $name, 'cdesc' => $desc, 'cstatus' => $status);
					if ($this -> color_model -> __update_color($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('color'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('color'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('color'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> color_model -> __get_color_detail($id);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function color_delete($id) {
		if ($this -> color_model -> __delete_color($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('color'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('color'));
		}
	}
}
