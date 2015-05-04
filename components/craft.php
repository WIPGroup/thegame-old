<?php
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
			echo 'INSERT INTO vyroba (hrac, recept, hotovo) VALUES ('.$_SESSION['hrac'].', '.$_GET['craft'].', '.(time() + $_GET['doba']).')';
			mysql_query($dotaz);
			$dotaz = 'INSERT INTO vyroba (hrac, recept, hotovo) VALUES ('.$_SESSION['hrac'].', '.$_GET['craft'].', '.(time() + $zaznam['doba']).')';
			mysql_query($dotaz);
			
			//odečtení surovin
			for ($i = 0; $i < $pocsurovin; $i++)
			{
				$vlastnictvi[$i] -= $suroviny[$i];
			}
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
		}
		else
			echo "Nemáte dostatek surovin.";
	}
	else
		echo "Tento recept neexistuje.";
}
?>
