<?php
session_start();
require '../dblogin.php';
require '../login.php';
echo "<html><head></head><bodyi style=\"font-family:'DejaVu Sans Mono'; font-size:16px\">";
if ($prihlasen && $_SESSION['hrac'] == 1)
{
	$dotaz = 'SELECT * FROM kupony ORDER BY cas';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		echo '&nbsp;__________<br>';
		echo '<&nbsp;'.strtoupper($zaznam['kod']).'&nbsp;><br>';
		echo '&nbsp;----------<br>';
 		echo '&nbsp;&nbsp;\&nbsp;&nbsp;&nbsp;^__^<br>';
 		echo '&nbsp;&nbsp;&nbsp;\&nbsp;&nbsp;(oo)\_______<br>';
 		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(__)\&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)\/\\<br>';
 		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||----w&nbsp;|<br>';
 		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;||<br>';
	}
}
else
	die('Nejsi admin.');
echo "</body></html>";
?>
