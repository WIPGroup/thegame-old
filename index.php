<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
 @import "http://94.125.220.136/css/status/externalStatus.css";
</style>
<?php
require "dblogin.php";

require "login.php";
if (isset($_GET['trade']) || isset($_GET['']))
	echo '<meta http-equiv="refresh" content="0; url=index.php">';
?>
<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
<script src="scripts.js"></script>
</head>
<body>
<script type="text/javascript" src="http://94.125.220.136/externalStatus.html?js=1&projectId=TheGame"></script>
<hr>
<h1>TheGame - Trh</h1>
<?php
if ($prihlasen)
	include "trh.php";
else
	include "form.php";
?>
</body>
</html>
