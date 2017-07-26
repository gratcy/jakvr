<?php
$str = file_get_contents('http://jakvr.com/jak-api/get_search_results/?search=gamesir');
$wew = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $str),true);
$pages = (int) $wew['pages'];

$count_total = 0;
$posts = array();
for($i=1;$i<=$pages;++$i) {
	$str = file_get_contents('http://jakvr.com/jak-api/get_search_results/?search=gamesir&page=' . $i);
	$wewr = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $str),true);
	
	$posts[$i] = $wewr['posts'];
	$count_total = $wewr['count_total'];
}
$rposts = array();
foreach($posts as $key => $val) {
	foreach($val as $k => $v) $rposts[] = $v;
}
file_put_contents('tmp.json', json_encode(array('count_total' => $count_total, 'posts' => $rposts)));
