<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class variation_all extends controller {
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('libraries', 'library_variation');
		parent::module('models', 'models_products');
	}
	
	function execute() {
		$categories = $this -> rg -> post('categories');
		$order = $this -> rg -> post('order');
		$sql = $this -> library_variation -> __get_variation($categories,$order);
		__ajax_doaction($sql);
	}
}
