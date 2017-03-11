<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function themes_url($str) {
	return site_url('themes/' . $str);
}

function __set_error_msg($arr, $duration=60) {
	$CI =& get_instance();
	return $CI -> cache -> memcached -> save('__msg', $arr, $duration);
}

function __get_error_msg() {
	$CI =& get_instance();
	$css = (isset($CI -> cache -> memcached -> get('__msg')['error']) ? 'danger' : 'success');
	
	if (isset($CI -> cache -> memcached -> get('__msg')['error']) || isset($CI -> cache -> memcached -> get('__msg')['info'])) {
		$msg = (isset($CI -> cache -> memcached -> get('__msg')['error']) ? $CI -> cache -> memcached -> get('__msg')['error'] : $CI -> cache -> memcached -> get('__msg')['info']);
		$res = '<div class="alert alert-'.$css.' alert-dismissable"><i class="fa fa-'.($css == 'success' ? 'check' : 'ban').'"></i> &nbsp; <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
		$res .= $msg;
		$res .= '</div>';
		$CI -> cache -> memcached -> delete('__msg');
		return $res;
	}
}

function __get_receiving_name($id, $type) {
	if ($type == 1) {
		$CI =& get_instance();
		$CI -> load -> model('vendor/vendor_model');
		return $CI -> vendor_model -> __get_vendor_name($id);
	}
	else
		return ($id == 1 ? 'Pusat' : 'Citraland');
}

function __get_status($status, $type) {
	if ($type == 1)
		return ($status == 1 ? 'Active' : 'Inactive');
	else
		return ($status == 1 ? 'Active <input type="radio" checked="checked" name="status" value="1" /> Inactive <input type="radio" name="status" value="0" />' : 'Active <input type="radio" name="status" value="1" /> Inactive <input type="radio" checked="checked" name="status" value="0" />');
}

function __get_receiving_type($id, $type) {
	if ($type == 1)
		return ($id == 1 ? 'Vendor' : 'Branch');
	else
		return ($id == 1 ? '<option value="1" selected>Vendor</option><option value="2">Branch</option>' : '<option value="1">Vendor</option><option value="2" selected>Branch</option>');
}

function __get_transaction_type($id, $type, $ttype=1) {
	if ($ttype == 1) {
		if ($type == 1)
			return ($id == 1 ? 'Online' : ($id == 2 ? 'All' : 'Offline'));
		else
			return ($id == 1 ? 'Online <input type="radio" checked="checked" name="ttype" value="1" /> Offline <input type="radio" name="ttype" value="0" />' : 'Online <input type="radio" name="ttype" value="1" /> Offline <input type="radio" checked="checked" name="ttype" value="0" />');
	}
	else {
		$arr = array('Offline', 'Online', 'All');
		if ($type == 1)
			return $arr[$id];
		else
			return 'All <input type="radio" name="ttype" value="2" checked="checked" /> Online <input type="radio" name="ttype" value="1" /> Offline <input type="radio" name="ttype" value="0" />';
	}
}

function __get_rupiah($num,$type=1) {
	if (!$num && $type == 1 || !$num && $type == 4) return '-';
	if ($type == 1) return number_format($num,0,',','.');
	elseif ($type == 2) return number_format($num,0,',',',');
	elseif ($type == 3) return number_format($num,0,',','.');
	elseif ($type == 4) return number_format($num,2,',','.');
	else return $num;
}

function __get_roles($key) {
    $arr = array();
    $CI =& get_instance();
    $roles = $CI -> privileges -> sesresult['permission'];
    foreach($roles as $k => $v)
        $arr[$v['uname']] = $v['uaccess'];
    return (isset($arr[$key]) ? $arr[$key] : '');
}

function __get_roles_by_id($key) {
    $arr = array();
    $CI =& get_instance();
    return $CI -> memcachedlib -> sesresult['gid'] !=  $key ? 'no' : '';
}

