<?php

session_start();
include '../vlastnictvi.php';
include 'updatesestav.php';
$veci = null;
$dotaz = 'SELECT * FROM veci';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	$veci[$zaznam['idveci']] = $zaznam['nazev'];
	$typ[$zaznam['idveci']] = $zaznam['typ'];
}
$pocveci = count($veci);
$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$_SESSION['hrac'];
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<div class="col-md-5 col-xs-12"><div class="panel panel-primary"><div class="panel-heading"><h1 class="panel-title">';
	echo 'Výkon: '.$zaznam['vykon'].', spotřeba: '.$zaznam['spotreba'];
	echo '</h1></div><div class="panel-body">';

	if ($zaznam['vyzkum'] == 1)
		$prepnout = 'skóre';
	else
		$prepnout = 'výzkum';

	echo '<button href="#prepnout" class="switch btn btn-primary" data-idsestavy="'.$zaznam['idsestavy'].'">Přepnout na '.$prepnout.'</button>';
	echo '<button href="#rozebrat" class="disass btn btn-primary" data-idsestavy="'.$zaznam['idsestavy'].'">Rozobrať</button>';

	echo '</div><ul class="list-group">';
	$obsah = explode(';', $zaznam['obsah']);
	for ($i = 0; $i < $pocveci; $i++)
		if ($obsah[$i] > 0)
		{
			echo '<li class="list-group-item '.$typ[$i].'">';
			if ($obsah[$i] > 1)
				echo $obsah[$i].'x ';
			echo $veci[$i].'</li>';
		}
	echo '</ul></div></div>';
}
