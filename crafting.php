<?php
session_start();
require 'components/head.php';
require 'dblogin.php';
require 'login.php';
include 'components/navbar.php';
if ($prihlasen)
{
	include 'vlastnictvi.php';
	include 'components/updatesestav.php';
	echo '<div class="col-md-3 col-sm-6 col-xs-12"><span id="inventar"></span></div>';
	echo '<div class="col-md-9 col-sm-6 col-xs-12"><span id="seznamvyrob"></span></div>';
	echo '<div class="col-md-9 col-sm-12 col-xs-12"><div class="panel panel-primary">';
	echo '<div class="panel-heading"><h1 class="panel-title">Recepty</h1></div>';
	echo '<div class="panel-body">';
	
	include 'components/craft-sort.php';

	echo '<div class="grid col-md-9 col-sm-12 col-xs-12">';
	//názvy věcí
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$veci[$zaznam['idveci']] = $zaznam['nazev'];
		$typ[$zaznam['idveci']] = $zaznam['typ'];
	}

	//seznam receptů
	$dotaz = 'SELECT * FROM recepty, vyzkumy WHERE vyzkum=idvyzkumu';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		//TODO: mobile  friendly
		echo '<div class="grid-craft-item" style="background-image: url(icons/'.$zaznam['vyrobek'].'.png)" data-typ="'.$typ[$zaznam['vyrobek']].'">';
		echo '<span class="label label-default craft-name">'.$veci[$zaznam['vyrobek']].'</span>';

		$suroviny = explode(';', $zaznam['suroviny']);
		$pocsurovin = count($suroviny);
		for ($i = 0; $i < $pocsurovin; $i++)
		{
			if ($suroviny[$i] > 0) //TODO html kdyz bude cas tak do tablu
			echo '<div class="craft-suroviny"><span class="badge">'.$suroviny[$i].'</span><img src="icons/'.$i.'.png"></img><span class="label label-default">'.$veci[$i].'</span></div>';
		}
		echo '<div class="craft-suroviny"><span class="badge">'.$zaznam['doba'].'</span><span class="glyphicon glyphicon-time"></span><span class="label label-default">Sekundy</span></div>';
		echo '<div class="craft-vyzkum label label-warning">'.$zaznam['nazev'].'</div>';

		echo '<div class="craft-vyrob"><input type="number" name="pocet" data-idreceptu="'.$zaznam['idreceptu'].'" value="1" min="1" max="1000">';

		$splnuje = true;

		for ($i = 0; $i < $pocsurovin; $i++)
			if ($vlastnictvi[$i] < $suroviny[$i])
				$splnuje = false;

		if ($hrac['vyzkum'] < $zaznam['body'])
			echo '<button class="btn btn-primary btn-xs" disabled="">Neuskutečněný výzkum</button>';
		else if (!$splnuje)
			echo '<button class="btn btn-primary btn-xs" disabled="">Nedostatek surovin</button>';
		else
			echo '<button class="btn btn-xs btn-primary" onClick="craft('.$zaznam['idreceptu'].');">Vyrobit</button>';
		echo '</div></div>';
	}
	echo '</div></div></div>';
}
else
{
	include 'components/form.php';
}
?>
<script src="js/crafting.js"></script>
</body>
</html>
