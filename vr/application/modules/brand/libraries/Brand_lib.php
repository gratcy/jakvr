<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('brand/brand_model');
    }
    
    function __get_brand($id='') {
		$arr = $this -> _ci -> brand_model -> __get_brand_select();
		$res = '<option value="0">-- Choose Brand --</option>';
		foreach($arr as $k => $v) :
			if ($id == $v -> bid)
				$res .= '<option value="'.$v -> bid.'" selected>'.$v -> bname.'</option>';
			else
				$res .= '<option value="'.$v -> bid.'">'.$v -> bname.'</option>';
		endforeach;
		return $res;
	}

}
