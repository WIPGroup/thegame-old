<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php
	require "dblogin.php";
	require "login.php";
	include "components/head.php"
	?>
</head>
<body>
	<?php
	include "components/navbar.php";
	if ($prihlasen)
	{
		include "components/sestava.php"; //pro kazdou sestavu jednou
		include "components/sestava.php";
		include "components/progress.php";
		include "components/researchtree.php";
	}
	else
	{
		include "components/form.php";
	}
	?>
</body>
</html>
