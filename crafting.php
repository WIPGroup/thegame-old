<?php
session_start();
require "components/head.php";
require "dblogin.php";
require "login.php";
include "components/navbar.php";
include "vlastnictvi.php";
if ($prihlasen)
{
	//TODO: udělat ajax na výrobu
	include "components/craft.php";
	
	include "components/updatevyroby.php";
	echo "<h3>Moje výroba:</h3>";
	
	$dotaz = 'SELECT * FROM veci';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$veci[$zaznam['idveci']] = $zaznam['nazev'];
	}
	
	$dotaz = 'SELECT * FROM vyroba, recepty WHERE recept=idreceptu AND hrac='.$_SESSION['hrac'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		echo $veci[$zaznam['vyrobek']].', hotovo za '.($zaznam['hotovo']-time()).' s ('.date('G:i:s j.n.Y', $zaznam['hotovo']).').<br>';
	}
	
	//TODO: vypsat inventář
	
	echo "<h3>Recepty:</h3>";
	echo '<table border="1">';
	echo '<th>Výrobek</th><th>Suroviny</th><th>Čas na výrobu</th><th>Vyrobit</th>';
	
	$dotaz = 'SELECT * FROM recepty';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		//TODO: přepsat do bootstrap tabulky a obrázky předmětů
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
			echo '<td><a href="crafting.php?craft='.$zaznam['idreceptu'].'">Tlačítko vyrobit</a></td>';	//TODO: hezké tlačítko vyrobit + get na craft.php
		else
			echo '<td>Nelze vyrobit.</td>'; //TODO: šedé tlačítko
		echo '</tr>';
	}
	echo '</table>';
}
else
{
	include "components/form.php";
}
?>
</body>
</html>

