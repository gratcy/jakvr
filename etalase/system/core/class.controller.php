<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

if ( $db['config']['database'] ) {
	if ( $db['config']['database'] == true ) {
		if ( file_exists( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.connect' . EXT ) ) {
			include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.connect' . EXT );
			if ($db['config']['multiple'] == true)
				include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.objectdbmultiple' . EXT );
			else
				include_once( BASEPATH . 'core/database/'.$db['default']['dbdriver'].'/class.objectdb' . EXT );
		}
		else
			include_once( $conf['pathmodule']['errors'] . '/503' . EXT );
	}
}

class controller {
	protected function controller() {
		$this -> rg = new globvar();
		self::autoload();
	}
	
	public function autoload() {
		global $conf,$autoload;
		foreach(array('libraries' => $autoload['libraries'], 'models' => $autoload['models']) as $k => $file) :
				if (count($file) > 0) {
					foreach($file as $key => $val) {
						if (file_exists($conf['pathmodule'][$k].'/'. $val . EXT)) {
							include_once( $conf['pathmodule'][$k].'/'. $val . EXT );
							if (class_exists($val)) {
								$this -> $val = new $val();
								if (method_exists($this -> $val, 'execute')) $this -> $val -> execute();
							}
						}
						else
							die('<h1>File '.$file.' not found</h1>');
					}
				}
		endforeach;
	}

	public function database($dbname='default', $reconnect=false) {
		global $db;
		if ( $db['config']['database'] ) $this -> db = new objectdb($dbname,$reconnect);
	}
	
	public function view() {
		global $conf;
		$arr = func_get_args();
		if (!$arr) die('<h1>Module view couldn\'t be empty</h1>');
		
		foreach($arr as $k => $v)
		if (file_exists($conf['pathmodule']['views'] . '/' . $conf['pathview'] . '/' . $v . EXT)) include_once($conf['pathmodule']['views'] . '/' . $conf['pathview'] . '/' . $v . EXT);
		else die('<h1>Module view doesn\'t exists</h1>');
	}
	
	public function config($file, $item) {
		global $conf, $autoload;
		if ( file_exists( BASEPATH . 'config/' . $file . EXT  ) ) {
			if (count($autoload['config']) > 0) {
				foreach($autoload['config'] as $k => $v) :
					if ( $k == $file ) 
						die('<h1>Config already autoload</h1>');
					else
						include_once( BASEPATH . 'config/' . $k . EXT );
				endforeach;
			}
			else
				include_once( BASEPATH . 'config/' . $file . EXT );
			return $$item;
		}
	}
	
	public function module($module,$file) {
		global $conf;
		if ($conf['newmodule'] == true) {
			if ($file && $module) {
				if (file_exists($conf['pathmodule'][$module].'/'. $file . EXT)) {
					include_once( $conf['pathmodule'][$module].'/'. $file . EXT );
					if (class_exists($file)) {
						$this -> $file = new $file();
						if (method_exists($this -> $file, 'execute')) $this -> $file -> execute();
					}
				}
				else
					die('<h1>Module '.$file.' doesn\'t exists</h1>');
			}
		}
		else {
			if ($file && $module && $module == 'helpers' || $module == 'models' || $module == 'libraries' || $module == 'errors' || $module == 'controllers') {
				if (file_exists($conf['pathmodule'][$module].'/'. $file . EXT)) {
					include_once( $conf['pathmodule'][$module].'/'. $file . EXT );
					if (class_exists($file)) {
						$this -> $file = new $file();
						if (method_exists($this -> $file, 'execute')) $this -> $file -> execute();
					}
				}
				else
					die('<h1>Module '.$file.' doesn\'t exists</h1>');
			}
			else
				die('<h1>Unsupported module</h1>');
		}
	}
}
