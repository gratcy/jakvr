<?php
class Reporttransaction_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_transaction($bid,$params, $type) {
		$pid = '';
		$cid = '';
		$date = '';
		$branch = '';
		$user = '';
		$reffer = '';
		$netto = '';
		
		if ($bid) $branch = " AND a.tbid=" . $bid;
		if ($params['netto'] > 0) $netto = " AND ((((b.tprice/b.tqty) - b.tpricebase)*b.tqty)-a.tdiscount) > " . $params['netto'];
		
		if ($params['datefrom'] && $params['dateto']) $date = " AND from_unixtime(a.tdate,'%Y-%m-%d')>='".$params['datefrom']."' AND from_unixtime(a.tdate,'%Y-%m-%d')<='".$params['dateto']."'";
		
		if ($params['approval'] == 2) $approval = " AND (a.tstatus=1 OR a.tstatus=0 OR a.tstatus=3)";
		elseif ($params['approval'] == 1) $approval = " AND a.tstatus=3";
		else $approval = " AND (a.tstatus=1 OR a.tstatus=0)";
		
		if ($params['ttype'] == 2) $ttype = " AND (a.ttype=1 OR a.ttype=0)";
		elseif ($params['ttype'] == 1) $ttype = " AND a.ttype=1";
		else $ttype = " AND a.ttype=0";
		
		if (isset($params['pid']) && count($params['pid']) > 0) $pid = " AND b.tpid IN (".implode(",", $params['pid']).")";
		if (isset($params['cid']) && count($params['cid']) > 0) $cid = " AND a.tcid IN (".implode(",", $params['cid']).")";
		if (!empty($params['reffer']) && count($params['reffer']) > 0) $reffer = " AND a.treffer IN (".implode(",", $params['reffer']).")";
		if (!empty($params['user']) && count($params['user']) > 0) {
			if (count($params['user']) == 1) {
				$user = " AND a.tcreatedby LIKE '{\"uid\":\"".$params['user'][0]."\"%'";
			}
			else {
				$ruser = "";
				foreach($params['user'] as $k => $v)
					$ruser .= "a.tcreatedby LIKE '{\"uid\":\"".$v."\"%' OR ";
				$user = " AND (" . rtrim($ruser, " OR ") . ")";
			}
		}
		
		if ($type == 1) $titype = " AND a.titype=1";
		else $titype = " AND a.titype=2";
		
		$this -> db -> select("a.tno,a.tdate,a.tcreatedby as createdby,a.tdiscount,a.tdesc,b.tqty,b.tprice,b.tpricebase,c.pname,(SELECT COUNT(*) FROM transaction_detail_tab d WHERE d.ttid=a.tid) as ttypeitem,e.cname as reffer, '' as tinv FROM transaction_tab a JOIN transaction_detail_tab b ON a.tid=b.ttid JOIN products_tab c ON b.tpid=c.pid LEFT JOIN categories_tab e ON a.treffer=e.cid WHERE a.tstatus!=2 AND b.tstatus=1" . $branch . $reffer . $netto . $user . $date . $titype . $approval . $ttype . $pid . $cid, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_transaction_others($params) {
		$date = '';
		$reffer = '';
		$user = '';
		$netto = '';
		
		if ($params['netto'] > 0) $netto = " AND (a.tprice - a.tpricebase) > " . $params['netto'];
		if (!empty($params['reffer']) && count($params['reffer']) > 0) $reffer = " AND a.treffer IN (".implode(",", $params['reffer']).")";
		if ($params['datefrom'] && $params['dateto']) $date = " AND from_unixtime(a.tdate,'%Y-%m-%d')>='".$params['datefrom']."' AND from_unixtime(a.tdate,'%Y-%m-%d')<='".$params['dateto']."'";

		if ($params['approval'] == 2) $approval = " AND (a.tstatus=1 OR a.tstatus=0 OR a.tstatus=3)";
		elseif ($params['approval'] == 1) $approval = " AND a.tstatus=3";
		else $approval = " AND (a.tstatus=1 OR a.tstatus=0)";
		
		if (!empty($params['user']) && count($params['user']) > 0) {
			if (count($params['user']) == 1) {
				$user = " AND a.tcreatedby LIKE '{\"uid\":\"".$params['user'][0]."\"%'";
			}
			else {
				$ruser = "";
				foreach($params['user'] as $k => $v)
					$ruser .= "a.tcreatedby LIKE '{\"uid\":\"".$v."\"%' OR ";
				$user = " AND (" . rtrim($ruser, " OR ") . ")";
			}
		}
		
		$this -> db -> select("a.tinv,a.tcode as tno,a.tcreatedby as createdby,a.tdate,a.tdiscount,a.tdesc,'1' as tqty,'1' as ttypeitem,a.tprice,a.tpricebase,'' as pname,b.cname as reffer FROM transaction_others_tab a JOIN categories_tab b ON a.treffer=b.cid WHERE b.ctype=2 AND a.tstatus!=2" . $reffer . $netto . $user . $date . $approval, FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_receiving($bid,$params) {
		$pid = '';
		$date = '';
		$user = '';
		$branch = '';
		
		if ($bid) $bid = " AND a.tbid=" . $bid;
		
		if ($params['datefrom'] && $params['dateto']) $date = " AND from_unixtime(a.rdate,'%Y-%m-%d')>='".$params['datefrom']."' AND from_unixtime(a.rdate,'%Y-%m-%d')<='".$params['dateto']."'";
		
		if ($params['approval'] == 2) $approval = " AND (a.rstatus=1 OR a.rstatus=0 OR a.rstatus=3)";
		elseif ($params['approval'] == 1) $approval = " AND a.rstatus=3";
		else $approval = " AND (a.rstatus=1 OR a.rstatus=0)";
		
		if (!empty($params['user']) && count($params['user']) > 0) {
			if (count($params['user']) == 1) {
				$user = " AND a.rcreatedby LIKE '{\"uid\":\"".$params['user'][0]."\"%'";
			}
			else {
				$ruser = "";
				foreach($params['user'] as $k => $v)
					$ruser .= "a.rcreatedby LIKE '{\"uid\":\"".$v."\"%' OR ";
				$user = " AND (" . rtrim($ruser, " OR ") . ")";
			}
		}
		
		if (isset($params['pid']) && count($params['pid']) > 0) $pid = " AND b.rpid IN (".implode(",", $params['pid']).")";
		
		$this -> db -> select("a.rdocno as tno,a.rcreatedby as createdby,a.rdate as tdate,a.rdesc as tdesc,b.rqty as tqty,b.rprice as tprice,b.rpricebase as tpricebase,c.pname,'' as tdiscount,'' as tinv FROM receiving_tab a JOIN receiving_item_tab b ON a.rid=b.riid JOIN products_tab c ON b.rpid=c.pid WHERE a.rstatus!=2 AND b.rstatus=1" . $branch . $date . $approval . $user . $pid, FALSE);
		return $this -> db -> get() -> result();
	}
}
