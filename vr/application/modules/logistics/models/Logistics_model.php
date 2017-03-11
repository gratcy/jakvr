<?php
class Logistics_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_logistics() {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=3 ORDER BY cid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __get_logistics_select() {
		$this -> db -> select('cid,cname FROM categories_tab WHERE cstatus=1 AND ctype=3 ORDER BY cname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_logistics_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=3 AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_logistics($data) {
        return $this -> db -> insert('categories_tab', $data);
	}
	
	function __update_logistics($id, $data) {
        $this -> db -> where('cid', $id);
        return $this -> db -> update('categories_tab', $data);
	}
	
	function __delete_logistics($id) {
		return $this -> db -> query('UPDATE categories_tab SET cstatus=3 WHERE cid=' . $id);
	}
}
