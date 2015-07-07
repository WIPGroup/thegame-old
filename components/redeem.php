<?php

session_start();
require '../vlastnictvi.php';
if (isset($_GET['kupon']))
{
	$dotaz = 'SELECT * FROM kupony WHERE kod="'.strtolower($_GET['kupon']).'"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		$obsah = explode(';', $zaznam['obsah']);
		$pocobsah = count($obsah);

		for ($i = 0; $i < $pocobsah; $i++)
			$vlastnictvi[$i] += $obsah[$i];

		$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
		mysql_query($dotaz);

		//smazat kupó
		$dotaz = 'DELETE FROM kupony WHERE kod="'.$zaznam['kod'].'"';
		mysql_query($dotaz);

		echo 'Kupó přijat. Obdržal si ';
		//log
		$dotaz = 'SELECT * FROM veci';
		$vysl = mysql_query($dotaz) or die(mysql_error($db));
		$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Použit kupó '.$zaznam['kod'].' (';
		while ($zazn = mysql_fetch_array($vysl))
		{
			if ($obsah[$zazn['idveci']] > 0)
			{
				$dotaz .= $zazn['nazev'].'('.$obsah[$zazn['idveci']].') ';
				echo $zazn['nazev'].'('.$obsah[$zazn['idveci']].') ';
			}
		}
		$dotaz .= ')")';
		mysql_query($dotaz);
	}
	else
		echo 'Tento kupó neexistuje.';
}
