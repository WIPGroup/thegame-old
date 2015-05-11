<?php
session_start();
include "../vlastnictvi.php";

if (isset($_GET['craft']))
{
	//započat výrobu
	$dotaz = 'SELECT * FROM recepty WHERE idreceptu='.$_GET['craft'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		//kontrola
		$suroviny = explode(';', $zaznam['suroviny']);
		$pocsurovin = count($suroviny);
		$splnuje = true;
		for ($i = 0; $i < $pocsurovin; $i++)
			if ($vlastnictvi[$i] < $suroviny[$i])
				$splnuje = false;
		
		if ($splnuje)
		{
			//spuštění výroby
			$dotaz = 'INSERT INTO vyroba (hrac, recept, pocet, hotovo) VALUES ('.$_SESSION['hrac'].', '.$_GET['craft'].', '.$_GET['pocet'].', '.(time() + $zaznam['doba']).')';
			mysql_query($dotaz);
			
			//odečtení surovin
			for ($i = 0; $i < $pocsurovin; $i++)
			{
				$vlastnictvi[$i] -= $suroviny[$i];
			}
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
			
			//názvy věcí pro log
			$dotaz = 'SELECT * FROM veci WHERE idveci='.$zaznam['vyrobek'];
			$vysl = mysql_query($dotaz) or die(mysql_error($db));
			$zazn = mysql_fetch_array($vysl);
			//log
			$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Spuštěna výroba '.$zazn['nazev'].'")';
			mysql_query($dotaz);
			
			//echo 'Začals vyrábět '.$zazn['nazev'].'.';
		}
		else
			echo "Nemáte dostatek surovin.";
	}
	else
		echo "Tento recept neexistuje.";
}
?>
