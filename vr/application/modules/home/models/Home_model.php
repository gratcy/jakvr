<?php
class Home_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }

	function __get_total_product() {
		$sql = $this -> db -> query('SELECT * FROM products_tab WHERE pstatus!=2');
		return $sql -> num_rows();
	}

	function __get_total_customer() {
		$sql = $this -> db -> query('SELECT * FROM customers_tab WHERE (cstatus=1 OR cstatus=0)');
		return $sql -> num_rows();
	}

	function __get_total_stock($bid) {
		$this -> db -> select('SUM(istock) as total FROM inventory_tab WHERE (istatus=1 OR istatus=0) AND ibid=' . $bid);
		$r = $this -> db -> get() -> result();
		return (int) $r[0] -> total;
	}

	function __get_total_order() {
		$sql = $this -> db -> query("SELECT * FROM transaction_tab WHERE FROM_UNIXTIME(tdate, '%Y-%m-%d')='".date('Y-m-d')."' AND titype=1 AND tstatus!=2");
		return $sql -> num_rows();
	}
}
