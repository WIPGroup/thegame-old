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
	$id[$zaznam['idveci']] = $zaznam['idveci'];
}
$pocveci = count($veci);
$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$_SESSION['hrac'];
if ($_SESSION['hrac'] == 1)
	$dotaz = 'SELECT * FROM sestavy, hraci WHERE hrac=idhrace ORDER BY jmeno';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<div class="col-md-4 col-sm-6 col-xs-12"><div class="panel panel-primary"><div class="panel-heading"><h1 class="panel-title">';
	echo 'Výkon: '.$zaznam['vykon'].', spotreba: '.$zaznam['spotreba'];
	if ($_SESSION['hrac'] == 1)
		echo ' ('.$zaznam['jmeno'].')';
	echo '</h1></div><div class="panel-body">';

	if ($zaznam['vyzkum'] == 1)
		$prepnout = 'skóre';
	else
		$prepnout = 'výskum';

	echo '<button href="#prepnout" class="switch btn btn-primary" data-idsestavy="'.$zaznam['idsestavy'].'">Prepnúť na '.$prepnout.'</button>';
	echo '<button href="#rozebrat" style="float:right;" class="disass btn btn-primary" data-idsestavy="'.$zaznam['idsestavy'].'">Rozobrať</button>';

	echo '</div><ul class="sestavahidden" style="display:none;">';
	$obsah = explode(';', $zaznam['obsah']);
	for ($i = 0; $i < $pocveci; $i++)
		if ($obsah[$i] > 0)
		{
			echo '<li class="'.$typ[$i].'">';
			echo '<img src="icons/'.$id[$i].'.png" width="24px">';
			if ($obsah[$i] > 1)
				echo $obsah[$i].'x ';
			echo $veci[$i].'</li>';
		}
	echo '</ul>';
	echo '<div class="sestava" style="padding-left:15px;">';
	echo '<span class="label label-default">Motherboard</span>';
	echo '<ul class="sestavamb">';
	echo '</ul>';
	echo '<span class="label label-default">CPU</span>';
	echo '<ul class="sestavacpu">';
	echo '</ul>';
	echo '<span class="label label-default">GPU</span>';
	echo '<ul class="sestavagpu">';
	echo '</ul>';
	echo '<span class="label label-default">RAM</span>';
	echo '<ul class="sestavaram">';
	echo '</ul>';
	echo '<span class="label label-default">Storage</span>';
	echo '<ul class="sestavahdd">';
	echo '</ul>';
	echo '<span class="label label-default">PSU</span>';
	echo '<ul class="sestavapsu">';
	echo '</ul>';
	echo '</div></div></div>';
}
