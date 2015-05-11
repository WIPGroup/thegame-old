<?php
	session_start();
	$dotaz = 'SELECT * FROM vyroba, recepty WHERE recept=idreceptu AND hrac='.$_SESSION['hrac'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		if ($zaznam['hotovo'] <= time())
		{
			//přičíst suroviny
			$vlastnictvi[$zaznam['vyrobek']] += $zaznam['pocet'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
		 	
			//smazat výrobu
			$dotaz = 'DELETE FROM vyroba WHERE idvyroby='.$zaznam['idvyroby'];
			mysql_query($dotaz);
			
			//názvy věcí pro log
			$dotaz = 'SELECT * FROM veci WHERE idveci='.$zaznam['vyrobek'];
			$vysl = mysql_query($dotaz) or die(mysql_error($db));
			$zazn = mysql_fetch_array($vysl);
			//log
			$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Dokončena výroba '.$zaznam['pocet'].'x '.$zazn['nazev'].'")';
			mysql_query($dotaz);
		}
	}
?>
