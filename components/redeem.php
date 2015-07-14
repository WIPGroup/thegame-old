<?php

session_start();
require '../vlastnictvi.php';
if (isset($_GET['kupon']))
{
	$dotaz = 'SELECT * FROM kupony WHERE kod="'.strtolower(mysql_real_escape_string($_GET['kupon'])).'"';
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

		//smazat kupón
		$dotaz = 'DELETE FROM kupony WHERE kod="'.mysql_real_escape_string($zaznam['kod']).'"';
		mysql_query($dotaz);

		echo '<ul style="padding-left:0;list-style-type:none;">';
		//log
		$dotaz = 'SELECT * FROM veci';
		$vysl = mysql_query($dotaz) or die(mysql_error($db));
		$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Použitý kupón <kbd>'.$zaznam['kod'].'</kbd> (';
		while ($zazn = mysql_fetch_array($vysl))
		{
			if ($obsah[$zazn['idveci']] > 0)
			{
				$dotaz .= '<kbd>'.$zazn['nazev'].'</kbd>('.$obsah[$zazn['idveci']].') ';
				echo '<li>'.$zazn['nazev'].'('.$obsah[$zazn['idveci']].')</li>';
			}
		}
		echo '</ul>';
		$dotaz .= ')")';
		mysql_query($dotaz);
	}
	else
	{
		$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "<span class=\"bg-danger\">Použitý neplatný kupón <kbd>'.strtolower(mysql_real_escape_string($_GET['kupon'])).'</kbd>. Brute Force?</span>")';
		mysql_query($dotaz);
		echo 'Tento kupón neexistuje.';
	}
}
