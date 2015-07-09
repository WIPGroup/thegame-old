<?php

//TODO: jakmile se tento skript nebude includovat, ale volat samostatně, odkomentovat tyto 3 řádky
//session_start();
//require "../dblogin.php";
//require "../login.php";
if ($_SESSION['hrac'] != 1)
	die('Nejsi admin.'); //TODO: pokud zbyde cas tak vic adminu

if (isset($_GET['0']))
{
	$znaky = '0123456789abcdefghijklmnopqrstuvwxyz';
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
elseif (isset($_GET['rm']))
{
	$dotaz = 'DELETE FROM kupony WHERE kod="'.$_GET['rm'].'"';
	mysql_query($dotaz);
}