function __get_spelled($num) {
	$num = (float)$num;
	$bilangan = array(
	'',
	'satu',
	'dua',
	'tiga',
	'empat',
	'lima',
	'enam',
	'tujuh',
	'delapan',
	'sembilan',
	'sepuluh',
	'sebelas'
	);

	if ($num < 12) {
		return strtoupper($bilangan[$num]);
	}
	else if ($num < 20) {
		return strtoupper($bilangan[$num - 10] . ' belas');
	}
	else if ($num < 100) {
		$mod = (int)($num / 10);
		$hasil_mod = $num % 10;
		return strtoupper(trim(sprintf('%s puluh %s', $bilangan[$mod], $bilangan[$hasil_mod])));
	}
	else if ($num < 200) {
		return strtoupper(sprintf('seratus %s', __get_spelled($num - 100)));
	}
	else if ($num < 1000) {
		$mod = (int)($num / 100);
		$hasil_mod = $num % 100;
		return strtoupper(trim(sprintf('%s ratus %s', $bilangan[$mod], __get_spelled($hasil_mod))));
	}
	else if ($num < 2000) {
		return strtoupper(trim(sprintf('seribu %s', __get_spelled($num - 1000))));
	}
	else if ($num < 1000000) {
		$mod = (int)($num / 1000);
		$hasil_mod = $num % 1000;
		return strtoupper(sprintf('%s ribu %s', __get_spelled($mod), __get_spelled($hasil_mod)));
	}
	else if ($num < 1000000000) {
		$mod = (int)($num / 1000000);
		$hasil_mod = $num % 1000000;
		return strtoupper(trim(sprintf('%s juta %s', __get_spelled($mod), __get_spelled($hasil_mod))));
	}
	else if ($num < 1000000000000) {
		$mod = (int)($num / 1000000000);
		$hasil_mod = fmod($num, 1000000000);
		return strtoupper(trim(sprintf('%s milyar %s', __get_spelled($mod), __get_spelled($hasil_mod))));
	}
	else if ($num < 1000000000000000) {
		$mod = $num / 1000000000000;
		$hasil_mod = fmod($num, 1000000000000);
		return strtoupper(trim(sprintf('%s triliun %s', __get_spelled($mod), __get_spelled($hasil_mod))));
	}
	else {
		return 'Wow...';
	}
}

function __get_cities($id,$type=1) {
	$CI =& get_instance();
	$CI -> load -> library('city/city_lib');
	if ($type == 1) {
		$CI -> load -> model('city/city_model');
		$city = $CI -> city_model -> __get_city_detail($id);
		return $city[0] -> cname;
	}
	else {
		return $CI -> city_lib -> __get_city($id);
	}
}

function __get_province($id, $type=1) {
	$CI =& get_instance();
	$CI -> load -> library('province/province_lib');
	if ($type == 1) {
		$CI -> load -> model('province/province_model');
		$city = $CI -> province_model -> __get_province_detail($id);
		return $city[0] -> pname;
	}
	else
		return $CI -> province_lib -> __get_province($id);
}

function __get_customer_area($ctype, $type) {
	if ($type == 1) {
		if ($ctype == 0) return 'Online';
		else return 'Offline';
	}
	else {
		if ($ctype === 0) return 'Online <input type="radio" name="carea" value="0" checked="checked" /> Offline <input type="radio" name="carea" value="1" />';
		else return 'Online <input type="radio" name="carea" value="0" /> Offline <input type="radio" name="carea" value="1" checked="checked" />';
	}
}

function __get_customer_type($ctype, $type) {
	if ($type == 1) {
		if ($ctype == 0) return 'Seller';
		else return 'Buyer';
	}
	else {
		if ($ctype === 0) return 'Seller <input type="radio" name="ctype" value="0" checked="checked" /> Buyer <input type="radio" name="ctype" value="1" />';
		else return 'Seller <input type="radio" name="ctype" value="0" /> Buyer <input type="radio" name="ctype" value="1" checked="checked" />';
	}
}

