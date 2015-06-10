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
echo '<nav>';
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<ul class="pagination">';
	$obsah = explode(';', $zaznam['obsah']);
	for ($i = 0; $i < $pocveci; $i++)
		if ($obsah[$i] > 0)
		{
			echo '<li><a>';
			if ($obsah[$i] > 1)
				echo '<span class="badge">'.$obsah[$i].'</span>';
			echo $veci[$i].'</a></li>';
		}
	echo '<li>Výkon: '.$zaznam['vykon'].'</li>';
	echo '<li>přepnutí body/výzkum; tlačítko rozebrat</li></ul>';
}
echo '</nav>';
?>
