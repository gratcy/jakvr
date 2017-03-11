<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> library('users_lib');
		$this -> load -> model('users_model');
	}

	function index() {
		$view['users'] = $this -> users_model -> __get_users();
		$this->load->view('pages/users', $view);
	}
	
	function users_add() {
		if ($_POST) {
			$uemail = $this -> input -> post('uemail', true);
			$newpass = $this -> input -> post('newpass', true);
			$confpass = $this -> input -> post('confpass', true);
			$group = (int) $this -> input -> post('group');
			$status = (int) $this -> input -> post('status');
			
			if ($uemail && $group) {
				if ($newpass != $confpass) {
					__set_error_msg(array('error' => 'Password dan password konfirmasi tidak sesuai !!!'));
					redirect(site_url('users/users_add'));
				}
				else if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
					__set_error_msg(array('error' => 'Penulisan email salah !!!'));
					redirect(site_url('users/users_add'));
				}
				else {
					if ($this -> users_model -> __check_users($uemail) > 0) {
						__set_error_msg(array('error' => 'Email sudah terdaftar !!!'));
						redirect(site_url('users/users_add'));
					}
					else {
						if ($this -> users_model -> __insert_users($uemail, $confpass, $group, $status)) {
							__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
							redirect(site_url('users'));
						}
						else {
							__set_error_msg(array('error' => 'Gagal tambah data !!!'));
							redirect(site_url('users/users_add'));
						}
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('users/users_add'));
			}
		}
		else {
			$data['groups'] = $this -> users_lib -> __get_groups();
			$this->load->view('pages/users_add', $data);
		}
	}
	
	function users_update($id) {
		if ($_POST) {
			$this -> load -> model('settings/settings_model');
			$uemail = $this -> input -> post('uemail', true);
			$newpass = $this -> input -> post('newpass', true);
			$confpass = $this -> input -> post('confpass', true);
			$group = (int) $this -> input -> post('group');
			$id = (int) $this -> input -> post('id');
			$status = (int) $this -> input -> post('status');
			
			if ($uemail) {
				if ($newpass) {
					if ($newpass != $confpass) {
						__set_error_msg(array('error' => 'Password dan password konfirmasi tidak sesuai !!!'));
						redirect(site_url('users/users_update/' . $id));
					}
					else
						$this -> settings_model -> __update_password($newpass, $id);
					$this -> users_model -> __update_users($uemail, $id, $group, $status);
					__set_error_msg(array('info' => 'Data berhasil di ubah.'));
					redirect(site_url('users'));
				}
				else {
					$this -> users_model -> __update_users($uemail, $id, $group, $status);
					__set_error_msg(array('info' => 'Data berhasil di ubah.'));
					redirect(site_url('users'));
				}
				
			}
			else {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('users/users_update/' . $id));
			}
		}
		else {
			$data['id'] = $id;
			$data['users'] = $this -> users_model -> __get_detail_users($id);
			$data['groups'] = $this -> users_lib -> __get_groups($data['users'][0] -> ugid);
			$this->load->view('pages/users_update', $data);
		}
	}
	
	function users_delete($id) {
		if ($this -> users_model -> __delete_users($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('users'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('users'));
		}
	}
	
	function users_group() {
		$view['group'] = $this -> users_model -> __get_users_group();
		$this->load->view('pages/users_group', $view);
	}
	
	function users_group_update($id) {
		if ($_POST) {
			$name = $this -> input -> post('name', true);
			$desc = $this -> input -> post('desc', true);
			$perm = $this -> input -> post('perm');
			$id = (int) $this -> input -> post('id');
			$status = (int) $this -> input -> post('status');
			
			if (!$id) {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('users/users_group_update/' . $id));
			}
			else if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Nama dan deskripsi harus di isi !!!'));
				redirect(site_url('users/users_group_update/' . $id));
			}
			else {
				$group = array('uname' => $name, 'udesc' => $desc, 'ustatus' => $status);
				if ($this -> users_model -> __update_users_group($id, $group)) {
					foreach($perm as $k => $v) $this -> users_model -> __update_permission($id, $k, $v);
					__set_error_msg(array('info' => 'Data berhasil diubah.'));
					redirect(site_url('users/users_group'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
					redirect(site_url('users/users_group_update/' . $id));
				}
			}
		}
		else {
			$view['id'] = $id;
			$view['permission'] = $this -> users_model -> __get_permission(2,$id);
			$view['group'] = $this -> users_model -> __get_detail_users_group($id);
			$this->load->view('pages/users_group_update', $view);
		}
	}
	
	function users_group_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', true);
			$desc = $this -> input -> post('desc', true);
			$status = (int) $this -> input -> post('status');
			$perm = $this -> input -> post('perm');
			if (!$name || !$desc) {
				__set_error_msg(array('error' => 'Nama dan deskripsi harus di isi !!!'));
				redirect(site_url('users/users_group'));
			}
			else {
				$group = array('uname' => $name, 'udesc' => $desc, 'ustatus' => $status);
				if ($this -> users_model -> __insert_users_group($group)) {
					$lastID = $this -> db -> insert_id();
					foreach($perm as $k => $v) {
						$arr = array('ugid' => $lastID, 'upid' => $k, 'uaccess' => $v);
						$this -> users_model -> __insert_permission($arr);
					}
					
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('users/users_group'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('users/users_group'));
				}
			}
		}
		else {
			$data['permission'] = $this -> users_model -> __get_permission(1,0);
			$this->load->view('pages/users_group_add', $data);
		}
	}
	
	function users_group_delete($id) {
		if ($this -> users_model -> __delete_users_group($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('users/users_group'));
		}
		else {
			$this -> session -> __delete_users_group(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('users/users_group'));
		}
	}
}
