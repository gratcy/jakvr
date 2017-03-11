<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

final class views extends controller {
	function views() {
		global $conf, $db, $autoload, $routes;
		parent::module('libraries','library_template');
		ob_start();
		if (__custvalidation('/\/process\/(\w+)/i', $_SERVER['REQUEST_URI'])) {
			if (__get_requesturi(1) == 'plugins') {
				$action = BASEPATH . 'plugins/'.__get_requesturi(2).'/controllers/' . __get_requesturi(3) . EXT;
				$controller = __get_requesturi(3);
			}
			else {
				$action = BASEPATH . '/controllers/' . __get_requesturi(1) . EXT;
				$controller = __get_requesturi(1);
			}
			
			if ( file_exists( $action ) ) {
				include_once( $action );
				if ( class_exists( $controller ) ) {
					$exec = new $controller;
					if (method_exists($exec, 'execute')) $exec -> execute();
				}
				else
					parent::module('errors','503');
			}
			else
				parent::module('errors','503');
		}
		else {
			$loadtemplate = $this -> library_template -> setting_template();
			echo($this -> library_template -> load_template($loadtemplate['main']));
		}
		
		$loadtemplate = null;
		$conf = null;
		$db = null;
		$autoload = null;
		$routes = null;
		$this -> library_template = null;
		$this -> library_mobile_detect = null;
		ob_end_flush();
		ob_end_flush();
	}
}
