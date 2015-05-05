<?php
	session_start();
	echo "<h3>Moje výroba:</h3>";
	
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$veci[$zaznam['idveci']] = $zaznam['nazev'];
	}
	
	$dotaz = 'SELECT * FROM vyroba, recepty WHERE recept=idreceptu AND hrac='.$_SESSION['hrac'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		echo $veci[$zaznam['vyrobek']].', hotovo za '.($zaznam['hotovo']-time()).' s ('.date('G:i:s j.n.Y', $zaznam['hotovo']).').<br>';
	}
?>
