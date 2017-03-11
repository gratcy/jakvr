<?php
class Customer_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_customer() {
		$this -> db -> select('a.*,b.cname as country,c.pname,d.cname as city FROM customers_tab a LEFT JOIN country_tab b ON a.ccountry=b.cid LEFT JOIN province_tab c ON a.cprovince=c.pid LEFT JOIN city_tab d ON a.ccity=d.cid WHERE (a.cstatus=1 OR a.cstatus=0) AND a.cid!=0 ORDER BY a.cid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __check_duplicate_phone($phone) {
		$ck = '';
		if (strlen($phone[0]) > 1 && strlen($phone[1]) > 1) $ck = "(cphone LIKE '%".$phone[0]."%' OR cphone LIKE '%".$phone[1]."%')";
		elseif (strlen($phone[0]) > 1 && strlen($phone[1]) < 1) $ck = "cphone LIKE '%".$phone[0]."%'";
		else $ck = "cphone LIKE '%".$phone[1]."%'";

		$this -> db -> select("* FROM customers_tab WHERE cstatus=1 AND ".$ck."", FALSE);
		return $this -> db -> get() -> num_rows();
	}
    
	function __get_customer_select() {
		$this -> db -> select('cid,cname,cphone,ctype FROM customers_tab WHERE cstatus=1 ORDER BY cname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_customer_select_last() {
		$this -> db -> select('cid,cname,ctype FROM customers_tab WHERE cstatus=1 ORDER BY cid DESC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __get_customer_detail($id) {
		$this -> db -> select('* FROM customers_tab WHERE (cstatus=1 OR cstatus=0) AND cid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_customer($data) {
        return $this -> db -> insert('customers_tab', $data);
	}
	
	function __update_customer($id, $data) {
        $this -> db -> where('cid', $id);
        return $this -> db -> update('customers_tab', $data);
	}
	
	function __delete_customer($id) {
		return $this -> db -> query('UPDATE customers_tab SET cstatus=2 WHERE cid=' . $id);
	}
}
