<?php

require '../dblogin.php';

if (isset($_GET['id']))
{
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['id'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		echo '<div id="nazev">Název: '.$zaznam['nazev'].'</div><div id="typ">Typ: '.$zaznam['typ'].'</div><div id="vykon">Výkon: '.$zaznam['vykon'].'</div><div id="popis">'.$zaznam['popis'].'</div>';
	}
	else
		echo 'Nepodařilo se získat info o tomto předmětu: '.$_GET['id'];
}
else {
	echo 'Chybí id itemu.';
}