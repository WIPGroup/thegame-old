<?php
session_start();
require "dblogin.php";

require "login.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
 @import "http://94.125.220.136/css/status/externalStatus.css";
</style>
<!--?php
if ($prihlasen)
	echo '<meta http-equiv="refresh" content="10; url=index.php">';
?-->
<?php
if ($_GET['trade'] != '' || $_GET[''] != '')
	echo '<meta http-equiv="refresh" content="0; url=index.php">';
?>
</head>
<body>
<script type="text/javascript" src="http://94.125.220.136/externalStatus.html?js=1&projectId=TheGame"></script>
<hr>
<h1>TheGame - Trh</h1>
<?php
echo "hi";
if ($prihlasen)
	include "trh.php";
else
	include "form.php";
?>
<br><br>
</body>
</html>
