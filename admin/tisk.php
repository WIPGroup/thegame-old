<?php
session_start();
require '../dblogin.php';
require '../login.php';
echo "<html><head></head><bodyi style=\"font-family:'Monospace'\">";
if ($prihlasen && $_SESSION['hrac'] == 1)
{
	$dotaz = 'SELECT * FROM kupony ORDER BY cas';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		echo strtoupper($zaznam['kod'])."&nbsp;";
	}

}
else
	die('Nejsi admin.');
echo "</body></html>";
?>
