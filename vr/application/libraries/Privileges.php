<?php
class Privileges {
	public $login = false;
	public $sesresult;
	private $_ci;

    function __construct() {
		$this -> _ci =& get_instance();
        if (!session_id()) {
            session_name( 'DistPal' );
            session_start();
        }
        if ($this -> _ci -> cache -> memcached -> get('__login', true)) {
			$this -> sesresult = $this -> _ci -> cache -> memcached -> get('__login', true);
			$this -> login = true;
		}
        self::__check_login();
    }
    
	function __check_login() {
		if ($this -> _ci -> uri -> segment(1) !== 'login') {
			if (!$this -> login) redirect(site_url('login'));
		}
		else {
			if ($this -> _ci -> uri -> segment(2) !== 'logout') {
				if ($this -> login) redirect(site_url(''));
			}
		}
	}
}
