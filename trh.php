<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
		require "dblogin.php";
		require "login.php";
		require "components/head.php";
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
		require "components/footer.php";
		?>
	</body>
</html>
