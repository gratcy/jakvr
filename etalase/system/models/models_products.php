<?php
class models_products extends objectdb {
	function __get_categories() {
		return $this -> query("SELECT cid,cname FROM categories_tab WHERE ctype=4 AND cstatus=1");
	}
	
	function __get_list_variation() {
		return $this -> query("SELECT DISTINCT(pname) FROM product_others_variation_tab WHERE pstatus=1 ORDER BY pname ASC");
	}
	
	function __get_variation($keyword) {
		return $this -> query_one("SELECT a.pid,a.pname,a.pimg,a.pguarantee,a.pweight,b.pid as pvid,b.pname as vname,b.pdesc as vdesc,b.psku,b.pprice,c.bname,d.cname,e.cname as color FROM product_others_tab a LEFT JOIN product_others_variation_tab b ON a.pid=b.ppid JOIN brand_tab c ON a.pbid=c.bid JOIN categories_tab d ON a.pcid=d.cid JOIN categories_tab e ON b.pcolor=e.cid WHERE b.pname LIKE '%".$keyword."%' ORDER BY b.pname ASC");
	}
	
	function __get_variation_all($cid,$orderBy) {
		$order = " ORDER BY a.pid DESC";
		$cat = "";
		if ($cid) $cat = " AND a.pcid=" . $cid;
		if ($orderBy) $order = " ORDER BY b.pprice " . ($orderBy == 1 ? "ASC" : "DESC");
		
		return $this -> query("SELECT b.pid,b.pname,b.pprice,a.pimg as pimages FROM product_others_tab a LEFT JOIN product_others_variation_tab b ON a.pid=b.ppid LEFT JOIN product_others_variation_images_tab c ON b.pid=(SELECT pi.pvid FROM product_others_variation_images_tab pi WHERE pi.pvid=c.pid LIMIT 1) WHERE a.pstatus=1 AND b.pstatus=1" .$cat. $order);
	}
	
	function __get_random_product($keyword) {
		return $this -> query("SELECT b.pid,b.pname,b.pprice,c.pimages FROM product_others_tab a LEFT JOIN product_others_variation_tab b ON a.pid=b.ppid LEFT JOIN product_others_variation_images_tab c ON b.pid=(SELECT pi.pvid FROM product_others_variation_images_tab pi WHERE pi.pvid=c.pid LIMIT 1) WHERE a.pstatus=1 AND b.pstatus=1 AND a.pname NOT LIKE '%".$keyword."%' LIMIT 3");
	}
	
	function __get_images_variation($id) {
		return $this -> query("SELECT pimages FROM product_others_variation_images_tab WHERE pvid=" . $id);
	}
	
	function __get_variation_color_list($id) {
		return $this -> query("SELECT a.pname,b.cname,b.cdesc FROM product_others_variation_tab a LEFT JOIN categories_tab b ON a.pcolor=b.cid WHERE a.ppid=" . $id);
	}
}
