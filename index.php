<?php
session_start();
require "dblogin.php";

if ($_POST['hrac'] == "jirvoz")
	$_SESSION['hrac'] = 'jirvoz';
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
if ($_SESSION['hrac'] != '')
	echo '<meta http-equiv="refresh" content="1; url=index.php">';
?>
</head>
<body>
<h1>Trh</h1>
<?php
/*if ($_SESSION['hrac'] != '')
	include "trh.php";
else
	include "login.php";*/

$dotaz = "SELECT * FROM polozky";
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
$zaznam = mysql_fetch_array($vysledek);
print_r($zaznam);
?>
</body>
</html>
