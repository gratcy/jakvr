<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logistics_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('logistics/logistics_model');
    }
    
    function __get_logistics($id='') {
		$arr = $this -> _ci -> logistics_model -> __get_logistics_select();
		$res = '<option value="0">-- Choose logistics --</option>';
		foreach($arr as $k => $v) :
			if ($id == $v -> cid)
				$res .= '<option value="'.$v -> cid.'" selected>'.$v -> cname.'</option>';
			else
				$res .= '<option value="'.$v -> cid.'">'.$v -> cname.'</option>';
		endforeach;
		return $res;
	}

}
