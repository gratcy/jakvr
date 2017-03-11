<?php
class Vendor_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
	
	function __get_vendor() {
		$this -> db -> select('a.*,b.cname,c.pname,d.cname as city FROM vendor_tab a JOIN country_tab b ON a.vcountry=b.cid JOIN province_tab c ON a.vprovince=c.pid JOIN city_tab d ON a.vcity=d.cid WHERE (a.vstatus=1 OR a.vstatus=0) ORDER BY a.vid DESC');
		return $this -> db -> get() -> result();
	}
    
	function __get_vendor_select() {
		$this -> db -> select('vid,vname FROM vendor_tab WHERE vstatus=1 ORDER BY vname ASC', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_vendor_name($id) {
		$this -> db -> select('vname FROM vendor_tab WHERE vid=' . $id, FALSE);
		$res = $this -> db -> get() -> result();
		return $res[0] -> vname;
	}
	
	function __get_vendor_detail($id) {
		$this -> db -> select('* FROM vendor_tab WHERE (vstatus=1 OR vstatus=0) AND vid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_vendor($data) {
        return $this -> db -> insert('vendor_tab', $data);
	}
	
	function __update_vendor($id, $data) {
        $this -> db -> where('vid', $id);
        return $this -> db -> update('vendor_tab', $data);
	}
	
	function __delete_vendor($id) {
		return $this -> db -> query('UPDATE vendor_tab SET vstatus=2 WHERE vid=' . $id);
	}
}
