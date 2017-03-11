<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reffer_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('reffer/reffer_model');
    }
    
    function __get_reffer($id='') {
		$arr = $this -> _ci -> reffer_model -> __get_reffer_select();
		$res = '<option value="0"></option>';
		foreach($arr as $k => $v) :
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		endforeach;
		return $res;
	}

}
