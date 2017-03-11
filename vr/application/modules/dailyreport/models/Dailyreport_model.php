<?php
class Dailyreport_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
	function __get_daily_report($uid, $gid) {
		$this -> db -> select('a.*,b.unick FROM report_work_tab a JOIN users_tab b ON a.ruid=b.uid WHERE (a.rstatus=1 OR a.rstatus=0 OR a.rstatus=3) order by a.rid DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_daily_report_detail($id, $uid) {
		$this -> db -> select('* FROM report_work_tab WHERE (rstatus=1 OR rstatus=0) AND ruid='.$uid.' AND rid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_daily_report($data) {
        return $this -> db -> insert('report_work_tab', $data);
	}
	
	function __update_daily_report($id, $uid, $data) {
        $this -> db -> where('rid', $id);
        if ($uid) $this -> db -> where('ruid', $uid);
        return $this -> db -> update('report_work_tab', $data);
	}
}
