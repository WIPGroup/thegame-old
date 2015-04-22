<?php
session_start();
require "dblogin.php";

/*if ($_POST['hrac'] == "root")
	$_SESSION['hrac'] = 'root';*/
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--?php
if ($_SESSION['hrac'] != '')
	echo '<meta http-equiv="refresh" content="1; url=index.php">';
?-->
</head>
<body>
<h1>Trh</h1>
<?php
require "login.php";

if ($prihlasen)
	include "trh.php";
else
	include "form.php";
?>
</body>
</html>
