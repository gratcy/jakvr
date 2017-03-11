<?php
class Inventory_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_inventory($bid) {
		$this -> db -> select('a.*,b.pname FROM inventory_tab a JOIN products_tab b ON a.ipid=b.pid WHERE (a.istatus=1 OR a.istatus=0) AND a.ibid='.$bid.' ORDER BY a.istock DESC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_inventory_detail($id, $bid) {
		$this -> db -> select('a.*,b.pname FROM inventory_tab a JOIN products_tab b ON a.ipid=b.pid WHERE (a.istatus=1 OR a.istatus=0) AND a.ipid=' . $id . ' AND a.ibid=' . $bid, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __update_inventory($id, $data, $bid) {
        $this -> db -> where('ipid', $id);
        $this -> db -> where('ibid', $bid);
        return $this -> db -> update('inventory_tab', $data);
	}
	
	function __get_order_stock_process($id, $bid) {
		$this -> db -> select('SUM(b.tqty) as total FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid WHERE a.titype=1 AND (a.tstatus=0 OR a.tstatus=1) AND b.tstatus=1 AND a.tbid='.$bid.' AND b.tpid=' . $id, FALSE);
		$tr = $this -> db -> get() -> result();
		
		$this -> db -> select('SUM(b.tqty) as total FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid WHERE a.titype=2 AND (a.tstatus=0 OR a.tstatus=1) AND b.tstatus=1 AND a.tbid='.$bid.' AND b.tpid=' . $id, FALSE);
		$tr2 = $this -> db -> get() -> result();
		
		$this -> db -> select('SUM(b.rqty) as total FROM receiving_tab a JOIN receiving_item_tab b ON a.rid=b.riid WHERE (a.rstatus=0 OR a.rstatus=1) AND b.rstatus=1 AND a.rbid='.$bid.' AND b.rpid=' . $id, FALSE);
		$tr3 = $this -> db -> get() -> result();
		
		$in = $tr[0] -> total + $tr3[0] -> total;
		$out = $tr2[0] -> total;
		return $out - $in;
	}

	function __get_transaction($id, $type, $bid) {
		if ($type == 1)
			$this -> db -> select('a.tdate, a.tno, b.tqty, '.$type.' as transtype, 1 as approved,c.cname FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid JOIN customers_tab c ON a.tcid=c.cid WHERE a.titype=1 AND a.tstatus=3 AND b.tstatus=1 AND a.tbid='.$bid.' AND b.tpid=' . $id, FALSE);
		elseif ($type == 2)
			$this -> db -> select('a.tdate, a.tno, b.tqty, '.$type.' as transtype, 0 as approved,c.cname FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid JOIN customers_tab c ON a.tcid=c.cid WHERE a.titype=1 AND (a.tstatus=0 OR a.tstatus=1) AND a.tbid='.$bid.' AND b.tstatus=1 AND b.tpid=' . $id, FALSE);
		elseif ($type == 3)
			$this -> db -> select('a.tdate, a.tno, b.tqty, '.$type.' as transtype, b.treject, 1 as approved,c.cname FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid JOIN customers_tab c ON a.tcid=c.cid WHERE a.titype=2 AND a.tstatus=3 AND a.tbid='.$bid.' AND b.tstatus=1 AND b.tpid=' . $id, FALSE);
		elseif ($type == 4)
			$this -> db -> select('a.tdate, a.tno, b.tqty, '.$type.' as transtype, b.treject, 0 as approved,c.cname FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid JOIN customers_tab c ON a.tcid=c.cid WHERE a.titype=2 AND (a.tstatus=0 OR a.tstatus=1) AND b.tstatus=1 AND a.tbid='.$bid.' AND b.tpid=' . $id, FALSE);
		elseif ($type == 5)
			$this -> db -> select('a.rdate as tdate, a.rdocno as tno, b.rqty as tqty, '.$type.' as transtype, 1 as approved,\'\' as cname FROM receiving_tab a JOIN receiving_item_tab b ON a.rid=b.riid WHERE a.rstatus=3 AND b.rstatus=1 AND a.rbid='.$bid.' AND b.rpid=' . $id, FALSE);
		elseif ($type == 6)
			$this -> db -> select('a.rdate as tdate, a.rdocno as tno, b.rqty as tqty, '.$type.' as transtype, 0 as approved,\'\' as cname FROM receiving_tab a JOIN receiving_item_tab b ON a.rid=b.riid WHERE (a.rstatus=0 OR a.rstatus=1) AND b.rstatus=1 AND a.rbid='.$bid.' AND b.rpid=' . $id, FALSE);
		elseif ($type == 7)
			$this -> db -> select('odate as tdate, \'Opname\' as tno, oadjustplus as tqty, '.$type.' as transtype, 1 as approved,\'\' as cname FROM opname_tab WHERE oadjustplus > 0 AND oadjustmin=0 AND ostatus=1 AND oidid=' . $id . ' AND obid=' . $bid, FALSE);
		elseif ($type == 8)
			$this -> db -> select('odate as tdate, \'Opname\' as tno, oadjustmin as tqty, '.$type.' as transtype, 1 as approved,\'\' as cname FROM opname_tab WHERE oadjustmin > 0 AND oadjustplus=0 AND ostatus=1 AND oidid=' . $id . ' AND obid=' . $bid, FALSE);
		elseif ($type == 9)
			$this -> db -> select('a.tdate, a.tno, c.rqty as tqty, '.$type.' as transtype, 1 as approved,\'\' as cname FROM transfer_tab a JOIN request_tab b ON a.trid=b.rid JOIN request_item_tab c ON b.rid=c.riid WHERE a.tstatus=3 AND b.rstatus=3 AND c.rstatus=1 AND b.rto='.$bid.' AND c.rpid=' . $id, FALSE);
		elseif ($type == 10)
			$this -> db -> select('a.tdate, a.tno, c.rqty as tqty, '.$type.' as transtype, 0 as approved,\'\' as cname FROM transfer_tab a JOIN request_tab b ON a.trid=b.rid JOIN request_item_tab c ON b.rid=c.riid WHERE (a.tstatus=0 OR a.tstatus=1) AND b.rstatus=3 AND c.rstatus=1 AND b.rto='.$bid.' AND c.rpid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
}
