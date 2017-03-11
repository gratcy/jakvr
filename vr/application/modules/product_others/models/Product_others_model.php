<?php
class Product_others_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_product($type=1, $pid=0) {
		if ($type == 1)
			$this -> db -> select('a.*,b.cname,c.bname,d.pprice,d.ppricebase,d.ppriceseller FROM product_others_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid JOIN product_others_variation_tab d ON a.pid=d.ppid WHERE b.ctype=4 AND (a.pstatus=1 OR a.pstatus=0) GROUP BY a.pid ORDER BY a.pid DESC', FALSE);
		elseif ($type == 2)
			$this -> db -> select('* FROM product_others_variation_tab WHERE pstatus=1 AND ppid='.$pid.' ORDER BY pid ASC', FALSE);
		else
			$this -> db -> select('* FROM product_others_variation_images_tab WHERE pvid='.$pid.' ORDER BY pid ASC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_product_select() {
		$this -> db -> select('pid,pname FROM product_others_tab WHERE pstatus=1 ORDER BY pname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_product_detail($id) {
		$this -> db -> select('* FROM product_others_tab WHERE (pstatus=1 OR pstatus=0) AND pid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_product($data, $type) {
		if ($type == 1)
			return $this -> db -> insert('product_others_tab', $data);
        elseif ($type == 2)
			return $this -> db -> insert('product_others_variation_tab', $data);
		else
			return $this -> db -> insert('product_others_variation_images_tab', $data);
	}
	
	function __update_product($id, $data, $type) {
		$this -> db -> where('pid', $id);
		if ($type == 1)
			return $this -> db -> update('product_others_tab', $data);
		else
			return $this -> db -> update('product_others_variation_tab', $data);
	}
	
	function __delete_product($id,$type) {
		if ($type == 1)
			return $this -> db -> query('UPDATE product_others_tab SET pstatus=2 WHERE pid=' . $id);
		else
			return $this -> db -> query('UPDATE product_others_variation_tab SET pstatus=2 WHERE pid=' . $id);
	}
}
