<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('country/country_model');
    }
    
    function __get_country($id='') {
		$country = $this -> _ci -> country_model -> __get_country_select();
		$res = '<option value=""></option>';
		foreach($country as $k => $v)
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		return $res;
	}
}
