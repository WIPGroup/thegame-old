<?php
session_start();
include "trhvariables.php";
include "trade.php";
echo '<table border="1">';
echo '<tr><td>Hráč</td><td>ponúka</td><td>v množstve</td><td>za toľko peňazí</td><td>Akcia</td></tr>';

//nabídky
$dotaz = 'SELECT * FROM obchod, veci, hraci WHERE smer="k" AND predmet=idveci AND hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr><td>'.$zaznam['jmeno'].'</td>';
	echo '<td>'.$zaznam['nazev'].'</td>';
	echo '<td>'.$zaznam['mnozstvi'].'</td>';
	echo '<td>'.$zaznam['cena'].'</td>';
	echo '<td>';
	
	if ($zaznam['mnozstvi'] <= $vlastnictvi[$zaznam['predmet']])
		echo '<a href="#" onclick="kupit('.$zaznam['idnab'].');return false;">Prodat</a>';
	echo "</td></tr>";

}
echo'</table>';
?>