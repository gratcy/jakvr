<?php
class Branch_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_branch() {
		$this -> db -> select('a.*,b.cname as country,c.pname as province,d.cname as city FROM branch_tab a LEFT JOIN country_tab b ON a.bcountry=b.cid LEFT JOIN province_tab c ON a.bprovince=c.pid LEFT JOIN city_tab d ON a.bcity=d.cid WHERE (a.bstatus=1 OR a.bstatus=0) ORDER BY a.bid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __get_branch_select() {
		$this -> db -> select('bid,bname FROM branch_tab WHERE bstatus=1 ORDER BY bname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_branch_name($id) {
		$this -> db -> select('bname FROM branch_tab WHERE (bstatus=1 OR bstatus=0) AND bid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __get_branch_detail($id) {
		$this -> db -> select('* FROM branch_tab WHERE (bstatus=1 OR bstatus=0) AND bid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_branch($data) {
        return $this -> db -> insert('branch_tab', $data);
	}
	
	function __update_branch($id, $data) {
        $this -> db -> where('bid', $id);
        return $this -> db -> update('branch_tab', $data);
	}
	
	function __delete_branch($id) {
		return $this -> db -> query('UPDATE branch_tab SET bstatus=2 WHERE bid=' . $id);
	}
}
