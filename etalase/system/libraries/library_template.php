<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class library_template extends controller {
	function __construct() {
		parent::controller();
		parent::module('libraries','library_xmltoarray');
		parent::module('libraries','library_meta');
		parent::module('libraries','library_variation');
		parent::module('libraries','library_categories');
	}

	function setting_template() {
		global $conf;
		return $this -> library_xmltoarray -> grab_local_data(BASEPATH .'views/'.$conf['pathview'].'/setting.xml');
	}

	function load_template($arr) {
		global $conf;
		$header = $this -> library_xmltoarray -> grab_local_data(BASEPATH .'views/'.$conf['pathview'].'/' . $arr['header']);
		$index = $this -> library_xmltoarray -> grab_local_data(BASEPATH .'views/'.$conf['pathview'].'/' . $arr['content']);
		$footer = $this -> library_xmltoarray -> grab_local_data(BASEPATH .'views/'.$conf['pathview'].'/' . $arr['footer']);

		$res = '';
		$key = array_keys($index);
		$res = __html_minify($header['header'] . $index[$key[0]] . $footer['footer']);
		return self::parse_tag($res);
	}

	function parse_tag($tpl) {
		global $conf;
		$site_url = $conf['site']['__url'];
		$get_title = $this -> library_meta -> __get_title();
		$get_desc = $this -> library_meta -> __get_desc();
		$nocache = time();

		$get_template = $conf['site']['__tpl'];
		$current_url = $conf['site']['__url'] . substr($_SERVER['REQUEST_URI'],1);
		$img_social = $conf['site']['__tpl'] . 'images/logo.png';
		
		$variation = $this -> library_variation -> __get_variation(0,0);
		$categories = $this -> library_categories -> __get_categories(0);
		
		$tpl = str_replace('{jakvr:','$',$tpl);
		$tpl = str_replace(':}','',$tpl);
		$tpl = addslashes($tpl);
		@eval("\$tpl = \"$tpl\";");
		$tpl = str_replace($get_template.'/',$get_template,$tpl);
		$tpl = str_replace($site_url.'/', $site_url, $tpl);
		if ($_SERVER['REQUEST_URI'] == '/')
			return stripslashes($tpl);
		else
			return stripslashes($tpl);
	}
}
