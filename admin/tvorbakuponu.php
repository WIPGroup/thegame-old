<?php

//TODO: jakmile se tento skript nebude includovat, ale volat samostatně, odkomentovat tyto 3 řádky
//session_start();
//require "../dblogin.php";
//require "../login.php";
if ($_SESSION['hrac'] != 1)
	die('Nejsi admin.'); //TODO: pokud zbyde cas tak vic adminu

if (isset($_GET['0']))
{
	$znaky = '0123456789abcdefghijklmnpqrstuvwxyz';
	$pocznaku = strlen($znaky);
	$zaznam = null;
	$kod = '';
	do
	{
		for ($i = 0; $i < 8; $i++)
		{
			$kod .= $znaky[rand(0, $pocznaku - 1)];
		}
		$dotaz = 'SELECT COUNT(*) FROM kupony WHERE kod="'.$kod.'"';
		$vysledek = mysql_query($dotaz) or die(mysql_error($db));
		$zaznam = mysql_fetch_array($vysledek);
	}
	while ($zaznam['COUNT(*)'] > 1);

	$obsah = null;
	$i = 0;
	while (isset($_GET[$i]))
	{
		$obsah[$i] = $_GET[$i] * 1;
		$i++;
	}

	$dotaz = 'INSERT INTO kupony (kod, obsah, cas) VALUES ("'.$kod.'", "'.join(';', $obsah).'", '.time().')';
	mysql_query($dotaz);
}
else if (isset($_GET['rm']))
{
	$dotaz = 'DELETE FROM kupony WHERE kod="'.$_GET['rm'].'"';
	mysql_query($dotaz);
}
else if (isset($_GET['prerozdelit']))
{
	$iron = 0; $copper = 0; $gold = 0; $silicon = 0;

	$dotaz = 'SELECT * FROM kupony';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		echo $zaznam['kod']."<br>";
	}
	//TODO: vzít suroviny z patřičných kuponů
	//TODO: smazat původní kupony
	//TODO: rodělit suroviny na nové kupony a zapisovat je
}