function __get_date($str, $type=1) {
	if (!$str) return false;
	if ($type == 1) return date('d/m/Y', $str);
	elseif ($type == 2) return date('d', $str).' '.__get_month(date('m',$str)).' '.date('Y',$str);
	elseif ($type == 3) return date('d/m/Y H:i', $str);
	elseif ($type == 4) return date('d ').__get_month(date('m',$str)).date(' Y H:i:s',$str);
	elseif ($type == 5) return date('d ',$str).__get_month(date('m',$str)).date(' Y H:i',$str);
	else return date('d/m/y', $str);
}

function __get_new_product() {
	$CI =& get_instance();
	$CI -> load -> model('product/product_model');
	return $CI -> product_model -> __get_new_product();
}

function __get_order_stock_process($pid,$bid) {
	$CI =& get_instance();
	$CI -> load -> model('inventory/inventory_model');
	return $CI -> inventory_model -> __get_order_stock_process($pid,$bid);
}

function __get_adjustment($id, $type, $bid) {
	$CI =& get_instance();
	$CI -> load -> model('opname/opname_model');
	return $CI -> opname_model -> __get_adjustment($id, $type, $bid);
}

function __get_order_unapproved($bid) {
	$CI =& get_instance();
	$CI -> load -> model('order/order_model');
	return $CI -> order_model -> __get_order_unapproved($bid);
}

function __get_branch($id, $type) {
	$CI =& get_instance();
	if ($type == 1) {
		$CI -> load -> model('branch/branch_model');
		$det = $CI -> branch_model -> __get_branch_name($id);
		return $det[0] -> bname;
	}
	else if ($type == 2) {
		$CI -> load -> library('branch/branch_lib');
		return $CI -> branch_lib -> __get_branch($id,1);
	}
	else {
		$CI -> load -> library('branch/branch_lib');
		return $CI -> branch_lib -> __get_branch($id,2);
	}
}

function __get_month($id) {
	$id = (int) $id;
	$month = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	return $month[($id - 1)];
}

function __sortArrayByDate( $a, $b ) {
    return $a -> tdate - $b -> tdate;
}

function __get_transactions($arr) {
	$data = array('Purchase Order (JakVR)','Retur Order','Receiving','Purchase Order (KoekMurah)','All');
	$res = '';
	foreach($arr as $k => $v) $res .= $data[$v] . ' - ';
	return rtrim($res, ' - ');
}

function __get_reporting_type($id) {
	$data = array('All','Grouping Transaction','Grouping User');
	return $data[$id-1];
}

function __get_weight($id) {
	$weight = $id / 1000;
	if ($id < 1000 && $id > 0) return $id . ' gr';
	else if ($id >= 1000) return $weight . ' kg';
	else return 'Invalid weight';
}

function __get_guarantee($id) {
	$guarantee = $id / 7;
	if ($id == 1) return $id . ' day';
	else if ($id < 7) return $id . ' days';
	elseif ($id >= 7 && $id < 14) return $guarantee . ' week';
	elseif ($id >= 14 && $id < 30) return $guarantee . ' weeks';
	else if ($id >= 30 && $id < 60) return ($id / 30) . ' month';
	else if ($id >= 60 && $id < 365) return ($id / 30) . ' months';
	else if ($id >= 365 && $id < 730) return ($id / 365) . ' year';
	else if ($id >= 730) return ($id / 465) . ' years';
	else return 'No guarentee';
}

function __replace_link($str) {
	$badchar = array ('\'','<','>', '"', '$', '?', '!', ' ', ',', '#', '@', ';', '|', ')', '(', '}', '{', ']', '[', ':', '--', '\'', '%', '+', '\\', '&', '*', '/', '^', '`', '~', '.');
	$str = strtolower($str);
	$str = str_replace($badchar,'-',$str);
	$str = str_replace('--','-',$str);
	return ltrim($str,'-');
}
