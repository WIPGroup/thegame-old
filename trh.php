<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
		require "dblogin.php";
		require "login.php";
		include "components/head.php";
		?>
	</head>
	<body>
		<?php
		include "components/navbar.php";
		if ($prihlasen)
		{
			include "nakupovani.php";
		}
		else
		{
			include "components/form.php";
		}
		?>
	</body>
</html>
