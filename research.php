<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
if ($prihlasen){
	include "components/sestava.php"; //pro kazdou sestavu jednou
	include "components/sestava.php";
	//include "components/progress.php"; žere moc
	include "components/researchtree.php";
} else {
	include "components/form.php";
}
?>
</body>
</html>
