<?php
class Order_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_products($did,$type) {
		if ($type == 1)
			$this -> db -> select('a.*,b.cname,c.bname FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid WHERE a.pstatus=1 AND a.pid IN ('.$did.') ORDER BY a.pid DESC', FALSE);
		else
			$this -> db -> select('a.*,b.cname,b.cwarranty,c.bname,d.tprice as harga,d.tqty,d.ttid,d.tid FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid JOIN transaction_detail_tab d ON a.pid=d.tpid WHERE b.ctype=1 AND a.pstatus=1 AND d.ttid='.$did.' AND d.tstatus=1 ORDER BY a.pid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_total_today_transaction($bid) {
		$this -> db -> select("COUNT(*) as totaltoday FROM transaction_tab WHERE titype=1 AND tstatus!=2 AND FROM_UNIXTIME(tdate, '%Y-%m-%d')='".date('Y-m-d')."' AND tbid=" . $bid, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_order($bid) {
		$this -> db -> select('a.*,b.cname,c.cname as reffer FROM transaction_tab a JOIN customers_tab b ON a.tcid=b.cid LEFT JOIN categories_tab c ON a.treffer=c.cid AND c.ctype=2 WHERE a.titype=1 AND (a.tstatus=1 OR a.tstatus=0 OR a.tstatus=3) AND a.tbid='.$bid.' ORDER BY a.tid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_inventory_detail($id, $type=1, $bid) {
		if ($type == 1)
		$this -> db -> select('* from inventory_tab where istatus=1 AND ipid=' . $id . ' AND ibid=' . $bid, FALSE);
		else
		$this -> db -> select('a.istock from inventory_tab a JOIN transaction_detail_tab b ON a.ipid=b.tpid where a.istatus=1 AND a.ibid=' . $bid . ' AND b.tid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_order_detail_approved($id) {
		$this -> db -> select('a.*,b.cname,b.cphone,c.cname as reffer,d.cname as doinfo from transaction_tab a JOIN customers_tab b ON a.tcid=b.cid LEFT JOIN categories_tab c ON a.treffer=c.cid AND c.ctype=2 LEFT JOIN categories_tab d ON a.tdo=d.cid AND d.ctype=3 where a.titype=1 AND a.tstatus!=2 AND a.tid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_order_products_detail($id) {
		$this -> db -> select('* from transaction_detail_tab where tstatus=1 AND tid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_order_detail($id, $bid) {
		$this -> db -> select('* FROM transaction_tab WHERE titype=1 AND (tstatus=1 OR tstatus=0) AND tbid='.$bid.' AND tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_order($data) {
        return $this -> db -> insert('transaction_tab', $data);
	}
	
	function __insert_order_products($data) {
        return $this -> db -> insert('transaction_detail_tab', $data);
	}
	
	function __update_order_products($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('transaction_detail_tab', $data);
	}
	
	function __update_inventory($id, $data, $bid) {
        $this -> db -> where('ipid', $id);
        $this -> db -> where('ibid', $bid);
        return $this -> db -> update('inventory_tab', $data);
	}
	
	function __update_order($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('transaction_tab', $data);
	}
	
	function __get_order_unapproved($bid) {
		$sql = $this -> db -> query('SELECT * FROM transaction_tab WHERE (tstatus=1 OR tstatus=0) AND tbid=' . $bid);
		return $sql -> num_rows();
	}
	
	function __delete_order_product($did, $pid) {
		return $this -> db -> query('update transaction_detail_tab set tstatus=2 where tpid='.$pid.' AND ttid=' . $did);
	}
	
	function __delete_order($id) {
		return $this -> db -> query('update transaction_tab set tstatus=2 where titype=1 AND tid=' . $id);
	}
}
