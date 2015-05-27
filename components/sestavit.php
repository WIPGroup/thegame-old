<?php
if (isset($_GET['mb']))
{
	require "vlastnictvi.php"; //TODO: v samostatném ajaxu upravit na ../vlastnictvi.php
	//získat údaje o desce
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['mb'].' AND typ="mb"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		$sloty = explode(';', $zaznam['sloty']);
		$socket = $zaznam['socket'];
		$vlastnictvi[$zaznam['idveci']]--;
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
		}
		else
			die('Takovou grafárnu nevlastníš.');
	}
	
	//hdd
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['hdd'].' AND typ="hdd"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		$vlastnictvi[$zaznam['idveci']]--;
	}
	else
		die('Takový harddisk nevlastníš.');
	
	//psu
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['psu'].' AND typ="psu"';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1 && $vlastnictvi[$zaznam['idveci']] > 0)
	{
		$vlastnictvi[$zaznam['idveci']]--;
	}
	else
		die('Takový zdroj nevlastníš.');
		
	//TODO: poskládat hráči sestavu
	
	//TODO: odebrat hráči majetek
}
?>
