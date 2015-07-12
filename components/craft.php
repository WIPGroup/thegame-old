<?php

session_start();
include '../vlastnictvi.php';

if (isset($_GET['craft']))
{
	//započat výrobu
	$dotaz = 'SELECT * FROM recepty, vyzkumy WHERE idreceptu='.$_GET['craft'].' AND vyzkum=idvyzkumu';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		//kontrola
		if ($hrac['vyzkum'] < $zaznam['body'])
			die('Nedostatočná úroveň výzkumu');
		$suroviny = explode(';', $zaznam['suroviny']);
		$pocsurovin = count($suroviny);
		$splnuje = true;
		for ($i = 0; $i < $pocsurovin; $i++)
			if ($vlastnictvi[$i] < $suroviny[$i] * $_GET['pocet'])
				$splnuje = false;

		if ($splnuje)
		{
			//spuštění výroby
			$dotaz = 'INSERT INTO vyroba (hrac, recept, pocet, hotovo) VALUES ('.$_SESSION['hrac'].', '.$_GET['craft'].', '.$_GET['pocet'].', '.(time() + $zaznam['doba']).')';
			mysql_query($dotaz);

			//odečtení surovin
			for ($i = 0; $i < $pocsurovin; $i++)
			{
				$vlastnictvi[$i] -= $suroviny[$i] * $_GET['pocet'];
			}
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);

			//názvy věcí pro log
			$dotaz = 'SELECT * FROM veci WHERE idveci='.$zaznam['vyrobek'];
			$vysl = mysql_query($dotaz) or die(mysql_error($db));
			$zazn = mysql_fetch_array($vysl);
			//log
			$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Spustená výroba '.$_GET['pocet'].'x '.$zazn['nazev'].'")';
			mysql_query($dotaz);
		}
		else
			echo 'Nemáš dosť surovín.';
	}
	else
		echo 'Tento recept neexistuje.';
}
