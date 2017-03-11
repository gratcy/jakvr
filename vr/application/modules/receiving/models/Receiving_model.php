<?php
class Receiving_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_products($did,$type) {
		if ($type == 1)
			$this -> db -> select('a.*,b.cname,c.bname FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid WHERE a.pstatus=1 AND a.pid IN ('.$did.') ORDER BY a.pid DESC', FALSE);
		else
			$this -> db -> select('a.*,b.cname,c.bname,d.rqty,d.riid,d.rid FROM products_tab a JOIN categories_tab b ON a.pcid=b.cid JOIN brand_tab c ON a.pbid=c.bid JOIN receiving_item_tab d ON a.pid=d.rpid WHERE a.pstatus=1 AND d.riid='.$did.' AND d.rstatus=1 ORDER BY a.pid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_receiving($bid) {
		$this -> db -> select('a.* from receiving_tab a where (a.rstatus=1 OR a.rstatus=0 OR a.rstatus=3) AND a.rbid='.$bid.' ORDER BY a.rid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_receiving_products_detail($id) {
		$this -> db -> select('* from receiving_item_tab where rstatus=1 AND rid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_inventory_detail($id,$bid) {
		$this -> db -> select('* from inventory_tab where istatus=1 AND ibid='.$bid.' AND ipid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_receiving_detail($id) {
		$this -> db -> select('* from receiving_tab where (rstatus=1 OR rstatus=0 OR rstatus=3) AND rid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_receiving_detail_approved($id) {
		$this -> db -> select('a.*,b.vname from receiving_tab a JOIN vendor_tab b ON a.rvendor=b.vid where a.rstatus=3 AND a.rid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_receiving_products($data) {
        return $this -> db -> insert('receiving_item_tab', $data);
	}
	
	function __insert_receiving($data) {
        return $this -> db -> insert('receiving_tab', $data);
	}
	
	function __update_receiving_products($id, $data) {
        $this -> db -> where('rid', $id);
        return $this -> db -> update('receiving_item_tab', $data);
	}
	
	function __update_receiving($id, $data) {
        $this -> db -> where('rid', $id);
        return $this -> db -> update('receiving_tab', $data);
	}
	
	function __update_inventory($id, $data, $bid) {
        $this -> db -> where('ipid', $id);
        $this -> db -> where('ibid', $bid);
        return $this -> db -> update('inventory_tab', $data);
	}
	
	function __delete_receiving_product_not_in($id, $pid) {
		return $this -> db -> query('UPDATE receiving_item_tab SET rstatus=2 WHERE rpid NOT IN ('.$pid.') AND riid=' . $id);
	}
	
	function __delete_receiving_product($id, $pid) {
		return $this -> db -> query('UPDATE receiving_item_tab SET rstatus=2 WHERE rpid='.$pid.' AND riid=' . $id);
	}
	
	function __delete_receiving($id) {
		return $this -> db -> query('UPDATE receiving_tab SET rstatus=2 WHERE rid=' . $id);
	}
}
