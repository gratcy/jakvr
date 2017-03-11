<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('request/request_model');
    }
    
    function __get_request($id='', $bid, $type=1) {
		$arr = $this -> _ci -> request_model -> __get_request_select($bid,$type);
		$res = '<option value="0">-- Choose Request --</option>';
		foreach($arr as $k => $v) :
			if ($id == $v -> rid)
				$res .= '<option value="'.$v -> rid.'" selected>'.$v -> rno.'</option>';
			else
				$res .= '<option value="'.$v -> rid.'">'.$v -> rno.'</option>';
		endforeach;
		return $res;
	}

}
