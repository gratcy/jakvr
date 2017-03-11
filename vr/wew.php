<?php
$conn = mysql_connect('localhost', 'root', 'Idgs2015!');
$db = mysql_select_db('vr_db', $conn);

// $str = file_get_contents('jakmall.csv');
// $str = explode("\n", $str);
// $str = explode(";", $str);
// $res = '';
// foreach($str as $k => $v) {
	// $v = explode(";", $v);
	// foreach($v as $k1 => $v1) {
		// if (preg_match('/^([0-9]{4}\-[0-9]{2}\-[0-9]{2})/i', $v1)) $v1 = strtotime($v1);
		// $res .= $v1 . "\t";
	// }
// }
// echo $res;
// var_dump($str);

$sql = mysql_query('SELECT * FROM transaction_others_tab');
while($r = mysql_fetch_array($sql)) :
	if (!preg_match('/INV/i',$r['tinv'])) mysql_query('UPDATE transaction_others_tab SET treffer=4 WHERE tid=' . $r['tid']);
	else mysql_query('UPDATE transaction_others_tab SET treffer=7 WHERE tid=' . $r['tid']);
endwhile;