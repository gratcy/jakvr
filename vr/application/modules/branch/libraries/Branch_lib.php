<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Branch_lib {
    protected $_ci;

    function __construct() {
        $this->_ci = & get_instance();
        $this->_ci->load->model('branch/branch_model');
    }
    
    function __get_branch($id='', $type) {
		$arr = $this -> _ci -> branch_model -> __get_branch_select();
		$res = '';
		if ($type == 1) {
			$res .= '<option value="0">-- Choose Branch --</option>';
			foreach($arr as $k => $v) :
				if ($id == $v -> bid)
					$res .= '<option value="'.$v -> bid.'" selected>'.$v -> bname.'</option>';
				else
					$res .= '<option value="'.$v -> bid.'">'.$v -> bname.'</option>';
			endforeach;
		}
		else {
			$all = array(array('bid' => 0, 'bname' => 'All')); 
			$arr = array_merge($all, $arr);
			$arr = json_decode(json_encode($arr));
			foreach($arr as $k => $v) :
				if ($id == $v -> bid)
					$res .= ' '.$v -> bname.' <input checked type="radio" name="branch" value="'.$v -> bid.'" /> ';
				else
					$res .= ' '.$v -> bname.' <input type="radio" name="branch" value="'.$v -> bid.'" /> ';
			endforeach;
		}
		return $res;
	}
}
