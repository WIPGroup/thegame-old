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
		echo '<div class="col-lg-3 col-xs-12">';
		include "components/sestava.php"; //pro kazdou sestavu jednou
		include "components/sestava.php";
		include "components/progress.php";
		echo '</div>';
		include "components/researchtree.php";
	}
	else
	{
		include "components/form.php";
	}
	?>
</body>
</html>
