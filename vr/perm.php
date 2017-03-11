<?php
$conn = mysql_connect('localhost', 'root', 'Idgs2015!');
$db = mysql_select_db('vr_db', $conn);

$str = file_get_contents('jakmall.csv');
$str = explode("");