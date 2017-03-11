<?php
class library_categories extends controller {
	function __construct() {
		parent::database();
		parent::module('models', 'models_products');
	}
	
	function __get_categories($id) {
		$sql = $this -> models_products -> __get_categories();
		$res = '<option value="0">All Categories</option>';
		while($r = $this -> db -> result_sql($sql)) :
			if ($id == $r['cid'])
				$res .= '<option value="'.$r['cid'].'" selected>'.$r['cname'].'</option>';
			else
				$res .= '<option value="'.$r['cid'].'">'.$r['cname'].'</option>';
		endwhile;
		return $res;
	}
}
