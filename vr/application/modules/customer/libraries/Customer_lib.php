<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('customer/customer_model');
    }
    
    function __get_customer($id='') {
		$arr = $this -> _ci -> customer_model -> __get_customer_select();
		$res = '';
		foreach($arr as $k => $v) :
			$cphone = explode('*', $v -> cphone);
			if ($id == $v -> cid)
				$res .= '<option ctype="'.$v -> ctype.'" value="'.$v -> cid.'" selected>'.$v -> cname.(isset($cphone[0]) && strlen($cphone[0]) > 2 ? ' - '.$cphone[0] : '').'</option>';
			else
				$res .= '<option ctype="'.$v -> ctype.'" value="'.$v -> cid.'">'.$v -> cname.(isset($cphone[0]) && strlen($cphone[0]) > 2 ? ' - '.$cphone[0] : '').'</option>';
		endforeach;
		return $res;
	}

}
