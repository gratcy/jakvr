<?php
class Login_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __get_login($uemail, $upass) {
		$this -> db -> select("a.uid,a.uemail,a.unick,a.ugid,a.ucreated from users_tab a where a.uemail='".$uemail."' and a.upass='".md5(sha1($upass, true))."' and a.ustatus=1");
		return $this -> db -> get() -> result();
	}
	
	function __get_permission($id) {
		$this -> db -> select('a.uname,a.uurl,b.uaccess from users_permission_tab a JOIN users_access_tab b ON a.uid=b.upid WHERE b.ugid= ' . $id, FALSE);
		return $this -> db -> get() -> result_array();
	}
	
	function __update_history_login($id, $data) {
        $this -> db -> where('uid', $id);
        return $this -> db -> update('users_tab', $data);
	}
}
