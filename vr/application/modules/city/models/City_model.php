<?php
class City_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_city_select($pid=0) {
		if ($pid)
			$this -> db -> select('cid,cname FROM city_tab WHERE cstatus=1 AND cpid='.$pid.' ORDER BY cname ASC', FALSE);
		else
			$this -> db -> select('cid,cname FROM city_tab WHERE cstatus=1 ORDER BY cname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_city() {
		$this -> db -> select('a.*,b.pname,c.cname as country FROM city_tab a JOIN province_tab b ON a.cpid=b.pid JOIN country_tab c ON b.pcid=c.cid WHERE (a.cstatus=1 OR a.cstatus=0) ORDER BY a.cname DESC');
		return $this -> db -> get() -> result();
	}
	
	function __get_city_detail($id) {
		$this -> db -> select('* FROM city_tab WHERE (cstatus=1 OR cstatus=0) AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_city($data) {
        return $this -> db -> insert('city_tab', $data);
	}
	
	function __update_city($id, $data) {
        $this -> db -> where('cid', $id);
        return $this -> db -> update('city_tab', $data);
	}
	
	function __delete_city($id) {
		return $this -> db -> query('update city_tab set cstatus=2 where cid=' . $id);
	}
}
