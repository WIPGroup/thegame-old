<?php
session_start();

include "../connectvlastnictvi.php";
include "../trade.php";

echo '<table style="background-color: #fff" class="table table-bordered table-responsive table-hover">';
echo '<tr><th>Hráč</th><th>Ponúka</th><th>Množstvo</th><th>Cena</th><th></th></tr>';

$dotaz = 'SELECT * FROM obchod, veci, hraci WHERE smer="p" AND predmet=idveci AND hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek))
{
	echo '<tr';
	if ($zaznam['cena'] > $vlastnictvi[0])  //TODO: PHP magic, nema smysl oznacovat radek, ktery si vytvoril, cervene
		echo ' class="danger"';
	echo '><td>' . $zaznam['jmeno'] . '</td>';
	echo '<td>' . $zaznam['nazev'] . '</td>';
	echo '<td>' . $zaznam['mnozstvi'] . '</td>';
	echo '<td>' . $zaznam['cena'] . '</td>';
	echo '<td>';
	if ($zaznam['hrac'] == $_SESSION['hrac'])
		echo '<button type="button" class="btn btn-warning btn-block" href="#" onclick="cancel(' . $zaznam['idnab'] . ');return false;">Zrušiť</button></td>';
	else if ($zaznam['cena'] <= $vlastnictvi[0])
		echo '<button type="button" class="btn btn-success btn-block" href="#" onclick="obchodovanie(' . $zaznam['idnab'] . ');return false;">Kúpiť</button>';
	echo "</td></tr>";
}
echo '</table>';
?>
