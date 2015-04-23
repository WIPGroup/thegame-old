<?php
session_start();
require "dblogin.php";

require "login.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
if ($prihlasen)
	echo '<meta http-equiv="refresh" content="10; url=index.php">';
?>
</head>
<body>
<h1>TheGame - Trh</h1>
<?php
if ($prihlasen)
	include "trh.php";
else
	include "form.php";
?>
</body>
</html>
