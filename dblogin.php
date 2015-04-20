<?php
$host='localhost';
$user='root';
$passwd='root';
$databaze='trh';
$db = mysql_connect($host, $user, $passwd) or die('Nedá sa pripojiť do databáze');
mysql_select_db($databaze, $db) or die(mysql_error($db));
mysql_query('SET NAMES UTF8');
mysql_query('SET COLLATION_CONNECTION=utf8_general_ci');
?>
