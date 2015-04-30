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
		include "components/navbar.php"
		if ($prihlasen)
		{
			include "nakupovani.php";
		}
		else
		{
			include "form.php";
		}
		?>
	</body>
</html>
