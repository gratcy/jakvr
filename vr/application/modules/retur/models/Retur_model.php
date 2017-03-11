<?php
class Retur_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_products($did,$type) {
		if ($type == 1)
			$this -> db -> select('a.*,b.cname,c.bname FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid WHERE a.pstatus=1 AND a.pid IN ('.$did.') ORDER BY a.pid DESC', FALSE);
		else
			$this -> db -> select('a.*,b.cname,c.bname,d.tqty,d.ttid,d.tid,d.treject FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid JOIN transaction_detail_tab d ON a.pid=d.tpid WHERE a.pstatus=1 AND d.ttid='.$did.' AND d.tstatus=1 ORDER BY a.pid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_total_today_transaction($bid) {
		$this -> db -> select("COUNT(*) as totaltoday FROM transaction_tab WHERE titype=2 AND FROM_UNIXTIME(tdate, '%Y-%m-%d')='".date('Y-m-d')."'", FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_retur($bid) {
		$this -> db -> select('a.*,b.cname,c.cname as reffer FROM transaction_tab a JOIN customers_tab b ON a.tcid=b.cid LEFT JOIN categories_tab c ON a.treffer=c.cid AND c.ctype=2 WHERE a.titype=2 AND (a.tstatus=1 OR a.tstatus=0 OR a.tstatus=3) AND a.tbid='.$bid.' ORDER BY a.tid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_inventory_detail($id,$bid) {
		$this -> db -> select('* from inventory_tab where istatus=1 AND ipid=' . $id . ' AND ibid=' . $bid, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_retur_detail_approved($id) {
		$this -> db -> select('a.*,b.cname,c.cname as reffer from transaction_tab a JOIN customers_tab b ON a.tcid=b.cid LEFT JOIN categories_tab c ON a.treffer=c.cid AND c.ctype=2 where a.titype=2 AND a.tstatus!=2 AND a.tid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_retur_products_detail($id) {
		$this -> db -> select('* from transaction_detail_tab where tstatus=1 AND tid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_retur_detail($id) {
		$this -> db -> select('* FROM transaction_tab WHERE titype=2 AND (tstatus=1 OR tstatus=0) AND tid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_retur($data) {
        return $this -> db -> insert('transaction_tab', $data);
	}
	
	function __insert_retur_products($data) {
        return $this -> db -> insert('transaction_detail_tab', $data);
	}
	
	function __update_retur_products($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('transaction_detail_tab', $data);
	}
	
	function __update_inventory($id, $data, $bid) {
        $this -> db -> where('ipid', $id);
        $this -> db -> where('ibid', $bid);
        return $this -> db -> update('inventory_tab', $data);
	}
	
	function __update_retur($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('transaction_tab', $data);
	}
	
	function __delete_retur_product($did, $pid) {
		return $this -> db -> query('update transaction_detail_tab set tstatus=2 where tpid='.$pid.' AND ttid=' . $did);
	}
	
	function __delete_retur($id) {
		return $this -> db -> query('update transaction_tab set tstatus=2 where titype=2 AND tid=' . $id);
	}
}
