<?php

if (is_numeric($_SESSION['hrac']))
{
	$vyzkum = 0; $body = 0;
	$dotaz = 'SELECT * FROM sestavy WHERE hrac='.$_SESSION['hrac'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		if ($zaznam['vyzkum'] == 1)
			$vyzkum += $zaznam['vykon'] * (time() - $zaznam['sbercas']);
		else
			$body += $zaznam['vykon'] * (time() - $zaznam['sbercas']);

		$dotaz = 'UPDATE sestavy SET sbercas='.time().' WHERE idsestavy='.$zaznam['idsestavy'];
		mysql_query($dotaz);
	}

	//updatovat hráče
	$hrac['vyzkum'] += $vyzkum;
	$hrac['body'] += $body;
	
	$vlatnictvi = explode(';', $hrac['vlastnictvi']);
	$vlastnictvi[0]+=$body;

	$dotaz = 'UPDATE hraci SET vyzkum='.$hrac['vyzkum'].', body='.$hrac['body'].', vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace='.$_SESSION['hrac'];
	mysql_query($dotaz);
}
