<?php
class library_meta extends controller {
	function __construct() {
		parent::database();
	}
	
	function __get_title() {
		global $conf;
		$title = $conf['site']['title'];
		return $title;
	}
	
	function __get_desc() {
		global $conf;
		$desc = $conf['site']['desc'];
		return (isset($desc) ? str_replace(' ...','',__text_cuts($desc,160)) : '');
	}
	
	function __get_images_share() {
		return $conf['site']['__tpl'] . '/assets/logo.png';
	}
}
