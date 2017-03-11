<?php
class Reffer_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_reffer() {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=2 ORDER BY cid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __get_reffer_select() {
		$this -> db -> select('cid,cname FROM categories_tab WHERE cstatus=1 AND ctype=2 ORDER BY cname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_reffer_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=2 AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_reffer($data) {
        return $this -> db -> insert('categories_tab', $data);
	}
	
	function __update_reffer($id, $data) {
        $this -> db -> where('cid', $id);
        return $this -> db -> update('categories_tab', $data);
	}
	
	function __delete_reffer($id) {
		return $this -> db -> query('UPDATE categories_tab SET cstatus=2 WHERE cid=' . $id);
	}
}
