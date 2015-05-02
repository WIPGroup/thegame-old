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
			echo "<h1>Výroba nových předmětů z jiných</h1>";
		}
		else
		{
			include "components/form.php";
		}
		include "components/footer.php";
		?>
	</body>
</html>
