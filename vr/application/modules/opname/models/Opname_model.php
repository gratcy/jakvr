<?php
class Opname_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_opname($bid) {
		$this -> db -> select('a.*,b.pname FROM inventory_tab a JOIN products_tab b ON a.ipid=b.pid WHERE (a.istatus=1 OR a.istatus=0) AND a.ibid='.$bid.' ORDER BY a.iid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_opname_detail($id, $bid) {
		$this -> db -> select('a.*,b.pname,b.pdesc FROM inventory_tab a JOIN products_tab b ON a.ipid=b.pid WHERE (a.istatus=1 OR a.istatus=0) AND a.ipid=' . $id . ' AND a.ibid=' . $bid, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_adjustment($id, $type, $bid) {
		if ($type == 1)
			$this -> db -> select('SUM(oadjustplus) as total FROM opname_tab WHERE ostatus=1 AND oidid=' . $id . ' AND obid=' . $bid, FALSE);
		else
			$this -> db -> select('SUM(oadjustmin) as total FROM opname_tab WHERE ostatus=1 AND oidid=' . $id . ' AND obid=' . $bid, FALSE);
		$total = $this -> db -> get() -> result();
		return (int) $total[0] -> total;
	}
	
	function __insert_opname($data) {
        return $this -> db -> insert('opname_tab', $data);
	}
}
