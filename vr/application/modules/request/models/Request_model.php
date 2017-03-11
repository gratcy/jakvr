<?php
class Request_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_products($did,$type) {
		if ($type == 1)
			$this -> db -> select('a.*,b.cname,c.bname FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid WHERE a.pstatus=1 AND a.pid IN ('.$did.') ORDER BY a.pid DESC', FALSE);
		else
			$this -> db -> select('a.*,b.cname,c.bname,d.rqty,d.riid,d.rid FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid JOIN request_item_tab d ON a.pid=d.rpid WHERE a.pstatus=1 AND d.riid='.$did.' AND d.rstatus=1 ORDER BY a.pid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_total_today_request($bid) {
		$this -> db -> select("* FROM request_tab WHERE FROM_UNIXTIME(rdate, '%Y-%m-%d')='".date('Y-m-d')."' AND (rfrom=" . $bid." OR rto=".$bid.")", FALSE);
		return $this -> db -> get() -> num_rows();
	}
    
	function __get_request($bid) {
		$this -> db -> select('a.*,b.bname as bfrom, c.bname as bto FROM request_tab a JOIN branch_tab b ON a.rfrom=b.bid JOIN branch_tab c ON a.rto=c.bid WHERE (a.rstatus=1 OR a.rstatus=0 OR a.rstatus=3) AND (a.rfrom='.$bid.' OR a.rto='.$bid.') ORDER BY a.rid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_request_products_detail($id) {
		$this -> db -> select('* FROM request_item_tab WHERE rstatus=1 AND rid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_request_select($bid, $type) {
		if ($type == 1)
			$this -> db -> select('rid,rno FROM request_tab WHERE rstatus=3 AND (rfrom='.$bid.' OR rto='.$bid.') AND rid NOT IN (SELECT a.rid FROM request_tab a JOIN transfer_tab b ON a.rid=b.trid WHERE a.rstatus=3 AND b.tstatus=3 AND (a.rfrom='.$bid.' OR a.rto='.$bid.'))', FALSE);
		else
			$this -> db -> select('rid,rno FROM request_tab WHERE rstatus=3 AND (rfrom='.$bid.' OR rto='.$bid.') AND rid NOT IN (SELECT a.rid FROM request_tab a JOIN receiving_tab b ON a.rid=b.rvendor WHERE a.rstatus=3 AND b.rstatus=3 AND (a.rfrom='.$bid.' OR a.rto='.$bid.') AND b.rtype=2)', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_inventory_detail($id,$bid) {
		$this -> db -> select('* FROM inventory_tab WHERE istatus=1 AND ibid='.$bid.' AND ipid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_request_detail($id) {
		$this -> db -> select('* FROM request_tab WHERE (rstatus=1 OR rstatus=0 OR rstatus=3) AND rid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_request_item_detail($id) {
		$this -> db -> select('* FROM request_item_tab WHERE rid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_request_detail_approved($id) {
		$this -> db -> select('a.*,b.bname as bfrom, c.bname as bto FROM request_tab a JOIN branch_tab b ON a.rfrom=b.bid JOIN branch_tab c ON a.rto=c.bid WHERE a.rstatus=3 AND a.rid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_request_products($data) {
        return $this -> db -> insert('request_item_tab', $data);
	}
	
	function __insert_request($data) {
        return $this -> db -> insert('request_tab', $data);
	}
	
	function __update_request_products($id, $data) {
        $this -> db -> WHERE('rid', $id);
        return $this -> db -> update('request_item_tab', $data);
	}
	
	function __update_request($id, $data) {
        $this -> db -> WHERE('rid', $id);
        return $this -> db -> update('request_tab', $data);
	}
	
	function __update_inventory($id, $data, $bid) {
        $this -> db -> WHERE('ipid', $id);
        $this -> db -> WHERE('ibid', $bid);
        return $this -> db -> update('inventory_tab', $data);
	}
	
	function __delete_request_product($id, $pid) {
		return $this -> db -> query('UPDATE request_item_tab SET rstatus=2 WHERE rpid='.$pid.' AND riid=' . $id);
	}
	
	function __delete_request($id) {
		return $this -> db -> query('UPDATE request_tab SET rstatus=2 WHERE rid=' . $id);
	}
}
