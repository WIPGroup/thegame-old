<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
<form action="dotaz.php" method="GET">
<?php
echo '	<input name="dotaz" id="dotaz" style="width:500px" value="';
echo $_GET['dotaz'];
echo '">';
?>
	<button type="submit">Spáchat</button>
</form>
<?php
	//testování sql dotazů
	if (isset($_GET['dotaz']))
	{
		include "dblogin.php";
		$vysledek = mysql_query($_GET['dotaz']) or die(mysql_error($db));
		while ($zaznam = mysql_fetch_array($vysledek))
		{
			print_r($zaznam);
			echo "<br>";
		}
	}
?>
</body>
