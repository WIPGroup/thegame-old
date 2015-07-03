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

	echo '<div class="col-xs-12">';
	echo '<div class="grid js-isotope" data-isotope-options=\'{ "itemSelector": ".grid-craft-item", "layoutMode": "packery" , "packery": {"gutter": 10}}\'>';
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
		echo '<div class="grid-craft-item" style="background-image: url(icons/'.$veci[$zaznam['vyrobek']].'.png)">';
		echo '<span class="label label-default craft-name">'.$veci[$zaznam['vyrobek']].'</span>';

		$suroviny = explode(';', $zaznam['suroviny']);
		$pocsurovin = count($suroviny);
		for ($i = 0; $i < $pocsurovin; $i++)
		{
			if ($suroviny[$i] > 0)
			echo '<a><span class="badge">'.$suroviny[$i].'</span><img src="icons/'.$veci[$i].'.png"></img><span class="label label-default">'.$veci[$i].'</span></a><br>';
		}

		echo '<div class="craft-time">'.$zaznam['doba'].' s</div>';
		echo '<div class="craft-vyzkum">'.$zaznam['nazev'].'</div>';

		echo '<input type="number" name="pocet" data-idreceptu="'.$zaznam['idreceptu'].'" value="1" min="1" max="10000">';

		$splnuje = true;

		for ($i = 0; $i < $pocsurovin; $i++)
			if ($vlastnictvi[$i] < $suroviny[$i])
				$splnuje = false;

		if (!$splnuje)
			echo '<button class="btn btn-primary btn-xs" disabled="">Nedostatek surovin</button>';
		elseif ($hrac['vyzkum'] < $zaznam['body'])
			echo '<button class="btn btn-primary btn-xs" disabled="">Neuskutečněný výzkum</button>';
		else
			echo '<button class="btn btn-xs btn-primary" onClick="craft('.$zaznam['idreceptu'].');">Vyrobit</button>';
		echo '</div>';
	}
	echo '</div>';
}
else
{
	include 'components/form.php';
}
?>
<script src="js/crafting.js"></script>
</body>
</html>
