<?php
class Country_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_country_select() {
		$this -> db -> select('cid,cname FROM country_tab WHERE cstatus=1 ORDER BY cname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_country() {
		$this -> db -> select('a.* FROM country_tab a WHERE (a.cstatus=1 OR a.cstatus=0) ORDER BY a.cname DESC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_country_detail($id) {
		$this -> db -> select('* FROM country_tab WHERE (cstatus=1 OR cstatus=0) AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_country($data) {
        return $this -> db -> insert('country_tab', $data);
	}
	
	function __update_country($id, $data) {
        $this -> db -> where('cid', $id);
        return $this -> db -> update('country_tab', $data);
	}
	
	function __delete_country($id) {
		return $this -> db -> query('update country_tab set cstatus=2 where cid=' . $id);
	}
}
