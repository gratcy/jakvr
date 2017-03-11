<?php
class Users_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function __check_users($email) {
		$this -> db -> select("* FROM users_tab WHERE uemail='".$email."'");
		return $this -> db -> get() -> num_rows();
	}
    
	function __get_users_select() {
		$this -> db -> select('uid,uemail FROM users_tab WHERE ustatus=1', FALSE);
		return $this -> db -> get() -> result();
	}
    
	function __get_users() {
		$this -> db -> select('a.uid,a.uemail,a.ulastlogin,a.ustatus,b.uname from users_tab a, users_groups_tab b where a.ugid=b.uid and (a.ustatus=1 or a.ustatus=0) ORDER BY a.uid ASC', FALSE);
		return $this -> db -> get() -> result();
	}
	
	function __delete_users($id) {
		return $this -> db -> query('update users_tab set ustatus=2 where uid=' . $id);
	}
	
    function __update_users($uemail, $id, $gid, $ustatus) {
		return $this -> db -> query("update users_tab set uemail='".$uemail."',ugid=".$gid.", ustatus=".$ustatus." where uid=" . $id);
	}
	
	function __get_detail_users($id) {
		$this -> db -> select('a.uemail,a.ustatus,a.ugid from users_tab a where (a.ustatus=1 or a.ustatus=0) and a.uid=' . $id);
		return $this -> db -> get() -> result();
	}
	
	function __insert_users($uemail, $upass, $gid, $ustatus) {
		return $this -> db -> query("insert into users_tab (uemail,upass,ugid,ucreated,ustatus) values ('".$uemail."','".md5(sha1($upass, true))."',".$gid.",".time().",".$ustatus.")");
	}
	
	function __get_groups() {
		$this -> db -> select('uid,uname,ustatus from users_groups_tab where (ustatus=1 or ustatus=0) order by uname asc');
		return $this -> db -> get() -> result();
	}
	
	function __get_detail_users_group($id) {
        $this -> db -> where('uid', $id);
		return $this -> db -> get('users_groups_tab') -> result();
	}
	
	function __get_users_group() {
		$this -> db -> select('* from users_groups_tab where (ustatus = 1 or ustatus=0) order by uid desc');
		return $this -> db -> get() -> result();
	}
	
	function __delete_users_group($id) {
		return $this -> db -> query('update users_groups_tab set ustatus=2 where uid=' . $id);
	}
	
	function __insert_users_group($group) {
        return $this -> db -> insert('users_groups_tab', $group);
	}
	
	function __update_users_group($id, $group) {
        $this -> db -> where('uid', $id);
        return $this -> db -> update('users_groups_tab', $group);
	}
	
	function __update_permission($uid, $perm, $access) {
		return $this -> db -> query('update users_access_tab set uaccess='.$access.' where ugid='.$uid.' and upid=' . $perm);
	}
	
	function __insert_permission($perm) {
        return $this -> db -> insert('users_access_tab', $perm);
	}
	
	function __get_permission($type,$uid) {
		if ($type == 1)
			$this -> db -> select('uid,uname,udesc,uparent from users_permission_tab', FALSE);
		else
			$this -> db -> select('a.uaccess,b.uname,b.udesc,b.uid,b.uparent from users_access_tab a, users_permission_tab b where a.upid=b.uid and a.ugid=' . $uid, FALSE);
        return $this -> db -> get() -> result();
	}
}
