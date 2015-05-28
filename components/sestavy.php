<?php
session_start();
include "../vlastnictvi.php";
$veci = null;
$dotaz = 'SELECT * FROM veci';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$veci[$zaznam['idveci']] = $zaznam['nazev'];
}
$pocveci = count($veci);
$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$obsah = explode(';', $zaznam['obsah']);
	for ($i = 0; $i < $pocveci; $i++)
	if ($obsah[$i] > 0)
	{
		echo $veci[$i];
		if ($obsah[$i] > 1)
			echo ' ('.$obsah[$i].')';
		echo ', ';
	}
	echo 'Výkon: '.$zaznam['vykon'].'<br>';
}
?>
