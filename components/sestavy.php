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
			if ($obsah[$i] > 1)
				echo '<span class="badge">'.$obsah[$i].'</span>';
			echo $veci[$i].'	';
			echo ', ';
		}
	echo 'Výkon: '.$zaznam['vykon'].'<br>';
	echo 'přepnutí body/výzkum; tlačítko rozebrat<br>';
}
?>
