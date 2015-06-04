<?php
if (isset($_GET['mb']))
{
	require "vlastnictvi.php"; //TODO: v samostatném ajaxu upravit na ../vlastnictvi.php

	$rampwr = 0;
	$gpupwr = 0;
	$hddpwr = 0;

	//názvy věcí
	$dotaz = 'SELECT * FROM veci';
	$vysl = mysql_query($dotaz) or die(mysql_error($db));

	while ($zazn = mysql_fetch_array($vysl))
	{
		$veci[$zazn['idveci']] = $zazn['nazev'];
	}

	$pocveci = count($vlastnictvi);
	$sestava = null;
	for ($i = 0; $i < $pocveci; $i++)
	{
		$sestava[$i] = 0;
	}

	//získat údaje o desce
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['mb'].' AND typ="mb"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		$sloty = explode(';', $zaznam['sloty']);
		$socket = $zaznam['socket'];
		$vlastnictvi[$zaznam['idveci']]--;
		$sestava[$zaznam['idveci']]++;
	}
	else
		die('Takovou základní desku nevlastníš.');

	//info a kompatibilita procesoru
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['cpu'].' AND typ="cpu"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		if ($socket != $zaznam['socket'])
			die('Nekompatibilní základní deska a procesor.');

		$vlastnictvi[$zaznam['idveci']]--;
		$sestava[$zaznam['idveci']]++;
		$cpupwr = $zaznam['vykon'];
	}
	else
		die('Takový procesor nevlastníš.');

	//ram sloty
	for ($i = 1; $i <= $sloty[0]; $i++)
	{
		$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['ram'.$i].' AND typ="ram"';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		$zaznam = mysql_fetch_array($vysledek);
		if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
		{
			$vlastnictvi[$zaznam['idveci']]--;
			$sestava[$zaznam['idveci']]++;
			$rampwr += $zaznam['vykon'];
		}
		else
			die('Takovou ramku nevlastníš.');
	}

	//gpu karty
	for ($i = 1; $i <= $sloty[1]; $i++)
	{
		$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['gpu'.$i].' AND typ="gpu"';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		$zaznam = mysql_fetch_array($vysledek);
		if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
		{
			$vlastnictvi[$zaznam['idveci']]--;
			$sestava[$zaznam['idveci']]++;
			$gpupwr = $zaznam['vykon'];
		}
		else
			die('Takovou grafárnu nevlastníš.');
	}

	//hdd
	for ($i = 1; $i <= $sloty[2]; $i++)
	{
		$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['hdd'.$i].' AND typ="hdd"';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		$zaznam = mysql_fetch_array($vysledek);
		if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
		{
			$vlastnictvi[$zaznam['idveci']]--;
			$sestava[$zaznam['idveci']]++;
			$hddpwr = max($zaznam['vykon'], $hddpwr);
		}
		else
			die('Takový harddisk nevlastníš.');
	}

	//psu
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['psu'].' AND typ="psu"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		$vlastnictvi[$zaznam['idveci']]--;
		$sestava[$zaznam['idveci']]++;
		$psupwr = $zaznam['vykon'];
	}
	else
		die('Takový zdroj nevlastníš.');

	$vykon = min($cpupwr, $gpupwr) * $rampwr * $hddpwr;

	if ($psupwr < $vykon)
		$vykon = 0;
	
	//poskládat hráči sestavu
	$dotaz = 'INSERT INTO sestavy (hrac, vykon, obsah, sbercas) VALUES ('.$_SESSION['hrac'].', '.$vykon.', "'.join(';', $sestava).'", '.time().')';
	mysql_query($dotaz);

	//odebrat hráči majetek
	$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
	mysql_query($dotaz);

	//log
	$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Složena sestava '.join(';', $sestava).' o výkonu '.$vykon.'")';
	mysql_query($dotaz);

	echo 'Složena sestava '.join(';', $sestava).' o výkonu '.$vykon;
}
if (isset($_GET['switch']))
{
	//TODO: přepnout na body/výzkum
}

if (isset($_GET['disass']))
{
	//TODO: rozložit na součástky
}
?>
