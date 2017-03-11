<?php
if (!function_exists('__get_ip')) {
	function __get_ip() {
		return ip2long($_SERVER['REMOTE_ADDR']);
	}
}

if (!function_exists('__ajax_doaction')) {
	function __ajax_doaction($error) {
		echo $error;die;
	}
}

function __custvalidation($pat,$str) {
	if (preg_match($pat, $str))	return true;
}

function __redirect($redirect) {
	exit('<META http-equiv="refresh" content="0;URL='.$redirect.'" />');
}

function __text_cuts($string, $trimLength=50) {
	$string = trim(strip_tags($string));
	$length = strlen($string);
	if ($length > $trimLength) {
		$count = 0;
		$prevCount = 0;
		$array = explode(" ", $string);
		foreach ($array as $word) {
			$count = $count + strlen($word);
			$count = $count + 1;
			if ($count > ($trimLength - 3)) return substr($string, 0, $prevCount) . "...";
			$prevCount = $count;
		}
	}
    else
		return $string;
}

function __html_minify($str) {
	return $str;
}

function __get_rupiah($num,$type=1) {
	if ($type == 1) return "Rp. " . number_format($num,0,',','.');
	elseif ($type == 2) return number_format($num,0,',',',');
	elseif ($type == 3) return number_format($num,0,',','.');
	else return "Rp. " . number_format($num,2,',','.');
}
function __get_var($get) {
	$banwords = array ('\'', ',', ';', '--', '\'', '%', '+', '\\', '&');
	$get = strip_tags($get);
	if (!preg_match('/^[-a-zA-Z0-9_=\?]{0,50}$/', $get)) $get = str_replace ( $banwords, '', $get);
	return addslashes($get);
}

function __site_url($url='') {
	global $conf;
	return $conf['site']['__url'].$url;
}

function __get_requesturi($int) {
	$res = explode('/', $_SERVER['REQUEST_URI']);
	$res = array_filter($res);
	$result = array();
	for($i=1;$i<=count($res);++$i) if (!empty($res[$i])) $result[] = ($res[$i] ? $res[$i] : 0);
	return (isset($result[$int]) ? __requesturi_fixed($result[$int]) : 0);
}

function __replace_link($str) {
	$badchar = array ('\'','<','>', '"', '$', '?', '!', ' ', ',', '#', '@', ';', '|', ')', '(', '}', '{', ']', '[', ':', '--', '\'', '%', '+', '\\', '&', '*', '/', '^', '`', '~', '.');
	$str = strtolower($str);
	$str = str_replace($badchar,'-',$str);
	$str = str_replace('--','-',$str);
	return ltrim($str,'-');
}

function __requesturi_fixed ($str) {
	preg_match('/(.*)\?/', $str, $matches);
	return ($matches ? $matches[1] : $str);
}

function __get_guarantee($id) {
	$guarantee = $id / 7;
	if ($id == 1) return $id . ' hari';
	else if ($id < 7) return $id . ' hari';
	elseif ($id >= 7 && $id < 14) return $guarantee . ' minggu';
	elseif ($id >= 14 && $id < 30) return $guarantee . ' minggu';
	else if ($id >= 30 && $id < 60) return ($id / 30) . ' bulan';
	else if ($id >= 60 && $id < 365) return ($id / 30) . ' bulan';
	else if ($id >= 365 && $id < 730) return ($id / 365) . ' tahun';
	else if ($id >= 730) return ($id / 465) . ' tahun';
	else return 'No guarentee';
}

function __get_weight($id) {
	$weight = $id / 1000;
	if ($id < 1000 && $id > 0) return $id . ' gr';
	else if ($id >= 1000) return $weight . ' kg';
	else return 'Invalid weight';
}
