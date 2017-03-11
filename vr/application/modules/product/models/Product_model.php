<?php
class Product_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_new_product() {
		$from = date('Y-m-d', strtotime('-14 days'));
		$to = date('Y-m-d');
		$sql = $this -> db -> query("SELECT * FROM products_tab WHERE pstatus=1 AND FROM_UNIXTIME(pdate, '%Y-%m-%d') >= '".$from."' AND FROM_UNIXTIME(pdate, '%Y-%m-%d') <= '".$to."'");
		return $sql -> num_rows();
	}
	
	function __get_product($type=1, $bid=0) {
		if ($type == 1)
			$this -> db -> select('a.*,b.cname,c.bname FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid WHERE (a.pstatus=1 OR a.pstatus=0) ORDER BY a.pid DESC', FALSE);
		elseif ($type == 2)
			$this -> db -> select('a.*,b.cname,c.bname,d.istock FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid JOIN inventory_tab d ON a.pid=d.ipid WHERE b.ctype=1 AND a.pstatus=1 AND d.ibid='.$bid.' ORDER BY a.pid DESC', FALSE);
		else
			$this -> db -> select('a.*,b.cname,c.bname FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid WHERE a.pstatus=1 ORDER BY a.pid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_product_select() {
		$this -> db -> select('pid,pname FROM products_tab WHERE pstatus=1 ORDER BY pname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_product_price($id, $type=1) {
		if ($type == 1)
		$this -> db -> select('pprice,ppricebase,ppriceseller FROM products_tab WHERE (pstatus=1 OR pstatus=0) AND pid=' . $id);
		else
		$this -> db -> select('a.pprice,a.ppricebase,a.ppriceseller FROM products_tab a JOIN transaction_detail_tab b ON a.pid=b.tpid WHERE (a.pstatus=1 OR a.pstatus=0) AND b.tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_product_detail($id) {
		$this -> db -> select('* FROM products_tab WHERE (pstatus=1 OR pstatus=0) AND pid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_product($data, $type) {
		if ($type == 1)
			return $this -> db -> insert('products_tab', $data);
        else
			return $this -> db -> insert('product_price_tab', $data);
	}
	
	function __update_product($id, $data) {
        $this -> db -> where('pid', $id);
        return $this -> db -> update('products_tab', $data);
	}
	
	function __delete_product($id) {
		return $this -> db -> query('UPDATE products_tab SET pstatus=2 WHERE pid=' . $id);
	}
}
