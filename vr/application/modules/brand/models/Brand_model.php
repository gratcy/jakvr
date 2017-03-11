<?php
class Brand_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_brand() {
		$this -> db -> select('* FROM brand_tab WHERE (bstatus=1 OR bstatus=0) ORDER BY bid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __get_brand_select() {
		$this -> db -> select('bid,bname FROM brand_tab WHERE bstatus=1 ORDER BY bname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_brand_detail($id) {
		$this -> db -> select('* FROM brand_tab WHERE (bstatus=1 OR bstatus=0) AND bid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_brand($data) {
        return $this -> db -> insert('brand_tab', $data);
	}
	
	function __update_brand($id, $data) {
        $this -> db -> where('bid', $id);
        return $this -> db -> update('brand_tab', $data);
	}
	
	function __delete_brand($id) {
		return $this -> db -> query('UPDATE brand_tab SET bstatus=2 WHERE bid=' . $id);
	}
}
