<?php
require "../dblogin.php";

if (is_numeric($_GET['hrac']))
{
	$body = 0;
	$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$_GET['hrac'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$body += $zaznam['vykon'] * ((time() - $zaznam['sbercas']) / 60);

		$dotaz = 'UPDATE sestavy SET sbercas='.time(); //TODO $zaznam['sbercas'];
		mysql_query($dotaz);
	}

	//TODO: updatovat hráče
}
?>
