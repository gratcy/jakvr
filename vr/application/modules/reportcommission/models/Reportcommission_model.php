<?php
class Reportcommission_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_transaction($bid,$params, $type) {
		$pid = '';
		$cid = '';
		$date = '';
		$branch = '';
		$reffer = '';
		if ($bid) $branch = " AND a.tbid=" . $bid;
		
		if ($params['datefrom'] && $params['dateto']) $date = " AND from_unixtime(a.tdate,'%Y-%m-%d')>='".$params['datefrom']."' AND from_unixtime(a.tdate,'%Y-%m-%d')<='".$params['dateto']."'";
		
		if ($params['approval'] == 2) $approval = " AND (a.tstatus=1 OR a.tstatus=0 OR a.tstatus=3)";
		elseif ($params['approval'] == 1) $approval = " AND a.tstatus=3";
		else $approval = " AND (a.tstatus=1 OR a.tstatus=0)";
		
		if ($params['ttype'] == 2) $ttype = " AND (a.ttype=1 OR a.ttype=0)";
		elseif ($params['ttype'] == 1) $ttype = " AND a.ttype=1";
		else $ttype = " AND a.ttype=0";
		
		if (isset($params['pid']) && count($params['pid']) > 0) $pid = " AND b.tpid IN (".implode(",", $params['pid']).")";
		if (isset($params['cid']) && count($params['cid']) > 0) $cid = " AND a.tcid IN (".implode(",", $params['cid']).")";
		if (!empty($params['reffer']) && $params['reffer'] > 0) $reffer = " AND a.treffer=" . $params['reffer'];
		
		if ($type == 1) $titype = " AND a.titype=1";
		else $titype = " AND a.titype=2";
		
		$this -> db -> select("a.tno,a.tdate,a.tdiscount,a.tdesc,b.tqty,b.tprice,b.tpricebase,c.pname,(SELECT COUNT(*) FROM transaction_detail_tab d WHERE d.ttid=a.tid) as ttypeitem,e.cname as reffer, '' as tinv FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid JOIN products_tab c ON b.tpid=c.pid LEFT JOIN categories_tab e ON a.treffer=e.cid WHERE a.tstatus!=2 AND b.tstatus=1" . $branch . $reffer . $date . $titype . $approval . $ttype . $pid . $cid, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_transaction_others($params) {
		$date = '';
		$reffer = '';
		
		if (!empty($params['reffer']) && $params['reffer'] > 0) $reffer = " AND a.treffer=" . $params['reffer'];
		if ($params['datefrom'] && $params['dateto']) $date = " AND from_unixtime(a.tdate,'%Y-%m-%d')>='".$params['datefrom']."' AND from_unixtime(a.tdate,'%Y-%m-%d')<='".$params['dateto']."'";

		if ($params['approval'] == 2) $approval = " AND (a.tstatus=1 OR a.tstatus=0 OR a.tstatus=3)";
		elseif ($params['approval'] == 1) $approval = " AND a.tstatus=3";
		else $approval = " AND (a.tstatus=1 OR a.tstatus=0)";
		
		$this -> db -> select("a.tinv,a.tcode as tno,a.tdate,'-' as tdiscount,a.tdesc,'1' as tqty,a.tprice,a.tpricebase,'' as pname,b.cname as reffer FROM transaction_others_tab a JOIN categories_tab b ON a.treffer=b.cid WHERE b.ctype=2 AND a.tstatus!=2" . $reffer . $date . $approval, FALSE);
		return $this -> db -> get() -> result();
	}
}
