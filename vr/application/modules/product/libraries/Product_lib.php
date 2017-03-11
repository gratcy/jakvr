<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('product/product_model');
    }
    
    function __get_product($id='') {
		$arr = $this -> _ci -> product_model -> __get_product_select();
		$res = '';
		foreach($arr as $k => $v) :
			if ($id == $v -> pid)
				$res .= '<option value="'.$v -> pid.'" selected>'.$v -> pname.'</option>';
			else
				$res .= '<option value="'.$v -> pid.'">'.$v -> pname.'</option>';
		endforeach;
		return $res;
	}

}
