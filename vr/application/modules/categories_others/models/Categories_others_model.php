<?php
class Categories_others_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_categories() {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=4 ORDER BY cid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __get_categories_select() {
		$this -> db -> select('cid,cname FROM categories_tab WHERE cstatus=1 AND ctype=4 ORDER BY cname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_categories_detail($id) {
		$this -> db -> select('* FROM categories_tab WHERE (cstatus=1 OR cstatus=0) AND ctype=4 AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_categories($data) {
        return $this -> db -> insert('categories_tab', $data);
	}
	
	function __update_categories($id, $data) {
        $this -> db -> where('ctype', 4);
        $this -> db -> where('cid', $id);
        return $this -> db -> update('categories_tab', $data);
	}
	
	function __delete_categories($id) {
		return $this -> db -> query('UPDATE categories_tab SET cstatus=2 WHERE ctype=4 AND cid=' . $id);
	}
}
