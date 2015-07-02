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

	echo '<div class="col-xs-12"><div class="panel panel-primary"><div class="panel-heading"><h2 class="panel-title">Recepty</h2></div>';
	echo '<table class="table table-striped table-hover">';
	echo '<thead><tr><th>Výrobok</th><th>Suroviny</th><th>Čas na výrobu</th><th>Potrebný výzkum</th><th>Množstvo</th><th>Vyrobiť</th></tr></thead><tbody>';

	//názvy věcí
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$veci[$zaznam['idveci']] = $zaznam['nazev'];
	}

	//seznam receptů
	$dotaz = 'SELECT * FROM recepty, vyzkumy WHERE vyzkum=idvyzkumu';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		//TODO: mobile  friendly
		echo '<tr>';
		echo '<td><img id="item-sm" src="icons/'.$veci[$zaznam['vyrobek']].'.png"></img> <span class="label label-default">'.$veci[$zaznam['vyrobek']].'</span></td><td>';

		$suroviny = explode(';', $zaznam['suroviny']);
		$pocsurovin = count($suroviny);
		for ($i = 0; $i < $pocsurovin; $i++)
		{
			if ($suroviny[$i] > 0)
			echo '<img id="item-sm" src="icons/'.$veci[$i].'.png"></img><span class="label label-default">'.$veci[$i].'</span><span class="badge">'.$suroviny[$i].'</span> ';
		}

		echo '</td><td>'.$zaznam['doba'].' s</td>';
		echo '</td><td>'.$zaznam['nazev'].'</td>';

		echo '<td><input type="number" name="pocet" data-idreceptu="'.$zaznam['idreceptu'].'" value="1" min="1" max="10000"></td><td>';

		$splnuje = true;

		for ($i = 0; $i < $pocsurovin; $i++)
			if ($vlastnictvi[$i] < $suroviny[$i])
				$splnuje = false;

		if (!$splnuje)
			echo '<button class="btn btn-primary btn-block btn-xs" disabled="">Nedostatek surovin</button>';
		elseif ($hrac['vyzkum'] < $zaznam['body'])
			echo '<button class="btn btn-primary btn-block btn-xs" disabled="">Neuskutečněný výzkum</button>';
		else
			echo '<button class="btn btn-xs btn-block btn-primary" onClick="craft('.$zaznam['idreceptu'].');">Vyrobit</button>';
		echo '</td></tr>';
	}
	echo '</tbody></table></div>';
}
else
{
	include 'components/form.php';
}
?>
<script src="js/crafting.js"></script>
</body>
</html>
