<?php
if (isset($_GET['trade']))
{
	//uskutečnit obchod
	$dotaz = 'SELECT * FROM obchod WHERE idnab='.$_GET['trade'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	//TODO: předělat na věc za věc
	if (count($zaznam) > 1)
	{
		
	}
	/*if (count($zaznam) > 1)
	{
		//hrac kupuje
		if ($zaznam['smer'] == 'p' && $vlastnictvi[0] >= $zaznam['cena'])
		{
			$vlastnictvi[$zaznam['predmet']]+= $zaznam['mnozstvi'];
			$vlastnictvi[0]-= $zaznam['cena'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
			//TODO:připsat získané vlastnictví autoru nabídky
			//$dotaz = 'DELETE FROM obchod WHERE idnab='.$_GET['trade'];
			//mysql_query($dotaz);

		}
		//hráč prodává
		else if ($zaznam['smer'] == 'k' && $vlastnictvi[$zaznam['predmet']] >= $zaznam['mnozstvi'])
		{
			$vlastnictvi[$zaznam['predmet']]-= $zaznam['mnozstvi'];
			$vlastnictvi[0]+= $zaznam['cena'];
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
			//TODO:připsat získané vlastnictví autoru nabídky
			//$dotaz = 'DELETE FROM obchod WHERE idnab='.$_GET['trade'];
			//mysql_query($dotaz);

		}
		else
			echo "Obchod se nepovedl.";
	}
	else*/
		echo "Obchod se nepovedl.";
}
else if (isset($_GET['nabizi']))
{
	if ($vlastnictvi[$_GET['nabizi']] >= $_GET['mnoznabizi'])
	{
		$vlastnictvi[$_GET['nabizi']] -= $_GET['mnoznabizi'];
		$dotaz = 'INSERT INTO obchod (hrac, nabizi, mnoznabizi, chce, mnozchce) VALUES ('.$_SESSION['hrac'].', '.$_GET['nabizi'].', '.$_GET['mnoznabizi'].', '.$_GET['chce'].', '.$_GET['mnozchce'].')';
			mysql_query($dotaz);
			$dotaz = 'UPDATE hraci SET vlastnictvi="'.join(';', $vlastnictvi).'" WHERE idhrace="'.$_SESSION['hrac'].'"';
			mysql_query($dotaz);
	}
}
//zrušit nabídku
else if (isset($_GET['cancel']))
{
	$dotaz = 'SELECT * FROM obchod WHERE idnab='.$_GET['cancel'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if ($zaznam['hrac'] == $_SESSION['hrac'])
	{
		//TODO: vrátit hráči, co nabídl
		$dotaz = 'DELETE FROM obchod WHERE idnab='.$_GET['cancel'];
		mysql_query($dotaz);
	}
	else
		echo "Zrušení se nepodařilo.";
}
?>
