<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen){
	echo "<h1>Výroba nových předmětů z jiných</h1>";
} else {
	include "components/form.php";
}
?>
</body>
</html>

