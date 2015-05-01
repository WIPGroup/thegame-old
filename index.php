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
	<body style="background-color: #eee;padding-top: 70px">
		<?php
		include "components/navbar.php";
		if ($prihlasen)
		{
			echo "Souhrn, vlastnictví, oznámení a jiné kraviny...";
			echo "<div id=\"vlastnictvi\"></div>";
			//include "trh.php";
		}
		else
		{
			include "components/form.php";
		}
		?>
	</body>
</html>
