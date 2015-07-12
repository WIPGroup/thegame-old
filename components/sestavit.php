<?php

//poskládání sestavy
session_start();
if (isset($_GET['mb']))
{
	require '../vlastnictvi.php';

	$spotreba = 0;

	$rampwr = 0;
	$gpupwr = 0;
	$hddpwr = 0;
	$ramkap = 0;
	$hddtier = 0;
	$ssdsize = 0;

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
		$spotreba += $zaznam['spotreba'];
	}
	else
	die('Takú základnú dosku nemáš.');

	//info a kompatibilita procesoru
	if (!isset($_GET['cpu']))
	die('Nemáš vybraný procesor.');
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['cpu'].' AND typ="cpu"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		if ($socket != $zaznam['socket'])
		die('Nekompatibilná základná doska a procesor.');

		$vlastnictvi[$zaznam['idveci']]--;
		$sestava[$zaznam['idveci']]++;
		$cpupwr = $zaznam['vykon'];
		$spotreba += $zaznam['spotreba'];
	}
	else
	die('Taký procesor nemáš.');

	//ram sloty
	for ($i = 1; $i <= $sloty[0]; $i++)
	{
		if (!isset($_GET['ram'.$i]) || $_GET['ram'.$i] < 0)
		continue;
		$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['ram'.$i].' AND typ="ram"';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		$zaznam = mysql_fetch_array($vysledek);
		if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
		{
			$vlastnictvi[$zaznam['idveci']]--; //TODO opravy
			$sestava[$zaznam['idveci']]++;
			$ramkap += $zaznam['vykon'];
			$spotreba += $zaznam['spotreba'];
		}
		else
		die('Takú ramku nemáš.');
	}

	//gpu karty
	for ($i = 1; $i <= $sloty[1]; $i++)
	{
		if (!isset($_GET['gpu'.$i]) || $_GET['gpu'.$i] < 0)
		continue;
		$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['gpu'.$i].' AND typ="gpu"';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		$zaznam = mysql_fetch_array($vysledek);
		if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
		{
			$vlastnictvi[$zaznam['idveci']]--;
			$sestava[$zaznam['idveci']]++;
			$gpupwr = $zaznam['vykon'];
			$spotreba += $zaznam['spotreba'];
		}
		else
		die('Takú grafiku nemáš.');
	}

	//hdd
	for ($i = 1; $i <= $sloty[2]; $i++)
	{
		if (!isset($_GET['hdd'.$i]) || $_GET['hdd'.$i] < 0)
		continue;
		$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['hdd'.$i].' AND typ="hdd"';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		$zaznam = mysql_fetch_array($vysledek);
		if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
		{
			$vlastnictvi[$zaznam['idveci']]--;
			$sestava[$zaznam['idveci']]++;
			//$hddpwr = max($zaznam['vykon'], $hddpwr); TODO opravit
			if ($zaznam['vykon'] < 10)
				$hddtier = max($hddtier, $zaznam['vykon']);
			if ($zaznam['vykon'] > 10)
				$ssdsize += $zaznam['vykon'];
			$spotreba += $zaznam['spotreba'];
		}
		else
			die('Taký harddisk nemáš.');
	}

	//psu
	if (!isset($_GET['psu']))
	die('Nemáš vybraný zdroj.');
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
	die('Taký zdroj nemáš.');


	if ($ramkap  >= 64){
		$ramkoe = 2;
	}
	elseif ($ramkap  >= 32){
		$ramkoe = 1.8;
	}
	elseif ($ramkap  >= 24){
		$ramkoe = 1.6;
	}
	elseif ($ramkap  >= 16){
		$ramkoe = 1.4;
	}
	elseif ($ramkap  >= 12){
		$ramkoe = 1.2;
	}
	elseif ($ramkap  >= 8){
		$ramkoe = 1;
	}
	elseif ($ramkap  >= 6){
		$ramkoe = 0.8;
	}
	elseif ($ramkap  >= 4){
		$ramkoe = 0.6;
	}
	elseif ($ramkap  >= 2){
		$ramkoe = 0.4;
	}
	elseif ($ramkap  >= 1){
		$ramkoe = 0.2;
	}
	else {
		$ramkoe = 0;
	}
	if ($ssdsize > 0) {
		if ($ssdsize  >= 512)
		{
			$storagekoe = 2;
		}
		elseif ($ssdsize  >= 256)
		{
			$storagekoe = 1.8;
		}
		elseif ($ssdsize  >= 128)
		{
			$storagekoe = 1.6;
		}
		elseif ($ssdsize  >= 64)
		{
			$storagekoe = 1.4;
		}
		elseif ($ssdsize  >= 32)
		{
			$storagekoe = 1.2;
		}
		elseif ($ssdsize  >= 16)
		{
			$storagekoe = 1;
		}
		else {
			throw new Exception('Chyba v pocitani vykonu, SSD je mensie ako 64GB, kontaktujte admina!');
		}
	} else {
		if ($hddtier == 4){
			$storagekoe = 0.8;
		}
		elseif ($hddtier == 3){
			$storagekoe = 0.6;
		}
		elseif ($hddtier == 2){
			$storagekoe = 0.4;
		}
		elseif ($hddtier == 1){
			$storagekoe = 0.2;
		}
		else {
			throw new Exception('Chyba v pocitani vykonu, HDD nesedi, kontaktujte admina!');
		}
	}
	$vykon = min($cpupwr, $gpupwr) * 2 * $ramkoe * $storagekoe;
	//TODO udelat vykon tak jak ma byt
	//$vykon = 1;

	if ($psupwr < $spotreba * 1.1)
	$vykon = 0;

	//poskládat hráči sestavu
	$dotaz = 'INSERT INTO sestavy (hrac, vykon, spotreba, obsah, sbercas) VALUES ('.$_SESSION['hrac'].', '.$vykon.', '.$spotreba.', "'.join(';', $sestava).'", '.time().')';
	mysql_query($dotaz);

	//odebrat hráči majetek
	$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
	mysql_query($dotaz);

	//log
	$nazvy = "";
	$dotaz = 'SELECT * FROM veci';
	$vysl = mysql_query($dotaz) or die(mysql_error($db));
	while ($zazn = mysql_fetch_array($vysl))
	if ($sestava[$zazn['idveci']] > 0)
	$nazvy .= $zazn['nazev'].'('.$sestava[$zazn['idveci']].'x) ';
	$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Složena sestava '.$nazvy.' o výkonu '.$vykon.' a spotřebě '.$spotreba.' W.")';
	mysql_query($dotaz);

	echo $vykon;
}

