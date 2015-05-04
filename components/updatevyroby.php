<?php
	$dotaz = 'SELECT * FROM vyroba, recepty WHERE recept=idreceptu AND hrac='.$_SESSION['hrac'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		if ($zaznam['hotovo'] <= time())
		{
			//přičíst suroviny
			$vlastnictvi[$zaznam['vyrobek']]++;
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
			//smazat výrobu
			$dotaz = 'DELETE FROM vyroba WHERE idvyroby='.$zaznam['idvyroby'];
			mysql_query($dotaz);
		}
	}
?>
