<?php
require "../dblogin.php";

if (isset($_GET['id']))
{
	$dotaz = 'SELECT * FROM veci WHERE idveci='.$_GET['id'];
	$vysledek = mysql_query($dotaz) or die(mysql_error($db));
	$zaznam = mysql_fetch_array($vysledek);
	if (count($zaznam) > 1)
	{
		echo '<div id="nazev">'.$zaznam['nazev'].'</div><div id="popis">'.$zaznam['popis'].'</div>';
	}
	else
		echo 'Nepodařilo se získat info o tomto předmětu.';
}
?>