//přepínání body/výzkum
if (isset($_GET['switch']))
{
	require '../dblogin.php';
	require '../login.php';
	//přepnout na body/výzkum
	$dotaz = 'SELECT * FROM sestavy WHERE idsestavy='.$_GET['switch'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		if ($zaznam['hrac'] != $_SESSION['hrac'])
		die('Takú zostavu nemáš.');

		$nazvy = "";
		$obsah = explode(';', $zaznam['obsah']);
		$dotaz = 'SELECT * FROM veci';
		$vysl = mysql_query($dotaz) or die(mysql_error($db));
		while ($zazn = mysql_fetch_array($vysl))
		if ($obsah[$zazn['idveci']] > 0)
		$nazvy .= $zazn['nazev'].'('.$obsah[$zazn['idveci']].'x) ';

		if ($zaznam['vyzkum'] == 1)    //přepnout na body
		{
			$dotaz = 'UPDATE sestavy SET vyzkum=0 WHERE idsestavy='.$_GET['switch'];
			mysql_query($dotaz);

			//log
			$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Sestava '.$nazvy.' o výkonu '.$zaznam['vykon'].' a spotřebě '.$zaznam['spotreba'].' W přepnuta na body.")';
			mysql_query($dotaz);
		}
		else    //přepnout na výzkum
		{
			$dotaz = 'UPDATE sestavy SET vyzkum=1 WHERE idsestavy='.$_GET['switch'];
			mysql_query($dotaz);

			//log
			$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Sestava '.$nazvy.' o výkonu '.$zaznam['vykon'].' a spotřebě '.$zaznam['spotreba'].' W přepnuta na výzkum.")';
			mysql_query($dotaz);
		}
	}
	else
	echo 'Taká zostava neexistuje.';
}

//rozebrání sestavy
if (isset($_GET['disass']))
{
	require '../vlastnictvi.php';

	$dotaz = 'SELECT * FROM sestavy WHERE idsestavy='.$_GET['disass'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) <= 1)
	die('Táto zostava neexistuje.');

	if ($zaznam['hrac'] != $_SESSION['hrac'])
	die('Túto zostavu nevlastníš.');

	$sestava = explode(';', $zaznam['obsah']);

	$pocveci = count($vlastnictvi);
	for ($i = 0; $i < $pocveci; $i++)
	{
		$vlastnictvi[$i] += $sestava[$i];
	}

	$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace='.$_SESSION['hrac'];
	mysql_query($dotaz);

	$dotaz = 'DELETE FROM sestavy WHERE idsestavy='.$_GET['disass'];
	mysql_query($dotaz);

	//log
	$nazvy = "";
	$obsah = explode(';', $zaznam['obsah']);
	$dotaz = 'SELECT * FROM veci';
	$vysl = mysql_query($dotaz) or die(mysql_error($db));
	while ($zazn = mysql_fetch_array($vysl))
	if ($obsah[$zazn['idveci']] > 0)
	$nazvy .= $zazn['nazev'].'('.$obsah[$zazn['idveci']].'x) ';
	$dotaz = 'INSERT INTO log (cas, hrac, text) VALUES ('.time().', '.$_SESSION['hrac'].', "Rozebrána sestava '.$nazvy.' o výkonu '.$zaznam['vykon'].' a spotřebě '.$zaznam['spotreba'].' W.")';
	mysql_query($dotaz);
}
