<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php
		require "dblogin.php";
		require "login.php";
		require "components/head.php"
		?>
	</head>
	<body>
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
		require "components/footer.php";
		?>
	</body>
</html>
