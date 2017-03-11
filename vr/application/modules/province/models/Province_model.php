<?php
class Province_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_province_select($cid=0) {
		if ($cid)
			$this -> db -> select('pid,pname FROM province_tab WHERE pstatus=1 AND pcid='.$cid.' ORDER BY pname ASC', FALSE);
		else
			$this -> db -> select('pid,pname FROM province_tab WHERE pstatus=1 ORDER BY pname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_province() {
		$this -> db -> select('a.*,b.cname FROM province_tab a JOIN country_tab b ON a.pcid=b.cid WHERE (a.pstatus=1 OR a.pstatus=0) ORDER BY a.pname DESC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_province_detail($id) {
		$this -> db -> select('* FROM province_tab WHERE (pstatus=1 OR pstatus=0) AND pid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_province($data) {
        return $this -> db -> insert('province_tab', $data);
	}
	
	function __update_province($id, $data) {
        $this -> db -> where('pid', $id);
        return $this -> db -> update('province_tab', $data);
	}
	
	function __delete_province($id) {
		return $this -> db -> query('update province_tab set pstatus=2 where pid=' . $id);
	}
}
