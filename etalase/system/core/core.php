<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class core {
	private $loaddefaultview;
	
	function __construct() {
		self::defaultview();
	}

	private function defaultview() {
		global $routes, $conf;
		if (file_exists( $conf['pathmodule']['controllers'] . '/' . $routes['main_controller'] . EXT )) {
			include_once( $conf['pathmodule']['controllers'] . '/' . $routes['main_controller'] . EXT );
			if (class_exists($routes['main_controller'])) {
				$this -> loaddefaultview = new $routes['main_controller'];
				if (method_exists($this -> loaddefaultview,  'execute')) $this -> loaddefaultview -> execute();
			}
			else
				include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
		}
		else
			include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
	}
}
