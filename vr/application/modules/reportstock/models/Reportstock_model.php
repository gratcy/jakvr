<?php
class Reportstock_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_stock($bid, $pid, $range) {
		if ($pid) $pid = " AND a.pid IN (".implode(",", $pid).")";
		$this -> db -> select("a.pid,a.pname,b.istock,(SELECT SUM(d.tqty) FROM transaction_tab c JOIN transaction_detail_tab d ON c.tid=d.ttid WHERE d.tpid=a.pid AND d.tstatus=1 AND (c.tstatus=1 OR c.tstatus=0 OR c.tstatus=3) AND from_unixtime(c.tdate,'%Y-%m-%d')>='".$range['datefrom']."' AND from_unixtime(c.tdate,'%Y-%m-%d')<='".$range['dateto']."') as totalout FROM products_tab a JOIN inventory_tab b ON a.pid=b.ipid WHERE a.pstatus=1 $pid AND b.ibid=" . $bid . " ORDER BY totalout DESC", FALSE);
		return $this -> db -> get() -> result();
	}
}
