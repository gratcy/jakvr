<?php
class Order_others_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_order_others($search, $order, $offset, $length) {
		//~ $this -> db -> select("a.*,b.cname FROM transaction_others_tab a JOIN categories_tab b ON a.treffer=b.cid WHERE b.ctype=2 AND (a.tstatus=3 OR a.tstatus=1 OR a.tstatus=0) AND from_unixtime(a.tdate,'%Y-%m-%d')>='".date('Y-m-d', strtotime('-2 months'))."' AND from_unixtime(a.tdate,'%Y-%m-%d')<='".date('Y-m-d')."' ORDER BY a.tid DESC");
		$orderBy = "a.tid DESC";
		if (!empty($order)) {
			if (__get_roles('ProductPriceBase'))
				$col = array("a.tid","a.tdate","a.tcode","a.tpricebase","b.cname","a.tinv","a.tname","a.tprice","","a.tresi","a.tdesc","a.tstatus");
			else
				$col = array("a.tid","a.tdate","a.tcode","b.cname","a.tinv","a.tname","a.tprice","","a.tresi","a.tdesc","a.tstatus");
			if (!empty($col[$order[0]['column']])) $orderBy = $col[$order[0]['column']]." ".$order[0]['dir'];
		}
		if (!empty($search))
			$this -> db -> select("a.*,b.cname FROM transaction_others_tab a JOIN categories_tab b ON a.treffer=b.cid WHERE b.ctype=2 AND (a.tstatus=3 OR a.tstatus=1 OR a.tstatus=0) AND (a.tcode LIKE '%".$search."%' OR a.tinv LIKE '%".$search."%' OR a.tname LIKE '%".$search."%' OR a.tresi LIKE '%".$search."%' OR a.tdesc LIKE '%".$search."%' OR from_unixtime(a.tdate,'%d/%m/%Y %h:%i:%s') LIKE '%".$search."%' OR b.cname LIKE '%".$search."%') ORDER BY ".$orderBy." LIMIT $offset, $length");
		else
			$this -> db -> select("a.*,b.cname FROM transaction_others_tab a JOIN categories_tab b ON a.treffer=b.cid WHERE b.ctype=2 AND (a.tstatus=3 OR a.tstatus=1 OR a.tstatus=0) ORDER BY ".$orderBy." LIMIT $offset, $length");
		return $this -> db -> get() -> result();
	}
	
	function __get_total_order_others($search) {
		if (!empty($search))
			$this -> db -> select("* FROM transaction_others_tab a JOIN categories_tab b ON a.treffer=b.cid WHERE b.ctype=2 AND (a.tstatus=3 OR a.tstatus=1 OR a.tstatus=0) AND (a.tcode LIKE '%".$search."%' OR a.tinv LIKE '%".$search."%' OR a.tname LIKE '%".$search."%' OR a.tresi LIKE '%".$search."%' OR a.tdesc LIKE '%".$search."%' OR from_unixtime(a.tdate,'%d/%m/%Y %h:%i:%s') LIKE '%".$search."%' OR b.cname LIKE '%".$search."%')");
		else
			$this -> db -> select("* FROM transaction_others_tab a JOIN categories_tab b ON a.treffer=b.cid WHERE b.ctype=2 AND (a.tstatus=3 OR a.tstatus=1 OR a.tstatus=0)");
		return $this -> db -> get() -> num_rows();
	}
    
	function __check_duplicate_invoice($tinv) {
		$this -> db -> select("* FROM transaction_others_tab WHERE tinv='".$tinv."'");
		return $this -> db -> get() -> num_rows();
	}
    
	function __get_order_others_select() {
		$this -> db -> select('tid,bname FROM transaction_others_tab WHERE tstatus=1 ORDER BY bname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_order_others_detail($id) {
		$this -> db -> select('* FROM transaction_others_tab WHERE (tstatus=3 OR tstatus=1 OR tstatus=0) AND tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_order_others($data) {
        return $this -> db -> insert('transaction_others_tab', $data);
	}
	
	function __update_order_others($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('transaction_others_tab', $data);
	}
	
	function __delete_order_others($id) {
		return $this -> db -> query('UPDATE transaction_others_tab SET tstatus=2 WHERE tid=' . $id);
	}
}
