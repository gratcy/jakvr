<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Color_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('color/color_model');
    }
    
    function __get_color($id='') {
		$arr = $this -> _ci -> color_model -> __get_color_select();
		$res = '<option value="0">-- Choose Color --</option>';
		foreach($arr as $k => $v) :
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" style="background-color:'.$v -> cdesc.';font-weight:bold" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'" style="background-color:'.$v -> cdesc.';font-weight:bold">'.$v -> cname.'</option>';
		endforeach;
		return $res;
	}
}
