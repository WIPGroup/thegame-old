<?php

session_start();
require 'vlastnictvi.php';
if (isset($_GET['trade']))
{
	//uskutečnit obchod
	$dotaz = 'SELECT * FROM obchod WHERE idnab='.mysql_real_escape_string($_GET['trade']);
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		if ($zaznam['mnozchce'] <= $vlastnictvi[$zaznam['chce']])
		{
			//přidělení a odebrání surovin kupujícímu
			$vlastnictvi[$zaznam['nabizi']] += $zaznam['mnoznabizi'];
			$vlastnictvi[$zaznam['chce']] -= $zaznam['mnozchce'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);

			//přidělení surovin prodávajícímu (autoru nabídky)
			$dotaz = 'SELECT * FROM hraci WHERE idhrace='.$zaznam['hrac'];
			$vysledek = mysql_query($dotaz) or die(mysql_error($db));
			$autor = mysql_fetch_array($vysledek);
			$vlastautor = explode(';', $autor['vlastnictvi']);

			$vlastautor[$zaznam['chce']] += $zaznam['mnozchce'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastautor).'" WHERE idhrace="'.$zaznam['hrac'].'"';
			mysql_query($dotaz);

			//odstranění nabídky
			$dotaz = 'DELETE FROM obchod WHERE idnab='.mysql_real_escape_string($_GET['trade']);
			mysql_query($dotaz);

			//názvy věcí pro log
			$dotaz = 'SELECT * FROM veci WHERE idveci='.$zaznam['chce'].' OR idveci='.$zaznam['nabizi'];
			$vysl = mysql_query($dotaz) or die(mysql_error($db));
			while ($zazn = mysql_fetch_array($vysl))
			{
				$veci[$zazn['idveci']] = $zazn['nazev'];
			}
			//log
			$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Uskutočnený nákup <kbd>'.$veci[$zaznam['nabizi']].'</kbd>('.$zaznam['mnoznabizi'].') za <kbd>'.$veci[$zaznam['chce']].'</kbd>('.$zaznam['mnozchce'].') od <kbd>'.$autor['jmeno'].'</kbd>")';
			mysql_query($dotaz);
			$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$zaznam['hrac'].', "Predal si <kbd>'.$veci[$zaznam['nabizi']].'</kbd>('.$zaznam['mnoznabizi'].') za <kbd>'.$veci[$zaznam['chce']].'</kbd>('.$zaznam['mnozchce'].') hráčovi <kbd>'.$hrac['jmeno'].'</kbd>")';
			mysql_query($dotaz);

			echo 'Koupils '.$veci[$zaznam['nabizi']].'('.$zaznam['mnoznabizi'].') za '.$veci[$zaznam['chce']].'('.$zaznam['mnozchce'].') od '.$autor['jmeno'].'.';
		}
		else
		echo 'Nemáš dostatečný majetek na uskutečnění obchodu.';
	}
	else
	echo 'Nabídka už neexistuje.';
}
//vytvořit nabídku
elseif (isset($_GET['mnoznabizi']))
{
	if ($_GET['nabizi'] == $_GET['chce'])
		echo 'Nemôžeš vytvoriť ponuku na rovnaké položky!';
	elseif ($vlastnictvi[$_GET['nabizi']] >= $_GET['mnoznabizi'])
	{
		$vlastnictvi[$_GET['nabizi']] -= $_GET['mnoznabizi'];

		$dotaz = 'INSERT INTO obchod (hrac, nabizi, mnoznabizi, chce, mnozchce) VALUES ('.$_SESSION['hrac'].', '.mysql_real_escape_string($_GET['nabizi']).', '.mysql_real_escape_string($_GET['mnoznabizi']).', '.mysql_real_escape_string($_GET['chce']).', '.mysql_real_escape_string($_GET['mnozchce']).')';
		mysql_query($dotaz);

		$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
		mysql_query($dotaz);

		//názvy věcí pro log
		$dotaz = 'SELECT * FROM veci WHERE idveci='.mysql_real_escape_string($_GET['chce']).' OR idveci='.mysql_real_escape_string($_GET['nabizi']);
		$vysl = mysql_query($dotaz) or die(mysql_error($db));
		while ($zazn = mysql_fetch_array($vysl))
		{
			$veci[$zazn['idveci']] = $zazn['nazev'];
		}
		//log
		$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Vytvorená ponuka '.mysql_real_escape_string($veci[$_GET['nabizi']]).'('.mysql_real_escape_string($_GET['mnoznabizi']).') za '.mysql_real_escape_string($veci[$_GET['chce']]).'('.mysql_real_escape_string($_GET['mnozchce']).')")';
		mysql_query($dotaz);

		echo 'Vytvoril si ponuku '.$veci[$_GET['nabizi']].'('.$_GET['mnoznabizi'].') za '.$veci[$_GET['chce']].'('.$_GET['mnozchce'].').';
	}
	else
		echo 'Nemáš dostatok surovin na vytvorenie ponuky.';
}
//zrušit nabídku
elseif (isset($_GET['cancel']))
{
	$dotaz = 'SELECT * FROM obchod WHERE idnab='.mysql_real_escape_string($_GET['cancel']);
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);

	if ($zaznam['hrac'] == $_SESSION['hrac'])
	{
		$vlastnictvi[$zaznam['nabizi']] += $zaznam['mnoznabizi'];
		$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$zaznam['hrac'].'"';
		mysql_query($dotaz);

		$dotaz = 'DELETE FROM obchod WHERE idnab='.mysql_real_escape_string($_GET['cancel']);
		mysql_query($dotaz);

		//názvy věcí pro log
		$dotaz = 'SELECT * FROM veci WHERE idveci='.mysql_real_escape_string($zaznam['chce']).' OR idveci='.mysql_real_escape_string($zaznam['nabizi']);
		$vysl = mysql_query($dotaz) or die(mysql_error($db));
		while ($zazn = mysql_fetch_array($vysl))
		{
			$veci[$zazn['idveci']] = $zazn['nazev'];
		}
		//log
		$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Zrušená ponuka <kbd>'.$veci[$zaznam['nabizi']].'</kbd>('.$zaznam['mnoznabizi'].') za <kbd>'.$veci[$zaznam['chce']].'</kbd>('.$zaznam['mnozchce'].')")';
		mysql_query($dotaz);

		echo 'Zrušil si ponuku '.$veci[$zaznam['nabizi']].'('.$zaznam['mnoznabizi'].') za '.$veci[$zaznam['chce']].'('.$zaznam['mnozchce'].').';
	}
	else
	echo 'Zrušenie sa nepodarilo.';
}
