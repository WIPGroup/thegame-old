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
				echo $obsah[$i].'x ';
			echo $veci[$i].'</a></li>';
		}
	echo '<li><a>Výkon: '.$zaznam['vykon'].'</a></li>';
	
	if ($zaznam['vyzkum'] == 1)
		$prepnout = "skóre";
	else
		$prepnout = "výzkum";

	echo '<li><a href="#prepnout" class="switch" data-idsestavy="'.$zaznam['idsestavy'].'">Přepnout na '.$prepnout.'</a></li>'; 
	echo '<li><a href="#rozebrat" class="disass" data-idsestavy="'.$zaznam['idsestavy'].'">Rozobrať</a></li></ul>'; 
}
echo '</nav>';
?>