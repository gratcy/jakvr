<?php
class Color_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_color() {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 ORDER BY cid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __get_color_select() {
		$this -> db -> select('cid,cname,cdesc FROM categories_tab WHERE cstatus=1 AND ctype=5 ORDER BY cname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_color_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=5 AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_color($data) {
        return $this -> db -> insert('categories_tab', $data);
	}
	
	function __update_color($id, $data) {
        $this -> db -> where('ctype', 5);
        $this -> db -> where('cid', $id);
        return $this -> db -> update('categories_tab', $data);
	}
	
	function __delete_color($id) {
		return $this -> db -> query('UPDATE categories_tab SET cstatus=2 WHERE ctype=5 AND cid=' . $id);
	}
}
