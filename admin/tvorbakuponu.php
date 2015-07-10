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
else if (isset($_GET['prerozdelit']) && $_GET['prerozdelit'] > 0)
{
	//sebrat suroviny z čistě surovinných kuponů
	$iron = 0; $copper = 0; $gold = 0; $silicon = 0;

	$dotaz = 'SELECT * FROM kupony';
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	while ($zaznam = mysql_fetch_array($vysledek))
	{
		$veci = explode(';', $zaznam['obsah']);
		$pocveci = count($veci);

		$jenveci = true;
		if ($veci[0] > 0)
			$jenveci = false;
		else if ($pocveci >= 6)
			for ($i = 5; $i < $pocveci; $i++)
				if ($veci[$i] > 0)
				{
					$jenveci = false;
					break;
				}

		if (!$jenveci)
			continue;


		$iron += $veci[1]; $copper += $veci[2]; $gold += $veci[3]; $silicon += $veci[4];

		$dotaz = 'DELETE FROM kupony WHERE kod="'.$zaznam['kod'].'"';
		mysql_query($dotaz);
	}

	//vytvořit nové kupony
	$maxhodnota = floor(($iron * 1 + $copper * 3 + $gold * 90 + $silicon * 30) / $_GET['prerozdelit']); 

	echo $maxhodnota."<br>";

	while ($iron > 0 || $copper > 0 || $gold > 0 || $silicon > 0)
	{
		$hodnota = 0;
		$obsah = null;
		for ($i = 0; $i < 10; $i++)
			$obsah[$i] = 0;

		//gold
		while ($hodnota + 90 <= $maxhodnota && $gold > 0 )
		{
			$obsah[3]++;
			$gold--;
			$hodnota += 90;
		}

		//silicon
		while ($hodnota + 30 <= $maxhodnota && $silicon > 0 )
		{
			$obsah[4]++;
			$silicon--;
			$hodnota += 30;
		}

		//copper
		while ($hodnota + 3 <= $maxhodnota && $copper > 0 )
		{
			$obsah[2]++;
			$copper--;
			$hodnota += 3;
		}

		//iron
		while ($hodnota + 1 <= $maxhodnota && $iron > 0 )
		{
			$obsah[1]++;
			$iron--;
			$hodnota += 1;
		}

		if ($hodnota < $maxhodnota)
		{
			//naházet zbytek
			$obsah[1] = $iron;
			$obsah[2] = $copper;
			$obsah[3] = $gold;
			$obsah[4] = $silicon;
			
			$iron = 0; $copper = 0; $gold = 0; $silicon = 0;
			break;
		}

		//zapsat do db
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

		$dotaz = 'INSERT INTO kupony (kod, obsah, cas) VALUES ("'.$kod.'", "'.join(';', $obsah).'", '.time().')';
		mysql_query($dotaz);
	}
}
