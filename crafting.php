<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
include "vlastnictvi.php";
if ($prihlasen)
{
	echo '<div class="col-md-3 col-sm-6 col-xs-12"><span id="inventar"></span></div>';	//TODO: lépe rozmístit na stránce

	echo '<div class="col-md-9 col-sm-6 col-xs-12"><span id="seznamvyrob"></span></div>';

	echo '<div class="col-xs-12"><div class="panel panel-default"><div class="panel-heading"><h2 class="panel-title">Recepty</h2></div>';
	echo '<table class="table table-striped table-hover">';
	echo '<thead><tr><th>Výrobek</th><th>Suroviny</th><th>Čas na výrobu</th><th>Vyrobit</th></tr></thead><tbody>';

	//názvy věcí
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$veci[$zaznam['idveci']] = $zaznam['nazev'];
	}

	//seznam receptů
	$dotaz = 'SELECT * FROM recepty';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		//TODO: přidat obrázky předmětů
		echo '<tr>';
		echo '<td>'.$veci[$zaznam['vyrobek']].'</td><td>';

		$suroviny = explode(';', $zaznam['suroviny']);
		$pocsurovin = count($suroviny);
		for ($i = 0; $i < $pocsurovin; $i++)
		{
			if ($suroviny[$i] > 0)
				echo $veci[$i].'('.$suroviny[$i].') ';
		}

		echo '</td><td>'.$zaznam['doba'].' s</td>';

		$splnuje = true;
		for ($i = 0; $i < $pocsurovin; $i++)
			if ($vlastnictvi[$i] < $suroviny[$i])
				$splnuje = false;

		if ($splnuje)
			echo '<td><button class="btn btn-xs btn-block btn-primary" onClick="craft('.$zaznam['idreceptu'].');">Vyrobit</button></td>';
		else
			echo '<td><button class="btn btn-default" disabled></button> </td>';
		echo '</tr>';
	}
	echo '</tbody></table></div>';
}
else
{
	include "components/form.php";
}
?>
<script src="js/crafting.js"></script>
</body>
</html>
