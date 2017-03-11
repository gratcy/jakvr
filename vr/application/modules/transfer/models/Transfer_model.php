<?php
class Transfer_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_transfer($bid) {
		$this -> db -> select('a.*,b.rno,c.bname as bfrom,d.bname as bto FROM transfer_tab a JOIN request_tab b ON a.trid=b.rid JOIN branch_tab c ON b.rfrom=c.bid JOIN branch_tab d ON b.rto=d.bid WHERE tstatus!=2 AND (b.rfrom='.$bid.' OR b.rto='.$bid.') ORDER BY tid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_transfer_detail($id) {
		$this -> db -> select('* FROM transfer_tab WHERE (tstatus=1 OR tstatus=0) AND tid=' . $id);
		return $this -> db -> get() -> result();
	}
    
	function __get_total_today_transfer() {
		$this -> db -> select("* FROM transfer_tab WHERE FROM_UNIXTIME(tdate, '%Y-%m-%d')='".date('Y-m-d')."' AND tstatus!=2", FALSE);
		return $this -> db -> get() -> num_rows();
	}
	
	function __get_transfer_detail_approved($bid,$id) {
		$this -> db -> select('a.*,b.rno,c.bname as bfrom,d.bname as bto FROM transfer_tab a JOIN request_tab b ON a.trid=b.rid JOIN branch_tab c ON b.rfrom=c.bid JOIN branch_tab d ON b.rto=d.bid WHERE tstatus!=2 AND (b.rfrom='.$bid.' OR b.rto='.$bid.') AND tid=' . $id, FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __insert_transfer($data) {
        return $this -> db -> insert('transfer_tab', $data);
	}
	
	function __update_transfer($id, $data) {
        $this -> db -> where('tid', $id);
        return $this -> db -> update('transfer_tab', $data);
	}
	
	function __delete_transfer($id) {
		return $this -> db -> query('UPDATE transfer_tab SET tstatus=2 WHERE tid=' . $id);
	}
}
