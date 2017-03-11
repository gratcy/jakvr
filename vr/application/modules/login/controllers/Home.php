<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('login_model');
	}

	function index() {
		$this->load->view('login', '');
	}
	
	function logging() {
		if ($_POST) {
			$uemail = $this -> input -> post('uemail', true);
			$upass = $this -> input -> post('upass', true);
			$remember = (int) $this -> input -> post('remember');
			
			if (!$uemail || !$upass) {
				__set_error_msg(array('error' => 'Email dan password harus di isi !!!'));
				redirect(site_url('login'));
			}
			else {
				$login = $this -> login_model -> __get_login($uemail, $upass);
				if ($login) {
					$this -> login_model -> __update_history_login($login[0] -> uid, array('ulastlogin' => ip2long($_SERVER['REMOTE_ADDR']) . '*' . time()));
					$permission = $this -> login_model -> __get_permission($login[0] -> ugid);
					
					$expire = ($remember == 1 ? 3600*6 : 7200);
					$lLogin = array('uid' => $login[0] -> uid, 'ubid' => 2, 'ubname' => __get_branch(2, 1), 'uemail' => $uemail, 'ugid' => $login[0] -> ugid, 'unick' => $login[0] -> unick, 'permission' => $permission, 'ldate' => time(), 'lip' => ip2long($_SERVER['REMOTE_ADDR']), 'skey' => md5(sha1($login[0] -> ugid.$uemail) . 'dist'), 'uregdate' => $login[0] -> ucreated, 'expire' => $expire);
					$this -> cache -> memcached -> save('__login', $lLogin, $expire, TRUE);
					
					unset($lLogin['permission']);
					
					$cookie = array(
						'name'   => '__palma',
						'value'  => serialize($lLogin),
						'expire' => $expire,
						'domain' => '',
						'path'   => '/',
						'prefix' => ''
					);
					
					set_cookie($cookie);
					
					redirect(site_url(''));
				}
				else {
					__set_error_msg(array('error' => 'Email dan password tidak sesuai !!!'));
					redirect(site_url('login'));
				}
			}
		}
		else
			redirect(site_url('login'));
	}
	
	function logout() {
		$this -> cache -> memcached -> delete('__login', true);
		delete_cookie('__palma');
		redirect('login');
	}
}
