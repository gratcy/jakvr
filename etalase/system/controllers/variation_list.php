<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class variation_list extends controller {
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_products');
	}
	
	function execute() {
		header('Content-type: application/json');
		$sql = $this -> models_products -> __get_list_variation();
		$res = array();
		while($r = $this -> db -> result_sql($sql))
			$res[] = stripslashes($r['pname']);
		__ajax_doaction(json_encode($res));
	}
}
