<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('vendor/vendor_model');
    }
    
    function __get_vendor($id='') {
		$arr = $this -> _ci -> vendor_model -> __get_vendor_select();
		$res = '<option value="0">-- Choose Vendor --</option>';
		foreach($arr as $k => $v) :
			if ($id == $v -> vid)
				$res .= '<option value="'.$v -> vid.'" selected>'.$v -> vname.'</option>';
			else
				$res .= '<option value="'.$v -> vid.'">'.$v -> vname.'</option>';
		endforeach;
		return $res;
	}

}
