<?php
session_start();
include "../connectvlastnictvi.php";
include "../trade.php";
echo '<table border="1">';
echo '<tr><td>Hráč</td><td>ponúka</td><td>v množstve</td><td>za toľko peňazí</td><td>Akcia</td><td>Zrušenie</td></tr>';
//nabídky
$dotaz = 'SELECT * FROM obchod, veci, hraci WHERE smer="p" AND predmet=idveci AND hrac=idhrace';
$vysledek = mysql_query($dotaz) or die(mysql_error($db));
while ($zaznam = mysql_fetch_array($vysledek)) {
  echo '<tr><td>' . $zaznam['jmeno'] . '</td>';
  echo '<td>' . $zaznam['nazev'] . '</td>';
  echo '<td>' . $zaznam['mnozstvi'] . '</td>';
  echo '<td>' . $zaznam['cena'] . '</td>';
  echo '<td>';
  if ($zaznam['cena'] <= $vlastnictvi[0]) echo '<a href="#" onclick="obchodovanie(' . $zaznam['idnab'] . ');return false;">Kúpiť</a>';
  echo '</td><td>';
  echo '<a href="#" onclick="drop(' . $zaznam['idnab'] . ');return false;">Zrušiť</a>';
  echo "</td></tr>";
}
echo '</table>';
?>