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
	echo '<div class="panel-body" style="position:relative;">';

	include 'components/craft-sort.php';

	echo '<div class="grid col-md-12 col-sm-12 col-xs-12">';
	//názvy věcí
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$veci[$zaznam['idveci']] = $zaznam['nazev'];
		$typ[$zaznam['idveci']] = $zaznam['typ'];
		$idveci[$zaznam['idveci']] = $zaznam['idveci'];
	}

	//seznam receptů
	$dotaz = 'SELECT * FROM recepty, vyzkumy WHERE vyzkum=idvyzkumu';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		//TODO: mobile  friendly
		echo '<div class="grid-craft-item '.$typ[$zaznam['vyrobek']].' t'.$zaznam['vyzkum'].' ';
		if ($hrac['vyzkum'] < $zaznam['body'])
			echo 'no';
		else
			echo 'yes';
		echo '" style="background-image: url(icons/'.$zaznam['vyrobek'].'.png)" data-type="'.$typ[$zaznam['vyrobek']].'" data-idveci="'.$idveci[$zaznam['vyrobek']].'" data-tier="'.$zaznam['vyzkum'].'">';
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
	echo '</div>';
	echo '<div class="col-xs-12 col-md-3" style="padding-top: 5px;" id="infoitemucontainer"><div class="panel panel-primary"><div class="panel-heading"><h1 class="panel-title">Info o itemu<button style="float:right" type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button></h1></div><div class="panel-body" id="infoitemu">Kliknite na predmet pre zobrazenie ďalších informácií.</div></div></div>';
	echo '</div>';
	echo '</div>';
	include 'components/footer.php';
}
else
{
	include 'components/form.php';
}
?>
<script src="js/crafting.js"></script>
</body>
</html>
