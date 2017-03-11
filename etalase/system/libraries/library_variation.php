<?php
class library_variation extends controller {
	function __construct() {
		parent::database();
		parent::module('models', 'models_products');
	}
	
	function __get_variation($cid,$orderBy) {
		global $conf;
		$sql = $this -> models_products -> __get_variation_all($cid,$orderBy);
		$res = '';
		while($r = $this -> db -> result_sql($sql)) :
			$res .= '<li><a href="javascript:void(0);" title="'.$r['pname'].'"><img src="'.$conf['product_images']['__url'].$r['pimages'].'"></a><span class="variation-title">'.$r['pname'].'</span><span class="variation-price">'.__get_rupiah($r['pprice'],1).'</span></li>';
		endwhile;
		return $res;
	}
}
